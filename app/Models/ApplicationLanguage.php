<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationLanguage extends Model
{
    use HasFactory;
    protected $fillable = ['application_id','language_name','language_level'];
}
