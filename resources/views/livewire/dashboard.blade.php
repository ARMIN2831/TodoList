<div
    class="min-h-screen bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 flex flex-col items-center justify-center">
    <div class="w-full max-w-screen-lg bg-white rounded-lg shadow-lg p-6 mx-auto my-10">


        {{--loadding bar--}}
        <div wire:loading.class="flex" wire:loading.class.remove="hidden"
             class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 z-50">
            <div class="w-64 h-64 bg-gray-700 bg-opacity-50 rounded-lg flex justify-center items-center space-x-4">
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 animate-bounce"></div>
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-400 via-purple-500 to-indigo-500 animate-pulse"></div>
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 animate-pulse"></div>
            </div>
        </div>
        {{--loadding bar--}}






        {{--user information--}}
        <div class="mb-10">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div
                        class="w-24 h-24 flex items-center justify-center rounded-full overflow-hidden bg-gray-200 mr-4">
                        <img src="" alt="" class="w-full h-full object-cover"
                             onerror="this.style.display='none'">
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">User Panel</h1>
                        <p class="text-lg text-gray-800">Welcome, {{$user->username}}!</p>
                    </div>
                </div>
                <a wire:click="logout" href="#"
                   class="text-red-500 text-sm inline-block py-2 px-4 rounded-md border border-red-500 hover:bg-red-500 hover:text-white transition duration-300 ease-in-out transform hover:scale-105">Logout</a>
            </div>
            <div class="bg-gray-100 bg-opacity-25 rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800">User Information</h2>
                <div class="mb-4">
                    <p class="text-base text-gray-600"><span class="font-bold">Name:</span> {{$user->name}}</p>
                    <p class="text-base text-gray-600"><span class="font-bold">Username:</span> {{$user->username}}</p>
                    <p class="text-base text-gray-600"><span class="font-bold">Email:</span> {{$user->email}}</p>
                </div>
            </div>
        </div>
        {{--user information--}}






        @if($show == 0)

            <div class="hidden hover:bg-yellow-200 bg-yellow-100 bg-yellow-500 hover:bg-blue-200 bg-blue-100 bg-blue-500 hover:bg-purple-200 bg-purple-100 bg-purple-500 hover:bg-green-200 bg-green-100 bg-green-500 hover:bg-gray-200 bg-gray-100 bg-gray-500text-yellow-800 text-blue-800 text-purple-800 text-green-800 text-gray-800"></div>





            {{--projects and todo list--}}
            {{--projects list--}}
            <div class="bg-white rounded-lg shadow-lg p-6 mb-10">
                <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Project List</h2>
                    <button wire:click="createModel('project')"
                            class="text-white font-bold py-2 px-4 bg-blue-500 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">
                        + Add New Project
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4">






                    {{--show project--}}
                    @foreach($projects as $project)
                        @php
                            $percentTask = $project->calculateProgressPercentage();
                            $percent = $percentTask['percent'];
                            $total = $percentTask['total'];
                            $complete = $percentTask['completed'];

                            if ($percent <= 100) $color = 'green';
                            if ($percent < 75) $color = 'purple';
                            if ($percent < 50) $color = 'blue';
                            if ($percent < 25) $color = 'yellow';
                            $w = 'w-['.$percent.'%]';
                        @endphp
                        <div
                            class="bg-{{$color}}-100 hover:bg-{{$color}}-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <div class="p-6">
                                <h3 class="text-lg font-bold mb-2 text-{{$color}}-800">
                                    {{$project->title}}
                                </h3>
                                <div class="flex items-center mb-2">
                                    <div class="w-full bg-gray-300 rounded-full h-2">
                                        <div class="bg-{{$color}}-500 rounded-full h-2"
                                             style="width: {{$percent}}%"></div>
                                    </div>
                                    <span
                                        class="ml-2 text-sm text-gray-600">{{$percent}}% Complete {{$complete}}/{{$total}}</span>
                                </div>
                                <button wire:click="showProject({{$project->id}})"
                                        class="text-blue-500 text-sm inline-block px-4 py-2 bg-blue-200 hover:bg-blue-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                    @endforeach
                    {{--show project--}}




                    {{--create project--}}
                    @if($new == 1)
                        <div
                            class="bg-gray-100 hover:bg-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <div class="p-6">
                                <h3 class="text-lg font-bold mb-2 text-gray-800">
                                    <input wire:model="title" value="new project" name="title">
                                </h3>
                                <div class="flex items-center mb-2">
                                    <div class="w-full bg-gray-300 rounded-full h-2">
                                        <div class="bg-gray-500 rounded-full h-2" style="width: 0%"></div>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">0% Complete</span>
                                </div>

                                <button wire:click="storeProject"
                                        class="text-green-500 text-sm inline-block px-4 py-2 bg-green-200 hover:bg-green-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                    Save
                                </button>
                            </div>
                        </div>
                    @endif
                    {{--create project--}}





                </div>
            </div>
            {{--projects list--}}






            {{--todo list--}}
            <div class="bg-white rounded-lg shadow-lg p-6 mb-10">
                <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Todo List</h2>
                </div>
                <div class="grid grid-cols-2 gap-4">




                    {{--show todo--}}
                    @foreach($todos as $todo)
                        @php
                            $percentTask = $todo->calculateProgressUser();
                            $percent = $percentTask['percent'];
                            $total = $percentTask['total'];
                            $complete = $percentTask['completed'];
                            if ($percent <= 100) $color = 'green';
                            if ($percent < 75) $color = 'purple';
                            if ($percent < 50) $color = 'blue';
                            if ($percent < 25) $color = 'yellow';
                            $w = 'w-['.$percent.'%]';
                        @endphp
                        <div
                            class="bg-{{$color}}-100 hover:bg-{{$color}}-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <div class="p-6">
                                <h3 class="text-lg font-bold mb-2 text-{{$color}}-800">
                                    {{$todo->title}}
                                </h3>
                                <div class="flex items-center mb-2">
                                    <div class="w-full bg-gray-300 rounded-full h-2">
                                        <div class="bg-{{$color}}-500 rounded-full h-2"
                                             style="width: {{$percent}}%"></div>
                                    </div>
                                    <span
                                        class="ml-2 text-sm text-gray-600">{{$percent}}% Complete {{$complete}}/{{$total}}</span>
                                </div>
                                <button wire:click="showTodo({{$todo->id}})"
                                        class="text-blue-500 text-sm inline-block px-4 py-2 bg-blue-200 hover:bg-blue-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                    @endforeach
                    {{--show todo--}}




                </div>
            </div>
            {{--todo list--}}
            {{--projects and todo list--}}





        @else
            <div class="hidden text-yellow-600 bg-yellow-200 bg-yellow-500 text-blue-600 bg-blue-200 bg-blue-500 text-purple-600 bg-purple-200 bg-purple-500 text-green-600 bg-green-200 bg-green-500 text-gray-600 bg-gray-200 bg-gray-500"></div>
            {{--project and todo detail--}}
            {{--get detail--}}
            @php
                if ($todo_id !=0) $ch=1;
                else $ch=0;

                $percentTask = $project->calculateProgressPercentage();
                $percent = $percentTask['percent'];
                $total = $percentTask['total'];
                $complete = $percentTask['completed'];
                if ($percent <= 100) $color = 'green';
                if ($percent < 75) $color = 'purple';
                if ($percent < 50) $color = 'blue';
                if ($percent < 25) $color = 'yellow';
                $w = 'w-['.$percent.'%]';
            @endphp
            {{--get detail--}}



            {{--show project detail--}}
            <div class="relative bg-gray-100 rounded-lg shadow-md p-6 mb-6">
                <button wire:click="backToProjects"
                        class="absolute right-0 top-0 mt-4 mr-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">
                    Back
                </button>
                <h2 class="text-xl font-bold mb-4 text-gray-800">Project Information</h2>
                <div class="mb-4">
                    @if($edit_id != 0)
                        <p class="text-base text-gray-600"><span class="font-bold">Project Name:</span> <input wire:model="title">
                        </p>
                        <button wire:click="updateModel('project')"
                                class="text-green-500 text-sm inline-block px-4 py-2 bg-green-200 hover:bg-green-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                            Save
                        </button>
                    @else
                        <p wire:click="editModel({{$project->id}},'{{$project->title}}')" class="text-base text-gray-600"><span class="font-bold">Project Name:</span> {{$project->title}}
                        </p>
                    @endif
                </div>
                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-{{$color}}-600 bg-{{$color}}-200">{{$percent}}% Complete {{$complete}}/{{$total}}</span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-{{$color}}-600">{{$percent}}%</span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-{{$color}}-200">
                        <div style="width:{{$percent}}%"
                             class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-{{$color}}-500 transition-all duration-500"></div>
                    </div>
                </div>
                @if($ch == 0)
                    <div class="flex justify-between items-center">
                        <button wire:click="createModel('task list')"
                                class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">
                            Add Task
                        </button>
                        <button wire:click="deleteProject({{$project->id}})"
                                class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105">
                            Delete Project
                        </button>
                    </div>
                @endif
            </div>
            {{--show project detail--}}







            {{--show tasks--}}
            @foreach($tasks as $task)
                @php
                    if ($todo_id !=0) $s = $task->todo;
                    else $s = $task->sub;
                @endphp
                <div class="bg-white rounded-lg shadow-lg p-6 mb-10">
                    <div class="flex justify-between rounded-lg">
                        @if($edit_id == $task->id)
                            <input wire:model="title">
                            <button wire:click="updateModel('task')"
                                    class="text-green-500 text-sm inline-block px-4 py-2 bg-green-200 hover:bg-green-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                Save
                            </button>
                        @else
                            <h2 wire:click="editModel({{$task->id}},'{{$task->title}}')" class="text-xl font-bold mb-4 text-gray-800">{{$task->title}}</h2>
                        @endif
                        <div>
                            @if($ch == 0)
                                <button wire:click="createModel('task' , {{$task->id}})"
                                        class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-green-600 transition duration-300 ease-in-out transform hover:scale-105">
                                    Add Subtask
                                </button>
                                <button wire:click="deleteTask({{ $task->id }} , '1')"
                                        class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105">
                                    DELETE
                                </button>
                            @endif
                        </div>
                    </div>




                    {{--show sub tasks--}}
                    @foreach($s as $sub)
                        <div
                            class="py-2.5 task-item mb-px transition-colors duration-100 hover:bg-gray-200 flex justify-between rounded-lg items-center">
                            <div class="flex items-center cursor-pointer ml-1.5">
                                <input wire:click="changeStatus({{ $sub->id }}, {{ $sub->status }})"
                                       {{$sub->status == 1 ? 'checked' : ''}} type="checkbox"
                                       class="form-checkbox h-5 w-5 min-w-5 text-green-500 cursor-pointer">



                                @if($edit_id == $sub->id)
                                    <input class="ml-2 text-gray-800 font-medium break-all" wire:model="title">
                                    <button wire:click="updateModel('task')"
                                            class="text-green-500 text-sm inline-block px-4 py-2 bg-green-200 hover:bg-green-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                        Save
                                    </button>
                                @else
                                    <span wire:click="editModel({{$sub->id}},'{{$sub->title}}')" class="ml-2 text-gray-800 font-medium break-all">{{$sub->title}}</span>
                                @endif
                            </div>
                            <div class="min-w-48 relative">
                                @if($assign != 0 and $assign == $sub->id)
                                    <div x-data='{
                                                        open: false,
                                                        options: @json($users),
                                                        filtered: [],
                                                        search: "",
                                                        filteredOptions: function() {
                                                            this.filtered = []; // Clear the filtered array
                                                            this.filtered = this.options.filter(option => option.toLowerCase().includes(this.search.toLowerCase()));
                                                        }
                                                    }'>
                                        <input type="text" x-model="search" x-on:input="filteredOptions()" x-on:click="open = true"
                                               placeholder="Search..." class="border rounded p-2 w-36 h-6 pl-1 absolute -left-9 top-1 z-10"
                                               @blur="open = false">
                                        <button wire:click="cancelAssign"
                                                class="absolute right-[60px] top-[5px] text-gray-500 focus:outline-none border rounded p-[3px] bg-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <div x-show="open" class="absolute -left-9 top-7 z-10 w-36 z-10"
                                             x-transition:enter="transition duration-300 ease-out"
                                             x-transition:enter-start="opacity-0 translate-y-[-10%]"
                                             x-transition:enter-end="opacity-100 translate-y-0"
                                             x-transition:leave="transition duration-200 ease-in"
                                             x-transition:leave-start="opacity-100 translate-y-0"
                                             x-transition:leave-end="opacity-0 translate-y-[-10%]">
                                            <ul class="border rounded bg-white shadow">
                                                <template x-if="filtered.length > 0">
                                                    <template x-for="option in filtered" :key="option">
                                                        <li wire:click="assignTask(option)" @click="open = false;"
                                                            class="cursor-pointer px-4 py-2 hover:bg-gray-100 transition duration-300 ease-in-out"
                                                            x-text="option"></li>
                                                    </template>
                                                </template>
                                                <template x-if="filtered.length === 0 && search !== ''">
                                                    <li class="p-2">No results found.</li>
                                                </template>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <span class="min-w-24 text-xs text-gray-500 leading-6 m-1.5">@if(isset($sub->user->username))
                                            {{$sub->user->username}}
                                        @endif</span>
                                @endif






                                @if($ch == 0)
                                    <button wire:click="deleteTask({{ $sub->id }})"
                                            class="float-right p-1 rounded-full text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105 shadow-md mr-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M6.707 6.293a1 1 0 0 1 1.414-1.414L10 8.586l2.879-2.88a1 1 0 1 1 1.414 1.414L11.414 10l2.88 2.879a1 1 0 0 1-1.414 1.414L10 11.414l-2.879 2.88a1 1 0 0 1-1.414-1.414L8.586 10 5.707 7.121a1 1 0 0 1 0-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    @if($assign == 0)
                                    <button wire:click="assignUser({{$sub->id}})"
                                            class="float-right p-1 rounded-full text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105 shadow-md mr-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M14 5a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h8zm-1 9V7H7v7h6zm-4-3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{--show sub tasks--}}





                    {{--create sub task--}}
                    @if($new == 1 and $title == 'new task' and $task_id == $task->id)
                        <div
                            class="py-2.5 task-item mb-px transition-colors duration-100 hover:bg-gray-200 flex justify-between rounded-lg items-center">
                            <label class="flex items-center cursor-pointer ml-1.5">
                                <input wire:model="status" type="checkbox"
                                       class="form-checkbox h-5 w-5 min-w-5 text-green-500 cursor-pointer">
                                <input wire:model="title" class="ml-2 text-gray-800 font-medium break-all">
                            </label>
                            <div class="min-w-48">
                                <button wire:click="cancelModel"
                                        class="float-right p-1 rounded-full text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105 shadow-md mr-1.5">
                                    cancel
                                </button>
                                <button wire:click="storeTask({{$task->id}})"
                                        class="float-right p-1 rounded-full text-gray-800 hover:bg-gray-100 transition duration-300 ease-in-out transform hover:scale-105 shadow-md mr-1.5">
                                    save
                                </button>
                            </div>
                        </div>
                    @endif
                    {{--create sub task--}}





                </div>
            @endforeach
            {{--show tasks--}}







            {{--create task--}}
            @if($new == 1 and $title == 'new task list')
                <div class="bg-white rounded-lg shadow-lg p-6 mb-10">
                    <div class="flex justify-between rounded-lg">
                        <input wire:model="title" class="text-xl font-bold mb-4 text-gray-800">
                        <div>
                            <button wire:click="storeTask('0')"
                                    class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-green-600 transition duration-300 ease-in-out transform hover:scale-105">
                                save
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            {{--create task--}}







            {{--project and todo detail--}}
        @endif
    </div>
</div>
