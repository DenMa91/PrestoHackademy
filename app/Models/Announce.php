<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\AnnounceImage;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announce extends Model
{
    use HasFactory;
    use Searchable;

        protected $fillable=[
            'name',
            'description',
            'price',
            'category_id',
            'user_id',
        ];
        public function category(){
            return $this->belongsTo(Category::class);
        }

        public function user(){
            return $this->belongsTo(User::class, 'user_id');
        }

        static public function toBeRevisionedCount(){
            return Announce::where('is_accepted', null)->count();
        } 

        public function toSearchableArray()
        {

            $array = [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
               
                'altro' => 'annuncio vendita',
            ];
            return $array;
        }

        public function images(){
            return $this->hasMany(AnnounceImage::class);
        }

}


