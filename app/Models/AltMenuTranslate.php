<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AltMenuTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['alt_menu_id', 'name', 'slug', 'lang'];
}
