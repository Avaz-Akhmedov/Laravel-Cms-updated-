<x-layout>


    <div class="container mx-auto flex justify-center items-center flex-wrap py-6">

        <div class="absolute top-[100px] left-[35px]">
            <a href="{{route("posts.index")}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-left-long"></i> Back
            </a>
        </div>

        <section class="w-full md:w-2/3 flex ">

            <article class="flex flex-col mt-16  shadow-lg my-4">
                <!-- Article Image -->
                    <img loading="lazy" class="object-cover" src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}" alt="{{$post->title}}">

                <div class=" bg-white flex flex-col gap-2 justify-start pt-6 px-4">

                    <p class="text-3xl font-bold text-center text-blue-700 hover:text-blue-800  pb-4">{{$post->title}}</p>

                    <button
                        class="px-4 w-[150px] justify-content-end font-bold text-center uppercase py-2 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded-md">
                        {{$post->category->name}}
                    </button>

                    <p class="pb-6 text-xl font-semibold">{!! $post->content !!}</p>

                    <p class="text-lg pb-3  hover:text-gray-800">
                        {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                    </p>

                    <div class="flex gap-2 flex-wrap mt-4">
                        <x-post-tags :tags="$post->tags"></x-post-tags>
                    </div>

                </div>
            </article>


        </section>
    </div>


</x-layout>
