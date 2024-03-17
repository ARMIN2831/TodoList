<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->where('parent_id','!=',0);
    }
    public function ParentTasks(): HasMany
    {
        return $this->hasMany(Task::class)->where('parent_id',0)->with('todo');
    }


    public function calculateProgressPercentage()
    {
        $tasks = $this->tasks();
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 1)->count();
        if ($totalTasks == 0) $percent = 0;
        else $percent = round(($completedTasks / $totalTasks) * 100,2);
        return ['percent'=>$percent,'total'=>$totalTasks,'completed'=>$completedTasks];
    }


    public function calculateProgressUser()
    {
        $user = Auth::user();
        $tasks = $this->tasks()->where('user_id',$user->id);

        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 1)->count();
        if ($totalTasks == 0) $percent = 0;
        else $percent = round(($completedTasks / $totalTasks) * 100,2);
        return ['percent'=>$percent,'total'=>$totalTasks,'completed'=>$completedTasks];
    }
}
