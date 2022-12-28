<x-layout>

    @push("styles")
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
              integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
              crossorigin="anonymous"
              referrerpolicy="no-referrer"/>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

    <div class="container mt-4 mx-auto mt-8">

        <div class="text-center">
            <h1 class="my-3 text-3xl font-bold text-black">Update Post</h1>
        </div>

        <div>
            <form action="{{route("posts.update",$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")

                <div class="mb-8">
                    <label for="title" class="block mb-2 text-lg capitalize text-black">Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="John Doe"
                        value="{{$post->title}}"
                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                    />
                    @error("title")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="category" class="block mb-2 text-lg capitalize text-black">Category</label>

                    <select name="category_id" id="category" class="w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($categories as $category)
                            <option class="@if($category->is_active ==0 ) hidden @endif" @selected($post->category->id == $category->id) value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="tags" class="block mb-2 text-lg capitalize text-black">tags</label>

                    <select id="tags" name ="tags[]" class="form-control w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" multiple="multiple">

                        @foreach($tags as $tag)
                            <option value="{{$tag->name}}" @selected($post->tags->contains($tag->id))>{{$tag->name}}</option>
                        @endforeach

                    </select>
                    @error("tags")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-8">
                    <label for="image" class="block mb-2 text-lg capitalize text-black">image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                    />
                    @error("image")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-8">
                    <label for="summernote" class="block mb-2 text-lg capitalize text-black">Content</label>

                    <textarea
                        name="content"
                        id="summernote"
                        placeholder="Content"
                        rows="3"
                        class="  w-full px-3  placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                        {{$post->content}}
                    </textarea>

                    @error("content")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-8">
                    <button
                        type="submit"
                        class="w-[200px] text-lg px-2 py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>


    @push("scripts")
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
                integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>

            $('#summernote').summernote({
                focus: true, height: 250, disableResizeEditor: true
            });

            $("#tags").select2({
                maximumSelectionLength: 10,
                tags: true,
                tokenSeparators: [',', ' '],
            });
        </script>
    @endpush

</x-layout>
