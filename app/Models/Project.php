<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'client',
        'project_leader',
        'leader_email',
        'leader_photo',
        'start_date',
        'end_date',
        'progress',
    ];
}
