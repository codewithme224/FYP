<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    use HasFactory;


    protected $table = 'job_saved';
    protected $fillable = [
        'id',
        'job_id',
        'user_id',
        'image',
        'job_title',
        'job_region',
        'job_type',
        'company',
    ];

    public $timestamps = true;
}
