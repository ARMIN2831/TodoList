<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;
    public function sub()
    {
        return $this->hasMany(Task::class,'parent_id','id');
    }
    public function todo(): HasMany
    {
        $user = $this->user = Auth::user();
        return $this->hasMany(Task::class,'parent_id','id')->where('parent_id','!=',0)->where('user_id',$user->id);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
