<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationEducation extends Model
{
    use HasFactory;
    protected $fillable = ['application_id','education_level','education_name','education_field','education_start_date','education_end_date'];
}
