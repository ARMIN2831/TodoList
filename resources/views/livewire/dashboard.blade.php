<div class="min-h-screen bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 flex flex-col items-center justify-center">
    <div class="w-full max-w-screen-lg bg-white rounded-lg shadow-lg p-6 mx-auto my-10">
        <div class="mb-10">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-24 h-24 flex items-center justify-center rounded-full overflow-hidden bg-gray-200 mr-4">
                        <img src="profile.jpg" alt="" class="w-full h-full object-cover" onerror="this.style.display='none'">
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">User Panel</h1>
                        <p class="text-lg text-gray-800">Welcome, {{$user->username}}!</p>
                    </div>
                </div>
                <a wire:click="logout" href="#" class="text-red-500 text-sm inline-block py-2 px-4 rounded-md border border-red-500 hover:bg-red-500 hover:text-white transition duration-300 ease-in-out transform hover:scale-105">Logout</a>
            </div>
            <div class="bg-gray-100 bg-opacity-25 rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800">User Information</h2>
                <div class="mb-4">
                    <p class="text-base text-gray-600"><span class="font-bold">Name:</span> {{$user->name}}</p>
                    <p class="text-base text-gray-600"><span class="font-bold">Username:</span> {{$user->username}}</p>
                    <p class="text-base text-gray-600"><span class="font-bold">Email:</span> {{$user->email}}</p>
                </div>
                <a href="#" class="text-blue-500 text-sm inline-block py-2 px-4 rounded-md border border-blue-500 hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out transform hover:scale-105">Edit Profile</a>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mb-10">
            <div class="flex justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">Project List</h2>
                <button wire:click="storeProject" class="text-white font-bold py-2 px-4 bg-blue-500 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">+ Add New Project</button>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach($projects as $project)
                    <div class="bg-green-100 hover:bg-green-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-2 text-green-800">
                                @if($project->new == 1)
                                    <input wire:model="title" value="new project" name="title">
                                @else
                                    {{$project->title}}
                                @endif
                            </h3>
                            <div class="flex items-center mb-2">
                                <div class="w-full bg-gray-300 rounded-full h-2">
                                    <div class="bg-green-500 rounded-full h-2 w-[70%]"></div>
                                </div>
                                <span class="ml-2 text-sm text-gray-600">70% Complete</span>
                            </div>
                            @if($project->new == 1)
                                <button wire:click="updateProject({{$project->id}})" class="text-blue-500 text-sm inline-block px-4 py-2 bg-blue-200 hover:bg-blue-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">Save</button>
                            @else
                                <button class="text-blue-500 text-sm inline-block px-4 py-2 bg-blue-200 hover:bg-blue-300 rounded-md transition duration-300 ease-in-out transform hover:scale-105">View Tasks</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
