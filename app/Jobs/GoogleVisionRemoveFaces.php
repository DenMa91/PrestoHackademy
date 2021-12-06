<?php

namespace App\Jobs;

use Spatie\Image\Image;
use App\Models\AnnounceImage;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;


class GoogleVisionRemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announce_image_id;

    public function __construct($announce_image_id)
    {
        $this->announce_image_id = $announce_image_id;
    }

    public function handle()
    {
        $i = AnnounceImage::find($this->announce_image_id);
        if (!$i){
            return;
        }

    $srcPath = storage_path('/app/' . $i->file);
    $image = file_get_contents($srcPath);

    putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('credenziali_google.json'));

    $imageAnnotator = new ImageAnnotatorClient();
    $response = $imageAnnotator->faceDetection($image);
    $faces = $response->getFaceAnnotations();

    foreach ($faces as $face) {
        $vertices = $face->getBoundingPoly()->getVertices();

        $bounds = [];
        foreach($vertices as $vertex) {
            $bounds[] = [$vertex->getX(), $vertex->getY()];
        }

        $w = $bounds[2][0] - $bounds[0][0];
        $h = $bounds[2][1] - $bounds[0][1];

        $image = Image::load($srcPath);

        $image->watermark(base_path('public/media/Presto-cerchio.png'))
              ->watermarkPosition('top-left')
              ->watermarkPadding($bounds[0][0], $bounds[0][1])
              ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
              ->watermarkHeight($w, Manipulations::UNIT_PIXELS)
              ->watermarkFit(Manipulations::FIT_STRETCH);
              
              
              $image->save($srcPath);
        }
            $imageAnnotator->close();
    }

}