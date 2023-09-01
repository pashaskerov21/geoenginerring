<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['vacancy_id', 'title', 'slug', 'text', 'lang'];
}
