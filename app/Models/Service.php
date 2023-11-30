<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['icon', 'card_img_1', 'card_img_2','text_img','catalog_pdf','header_status','home_status','sort','destroy'];
    public function getTranslate(){
        return $this->hasMany(ServiceTranslate::class, 'service_id', 'id');
    }
    public function getAltContents(){
        return $this->hasMany(ServiceAltContent::class, 'service_id', 'id');
    }
}
