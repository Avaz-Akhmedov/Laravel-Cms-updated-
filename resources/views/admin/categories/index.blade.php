<x-layout>


    <section class="container mx-auto p-6 font-mono">
        <div class="w-full  overflow-hidden rounded-lg">
            <a href="{{route("posts.category.create")}}"
                type="submit"
                class="w-[200px] absolute top-[120px] text-center right-[147px] text-lg px-2 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-700  focus:bg-indigo-600 focus:outline-none">
                Create Category
            </a>

            <div class="absolute top-[120px] left-[35px]">
                <a href="{{route("admin.dashboard")}}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-left-long"></i> Back
                </a>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="w-full mt-16">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3 text-center">Category Name</th>
                        <th class="px-4 py-3 text-center">Number of posts</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                        <th class="px-4 py-3 text-center"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($categories as $category)
                    <tr >
                        <td class="px-4 py-3 border text-center ">
                            <span class="px-2 py-1 font-semibold leading-tight bg-blue-700 text-white rounded-sm uppercase"> {{$category->name}} </span>
                        </td>

                        <td class="px-4 py-3 border text-center ">
                            <span class=" font-bold leading-tight  text-black rounded-sm uppercase"> {{$category->posts_count}} </span>
                        </td>

                        <td class="px-4 py-3 text-xs border">
                            <div class="flex justify-center gap-2 items-center">
                                <form method="POST" action="{{route("posts.category.destroy",$category->id)}}">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit"  class="text-2xl" >
                                        <i class="fa-sharp text-red-600 fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm border">

                            <div class="flex items-center justify-center">
                                @if($category->is_active)
                                    <a href="{{route("posts.category.status",$category->id)}}"   class=" status text-2xl   py-1 px-3 font-medium rounded-full">
                                        <i class="fa-solid  text-blue-600 fa-square-check"></i>
                                    </a>
                                @else
                                    <a href="{{route("posts.category.status",$category->id)}}"  class="text-2xl py-1 px-3 font-medium rounded-full">
                                        <i class="fa-regular fa-square"></i>
                                    </a>
                                @endif
                            </div>

                        </td>
                    </tr>
            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-layout>
