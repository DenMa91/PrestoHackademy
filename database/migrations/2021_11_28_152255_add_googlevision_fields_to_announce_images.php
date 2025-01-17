<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGooglevisionFieldsToAnnounceImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announce_images', function (Blueprint $table) {
            // Campo text che conterrà le etichette 
            $table->text('labels')->nullable();

            //Campi string di base nullable che veranno riempiti solo nel caso in cui l'api trovi qualche parametro corrispondente 
            $table->string('adult')->nullable();
            $table->string('spoof')->nullable();
            $table->string('medical')->nullable();
            $table->string('violence')->nullable();
            $table->string('racy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announce_images', function (Blueprint $table) {
            $table->dropColumn(['labels','adult','spoof','medical','violence','racy']);
        });
    }
}
