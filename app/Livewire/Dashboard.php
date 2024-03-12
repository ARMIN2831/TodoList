<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $projects;
    public $user;
    public $title = 'new project';

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
    public function storeProject()
    {
        $project = new Project();
        $project->title = 'new project';
        $project->user_id = $this->user->id;
        $project->save();
        $project->new = 1;
        $this->projects->push($project);
    }
    public function updateProject($id)
    {
        $project = Project::whereId($id)->first();
        $project->title = $this->title;
        $project->save();
        foreach ($this->projects as $key => $p){
            if ($p->id == $id){
                $this->projects[$key] = $project;
                break;
            }
        }
        $this->reset('title');
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
