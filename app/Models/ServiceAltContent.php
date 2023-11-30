<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAltContent extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'image', 'sort', 'destroy'];
    public function getTranslate(){
        return $this->hasMany(ServiceAltContentTranslate::class, 'content_id', 'id');
    }
    public function getService(){
        return $this->hasMany(Service::class, 'id', 'service_id');
    }
}
