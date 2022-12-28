<x-layout>

<div class="@if($page->is_active == 0)  hidden @endif">
    {!! $page->content !!}
</div>

</x-layout>
