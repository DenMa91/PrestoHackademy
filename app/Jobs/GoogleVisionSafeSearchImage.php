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

class GoogleVisionSafeSearchImage implements ShouldQueue
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
       $response = $imageAnnotator->safeSearchDetection($image);
       $imageAnnotator->close();

       $safe = $response->getSafeSearchAnnotation();

       $adult = $safe->getAdult();
       $medical = $safe->getMedical();
       $spoof = $safe->getSpoof();
       $violence = $safe->getViolence();
       $racy = $safe->getRacy();

    //    echo json_encode([$adult, $medical, $spoof, $violence, $racy]);

       $likelihoodName = [
           'bg-success', 'bg-success', 'bg-warning', 'bg-warning', 'bg-danger', 'bg-danger' 
       ];

       $i->adult = $likelihoodName[$adult];
       $i->medical = $likelihoodName[$medical];
       $i->spoof = $likelihoodName[$spoof];
       $i->violence = $likelihoodName[$violence];
       $i->racy = $likelihoodName[$racy];

       $i->save();
    }
}
