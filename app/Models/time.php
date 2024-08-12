<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class time extends Model
{
    use HasFactory;
     protected $guarded = [];
     public function project()
    {
        return $this->belongsTo(Project::class);
    }
     public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
