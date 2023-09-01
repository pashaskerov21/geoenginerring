<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id','icon', 'icon_old', 'card_img_1', 'card_img_1_old','card_img_2','card_img_2_old','text_img','text_img_old','catalog_pdf','catalog_pdf_old','header_status','home_status','content','sort','destroy'];
    public function getTranslate(){
        return $this->hasMany(ServiceTranslate::class, 'service_id', 'id');
    }
    public function getAltContents(){
        return $this->hasMany(ServiceAltContent::class, 'service_id', 'id');
    }
}
