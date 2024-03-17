<div>



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



    <img class="absolute w-screen h-screen" src="{{ 'storage/images/bg.jpg' }}">
    <div class="absolute w-screen h-screen flex justify-center items-center">
        <div class="bg-slate-50 w-4/5 md:w-5/12 rounded-md">
            <h2 class="text-center text-2xl font-bold my-10">CREATE ACCOUNT</h2>
            <div class="grid">
                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="name" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="name" placeholder="Your Name">
                    @error('name')
                    <small class="text-red-800 absolute text-[0.65rem] bottom-0.5">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="username" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="username" placeholder="Your Username">
                    @error('username')
                    <small class="text-red-800 absolute text-[0.65rem] bottom-0.5">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="email" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="email" name="email" placeholder="Your Email">
                    @error('email')
                    <small class="text-red-800 absolute text-[0.65rem] bottom-0.5">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="password" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="password" name="password" placeholder="Password">
                    @error('password')
                    <small class="text-red-800 absolute text-[0.65rem] bottom-0.5">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="password_confirmation" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="password" name="password_confirmation" placeholder="Repeat your password">
                    @error('password_confirmation')
                    <small class="">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative mb-5 w-10/12 bg-gray-50 text-gray-700 py-3 mx-auto">
                    <input class="absolute top-4 left-2 cursor-pointer w-3.5 h-3.5 mt-1" type="checkbox" name="agree-term">
                    <label class="ml-7 text-xs font-medium" for="agree-term">I agree all statements in Terms of service</label>
                </div>
                <button wire:click="handleRegister" class="mb-5 w-10/12 bg-gray-50 text-gray-700 py-3 mx-auto text-gray-700 bg-gradient-to-r from-blue-500 to-teal-400 rounded-md px-5 py-4 text-sm text-gray-50 font-bold">SIGN UP</button>

                <a href="/register" class="block w-10/12 mx-auto mb-5 text-sm text-gray-700 text-center">Have an account? Log in</a>
            </div>
        </div>
    </div>
</div>
