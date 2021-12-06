<?php

namespace App\Models;

use App\Models\Announce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnounceImage extends Model
{
    use HasFactory;

    //Trattiamo le labels come un array in modo tale da essere ciclabili
    protected $casts = [
        'labels' => 'array',
    ];

    public function announce(){
        return $this->belongsTo(Announce::class);
    }

    static public function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if(!$w && !$h) {
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $filename = basename($filePath);

        $file = "{$path}/crop{$w}x{$h}_{$filename}";

        return Storage::url($file);

    }

    public function getUrl($w=null, $h=null)
    {
        return AnnounceImage::getUrlByFilePath($this->file,$w,$h);
    }
}
