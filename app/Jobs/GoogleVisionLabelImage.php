<?php

namespace App\Jobs;

use App\Models\AnnounceImage;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GPBMetadata\Google\Cloud\Vision\V1\ImageAnnotator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;
    

    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    public function handle()
    {
       $i = AnnounceImage::find($this->announcement_image_id);
       if(!$i){return;}

       $image = file_get_contents(storage_path('/app/' . $i->file));

       //Impostiamo la variabile di ambiente attraverso il path del file contenente le credenziali
       putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('credenziali_google.json'));

       //Creo l'oggetto che sarà responsabile di analizzare l'immagine
       $imageAnnotator = new ImageAnnotatorClient();
       $response = $imageAnnotator->labelDetection($image);
       $labels = $response->getLabelAnnotations();

       if($labels){

        $result = [];
        foreach ($labels as $label) {
            $result[] = $label->getDescription();
        }

        $i->labels = $result;
        $i->save();
       }
       $imageAnnotator->close();
    }
}
