<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    public function getTranslate(){
        return $this->hasMany(SettingTranslate::class, 'setting_id', 'id');
    }
}
