<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function sub()
    {
        return $this->hasMany(Task::class,'parent_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
