<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;


    protected $guarded=[];
    
    protected $appends=['image_path'];

    public $translatedAttributes = ['name','description'];
 

   
    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function getImagePathAttribute(){
        return asset('uploads/product_images/'.$this->image);
    }
}
