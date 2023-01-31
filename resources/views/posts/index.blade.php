<x-layout>

    <div class="container mx-auto flex justify-center items-center flex-wrap py-6">
        <section class="w-full md:w-2/3 flex flex-col px-3 mt-8">
            @foreach($posts as $post)
                <article class=" @if($post->is_active == 0) hidden  @endif flex flex-col  shadow-lg my-4">
                    <!-- Article Image -->
                    <img class="h-[400px] object-cover object-center"
                         src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}" alt="{{$post->title}}">
                    <div class="bg-gray-300 flex flex-col gap-2 justify-start pt-6 px-1">

                        <button
                            class="px-4 w-[150px] font-bold text-center uppercase py-2 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded-md">
                            {{ $post->category->name}}
                        </button>

                        <a href="{{route("posts.show",$post->id)}}"
                           class="text-3xl font-bold text-blue-700 hover:text-blue-800 underline pb-4">
                            {{$post->title}}
                        </a>

                        <p class="text-lg pb-3  hover:text-gray-800">
                            {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                        </p>

                        <p class="pb-6  text-xl font-semibold line-clamp-3">{!!$post->content  !!}...</p>
                        <a href="{{route("posts.show",$post->id)}}"
                           class="uppercase text-blue-800 font-semibold hover:font-bold">
                            Continue Reading<i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach


        </section>
    </div>

         
          
</x-layout> 
