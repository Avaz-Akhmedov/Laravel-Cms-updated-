<x-layout>


    @push("styles")
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

    <div class="container mt-4 mx-auto mt-8">

        <div class="absolute top-[115px] left-[35px]">
            <a href="{{route("admin.pages.index")}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-left-long"></i> Back
            </a>
        </div>

        <div class="text-center">
            <h1 class="my-3 text-3xl font-bold text-black">Edit Page</h1>
        </div>

        <div>
            <form action="{{route("admin.pages.update",$page->id)}}" method="POST"   >
                @csrf
                @method("PATCH")

                <div class="mb-8">
                    <label for="title" class="block mb-2 text-lg capitalize text-black">Url</label>
                    <input
                        type="text"
                        id="title"
                        name="url"
                        placeholder="About"
                        value="{{$page->url}}"
                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                    />
                    @error("url")
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
                        {{$page->content}}
                    </textarea>

                    @error("content")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-8">
                    <button
                        type="submit"
                        class="w-[200px] text-lg px-2 py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                        Update Page
                    </button>
                </div>
            </form>
        </div>
    </div>


    @push("scripts")

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>

            $('#summernote').summernote({
                focus: true, height: 250,
            });

        </script>
    @endpush

</x-layout>


