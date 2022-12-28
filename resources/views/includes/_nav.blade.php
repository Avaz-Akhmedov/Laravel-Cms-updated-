<nav
    class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900  w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a class="text-2xl text-white font-bold" href="{{route("home")}}">Laravel Cms</a>
        <div class="flex md:order-2">
            @include("includes._search")
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                <li>
                    <a href="{{route("home")}}" class="block py-2 pl-3 pr-4   text-xl rounded md:bg-transparent md:p-0 {{request()->is("/") ? "text-blue-500" : "text-gray-400" }} ">Home</a>
                </li>


                <li>
                    <a href="{{route("posts.index")}}" class="block py-2 pl-3 pr-4   text-xl rounded md:bg-transparent md:p-0 {{request()->is("posts") ? "text-blue-500" : "text-gray-400" }} ">Posts</a>
                </li>



                    <li>
                        <div class="relative group">
                            <a href="#" class="block py-2 pl-3 pr-4   text-xl rounded md:bg-transparent md:p-0 text-gray-400 ">Pages</a>

                            <div class="items-center flex flex-col justify-center z-40 absolute border border-t-0 rounded-b-lg  bg-white  invisible group-hover:visible w-auto ">
                                @foreach($pages as $page)
                                <a href="/{{$page->url}}"  class=" @if($page->is_active == 0) hidden @endif px-4 py-2 text-lg  block text-black hover:text-blue-800">{{$page->url}}</a>
                                @endforeach
                        </div>
                    </li>



            </ul>
        </div>
    </div>
</nav>
