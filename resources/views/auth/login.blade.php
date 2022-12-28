<x-layout>

    <form method="POST" action="{{route("login.perform")}}" class="flex justify-center h-screen w-screen items-center">
        @csrf
        <div class="w-full md:w-1/2 flex flex-col items-center " >
            <!-- text login -->
            <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">LOGIN</h1>
            <!-- email input -->
            <div class="w-3/4 mb-6">
                <input type="email" name="email"  class="w-full py-4  px-8 bg-slate-200 placeholder:font-semibold rounded hover:ring-1 outline-blue-500" placeholder="Email">
                @error("email")
                <p class="text-base text-red-600">{{$message}}</p>
                @enderror
            </div>
            <!-- password input -->
            <div class="w-3/4 mb-6">
                <input type="password" name="password"  class="w-full py-4  px-8 bg-slate-200 placeholder:font-semibold rounded hover:ring-1 outline-blue-500 " placeholder="Password">
                @error("password")
                <p class="text-base text-red-600">{{$message}}</p>
                @enderror
            </div>
            <!-- button -->
            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-blue-400 w-full rounded text-blue-50 font-bold hover:bg-blue-700"> LOGIN</button>
            </div>
        </div>
    </form>


</x-layout>
