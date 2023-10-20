<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status_id'];

    public function status() {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function actions(){
        return $this->hasMany(Action::class, 'task_id', 'id');
    }

    public function tags_keys(){
        return $this->hasMany(TagTask::class, 'task_id', 'id');
    }
}

