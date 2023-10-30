@props(['listing'])
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src={{$listing->logo ? asset("storage/".$listing->logo) : asset("images/laravel.png")}}
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <ul class="flex">
                @foreach (explode(', ', $listing->tags) as $tag)
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="/?tag={{$tag}}">{{ucfirst($tag)}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>