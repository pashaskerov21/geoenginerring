<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategories extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id','header_status', 'sort', 'destroy'];
    public function getTranslate(){
        return $this->hasMany(ProjectCategoryTranslate::class, 'category_id', 'id');
    }
    public function getProjects(){
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
