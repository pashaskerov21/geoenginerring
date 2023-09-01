<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'image', 'image_old','address_url', 'home_status', 'sort', 'destroy'];
    public function getTranslate(){
        return $this->hasMany(ProjectTranslate::class, 'project_id', 'id');
    }

    public function getCategory(){
        return $this->hasMany(ProjectCategories::class, 'id', 'category_id');
    }
}
