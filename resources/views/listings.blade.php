<h1>{{$heading}}</h1>
<div>
    @unless(count($listings)==0)
        @foreach($listings as $listing)
            <div>
                <a href="/listings/{{$listing["id"]}}">{{$listing["title"]}}</a>
                <p>{{$listing["description"]}}</p>
            </div>
        @endforeach
    @else
        <p>No Listings Found</p>
    @endunless
</div>