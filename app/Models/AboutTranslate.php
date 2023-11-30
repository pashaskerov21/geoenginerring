<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['about_id', 'home_text', 'main_text', 'lang'];
}
