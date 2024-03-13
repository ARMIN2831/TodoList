<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->where('parent_id','!=',0);
    }

    public function calculateProgressPercentage(): float|int
    {
        $tasks = $this->tasks();
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 1)->count();

        if ($totalTasks == 0) return 0;
        return ($completedTasks / $totalTasks) * 100;
    }
}
