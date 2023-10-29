@extends('layout')

@section('content')
<h2>{{$heading}}</h2>
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
@endsection