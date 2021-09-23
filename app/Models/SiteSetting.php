<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = "site_setting";
    protected $fillable = ['name' ,'slug' , 'value' ,'type']; 
    protected $appends = ['image_path'];

    function getImagePathAttribute(){

        return asset('uploads/' .$this->value);
        
    }  
}
