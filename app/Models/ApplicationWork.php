<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationWork extends Model
{
    use HasFactory;
    protected $fillable = ['application_id','company_name','position','work_start_date','work_end_date'];
}
