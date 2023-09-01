<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationCertificate extends Model
{
    use HasFactory;
    protected $fillable = ['application_id','certificate_name','certificate_date'];
}
