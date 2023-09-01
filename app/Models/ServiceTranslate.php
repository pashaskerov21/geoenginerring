<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'title','slug', 'card_text', 'main_text', 'lang'];

    public function getService(){
        return $this->hasMany(Service::class, 'id', 'service_id');
    }
}
