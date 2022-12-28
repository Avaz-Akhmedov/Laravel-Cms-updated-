<x-layout>

    <div class="flex-col w-full h-screen  md:flex md:flex-row md:min-h-screen">


        <div class="flex flex-col flex-shrink-0 w-full min-h-screen text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800">

            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                <a
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Laravel
                    CMS</a>
            </div>

            <nav class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">

                <a href="{{route("admin.posts.index")}}"
                   class=" block px-4 py-2 mt-2 text-xl font-semibold text-gray-900  rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{request()->is("admin/categories") ? "bg-gray-600 " : "bg-transparent " }}  ">Posts</a>


            <a href="{{route("posts.category.index")}}"
               class=" block px-4 py-2 mt-2 text-xl font-semibold text-gray-900  rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{request()->is("admin/tables") ? "bg-gray-600 " : "bg-transparent " }}  "
                >Categories</a>

                <a href="{{route("admin.pages.index")}}"
                   class=" block px-4 py-2 mt-2 text-xl font-semibold text-gray-900  rounded-lg  dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{request()->is("admin/menus") ? "bg-gray-600 " : "bg-transparent " }}  "
                >Pages</a>




                <form method="POST" action="{{ route('logout.perform') }}">
                    @csrf
                    <button type="submit"
                            class="inline-block mt-2 ml-2 px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                        Logout
                    </button>
                </form>


            </nav>
        </div>
    </div>



</x-layout>
