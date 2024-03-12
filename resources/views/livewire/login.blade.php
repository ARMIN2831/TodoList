<div>
    <img class="absolute w-screen h-screen" src="{{ 'storage/images/bg.jpg' }}">
    <div class="absolute w-screen h-screen flex justify-center items-center">
        <div class="bg-slate-50 w-4/5 md:w-5/12 rounded-md">
            <h2 class="text-center text-2xl font-bold my-10">SIGN UP</h2>
            <div class="grid">

                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="data.email" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="email" name="email" placeholder="Your Email">
                    @error('data.email')
                    <small class="text-red-800 absolute text-[0.65rem] bottom-0.5">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative w-full flex justify-center items-center">
                    <input wire:model="data.password" class="mb-5 w-10/12 bg-gray-50 text-gray-700 border rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="password" name="password" placeholder="Password">
                    @error('data.password')
                    <small class="text-red-800 absolute text-[0.65rem] bottom-0.5">{{$message}}</small>
                    @enderror
                </div>

                <div class="relative mb-5 w-10/12 bg-gray-50 text-gray-700 py-3 mx-auto">
                    <input class="absolute top-4 left-2 cursor-pointer w-3.5 h-3.5 mt-1" type="checkbox" name="agree-term">
                    <label class="ml-7 text-xs font-medium" for="remember">Remember me</label>
                </div>
                <button wire:click="handleLogin" class="mb-5 w-10/12 bg-gray-50 text-gray-700 py-3 mx-auto text-gray-700 bg-gradient-to-r from-blue-500 to-teal-400 rounded-md px-5 py-4 text-sm text-gray-50 font-bold">SIGN UP</button>
            </div>
        </div>
    </div>
</div>
