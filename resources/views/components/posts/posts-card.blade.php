@props( [ 'post' ] )
<div class="md:col-span-1 col-span-3">
    <a href="{{$post->image}}">
        <div>
            <img class="w-full rounded-xl" src="{{$post->image}}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <a href="http://127.0.0.1:8000/categories/laravel"
                class="bg-red-600 text-white rounded-xl px-3 py-1 text-sm mr-3">
                Laravel
            </a>
            <p class="text-gray-500 text-sm">{{$post->published_at->diffforhumans()}}</p>
        </div>
        <a class="text-xl font-bold text-gray-900">{{$post->title}}</a>
    </div>

</div>