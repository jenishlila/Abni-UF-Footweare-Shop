<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $table='size';
    
    protected $fillable = [
       'size', 
   ];
}
