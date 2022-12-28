<x-layout>

    <div class="overflow-x-auto  bg-gray-100">

        <a href="{{route("posts.create")}}"
           type="submit"
           class="w-[200px] absolute top-[120px] text-center right-[130px] text-lg px-2 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-700  focus:bg-indigo-600 focus:outline-none">
            Create Post
        </a>

        <div class="absolute top-[120px] left-[35px]">
            <a href="{{route("admin.dashboard")}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-left-long"></i> Back
            </a>
        </div>

        <div class="min-w-screen min-h-screen mt-16 flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">Category</th>
                            <th class="py-3 px-6 text-center">Created At</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                            <th class="py-3 px-6 text-center"></th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach($posts as $post)
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <a href="{{route("admin.posts.show",$post->id)}}"
                                           class="font-medium text-blue-800 underline text-lg">{{$post->title}}</a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="bg-blue-700 text-base text-white  py-1 px-3 font-medium  rounded-full">{{$post->category->name}}</span>
                                    </div>
                                </td>



                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium text-lg">{{ $post->created_at }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center gap-2 justify-center">
                                        <a class=" text-xl" href="{{route("posts.edit",$post->id)}}">
                                            <i class="fa-solid text-green-700 fa-pen-to-square"></i>
                                        </a>

                                        <form method="POST" action="{{route("posts.destroy",$post->id)}}">
                                            @csrf
                                            @method("DELETE")
                                            <button class=" text-xl">
                                                <i class="fa-solid text-red-700 fa-trash"></i>
                                            </button>
                                        </form>

                                        <a class=" text-xl" href="{{route("admin.posts.show",$post->id)}}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </td>



                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        @if($post->is_active)
                                            <a  href="{{route("posts.status",$post->id)}}"  class=" status text-2xl   py-1 px-3 font-medium rounded-full">
                                                <i class="fa-solid  text-blue-600 fa-square-check"></i>
                                            </a>
                                        @else
                                            <a  href="{{route("posts.status",$post->id)}}"  class="text-2xl py-1 px-3 font-medium rounded-full">
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
        </div>
    </div>


    @push("scripts")
   <script>

   </script>
    @endpush

</x-layout>
