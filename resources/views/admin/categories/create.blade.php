<x-layout>


    <div class="container mt-4 mx-auto mt-8">

        <div class="absolute top-[25px] left-[35px]">
            <a href="{{route("posts.category.index")}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-left-long"></i> Back
            </a>
        </div>


        <div class="text-center">
            <h1 class="my-3 text-3xl font-bold text-black">Create Category</h1>
        </div>

        <div>
            <form action="{{route("posts.category.store")}}" method="POST" >
                @csrf


                <div class="mb-8">
                    <label for="name" class="block mb-2 text-lg capitalize text-black">Category Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="John Doe"
                        value="{{old("name")}}"
                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                    />
                    @error("name")
                    <p class="text-red-700">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <button
                        type="submit"
                        class="w-[200px] text-lg px-2 py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                        Create Category
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
                focus: true, height: 250,  disableResizeEditor: true
            });

            $("#tags").select2({
                maximumSelectionLength: 10,
                tags: true,
                tokenSeparators: [',', ' '],
            });
        </script>
    @endpush

</x-layout>
