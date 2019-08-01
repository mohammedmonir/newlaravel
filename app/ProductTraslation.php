<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTraslation extends Model
{ 
    public $timestamps = false;
    protected $fillable = ['name','description'];

   
}
