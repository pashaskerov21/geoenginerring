<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['image'];
    public function getTranslate(){
        return $this->hasMany(AboutTranslate::class, 'about_id', 'id');
    }

}



