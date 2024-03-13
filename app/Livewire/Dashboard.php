<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $projects;
    public $user;
    public $tasks;
    public $show = 0;
    public $project;



    public $new = 0;
    public $title;
    public $status = 0;
    public $task_id = 0;

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
    public function createModel($text,$id=0)
    {
        $this->title = 'new '.$text;
        $this->task_id = $id;
        $this->new= 1;
    }
    public function cancelModel()
    {
        $this->reset('title','task_id','new');
    }
    public function storeProject()
    {
        $project = new Project();
        $project->title = $this->title;
        $project->user_id = $this->user->id;
        $project->save();
        $this->projects->push($project);
        $this->reset('title','new');
    }
    public function showProject($id)
    {
        $this->show = $id;
        foreach ($this->projects as $project){
            if ($project->id == $id){
                $this->project = $project;
                break;
            }
        }
        $this->tasks = Task::where('project_id',$this->show)->where('parent_id',0)->with('sub')->get();
    }





    public function storeTask($parent)
    {
        $task = new Task();
        $task->title = $this->title;
        $task->parent_id = $parent;
        $task->project_id = $this->show;
        $task->status = $this->status;
        $task->save();
        if ($parent == 0) $this->tasks->push($task);
        $this->reset('title','new','status');
    }
    public function changeStatus($id,$status)
    {
        $status = ($status+1)%2;
        Task::whereId($id)->update(['status'=>$status]);
        foreach ($this->tasks as $key => $task) {
            if ($task->id == $id){
                $this->tasks[$key]->status = $status;
                break;
            }
        }
    }




    public function mount()
    {
        $this->user = Auth::user();
        $this->projects = Project::where('user_id',$this->user->id)->get();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
