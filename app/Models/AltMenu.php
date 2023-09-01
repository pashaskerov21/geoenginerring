<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AltMenu extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id', 'sort', 'destroy'];
    public function getTranslate(){
        return $this->hasMany(AltMenuTranslate::class, 'alt_menu_id', 'id');
    }
    public function getMainMenu(){
        return $this->hasMany(Menu::class, 'id', 'parent_id');
    }
}
