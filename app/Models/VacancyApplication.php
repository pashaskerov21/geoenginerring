<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyApplication extends Model
{
    use HasFactory;
    protected $fillable = ['selected_vacancy','image','first_name','last_name','father_name','gender','birth','cv','email','phone','linkedin_url','address', 'sort', 'destroy'];
    public function getEducation(){
        return $this->hasMany(ApplicationEducation::class, 'application_id', 'id');
    }
    public function getWork(){
        return $this->hasMany(ApplicationWork::class, 'application_id', 'id');
    }
    public function getCertificate(){
        return $this->hasMany(ApplicationCertificate::class, 'application_id', 'id');
    }
    public function getLanguage(){
        return $this->hasMany(ApplicationLanguage::class, 'application_id', 'id');
    }
}
