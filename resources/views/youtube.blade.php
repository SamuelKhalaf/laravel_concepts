@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw?si=wuCW0E1hiOHZxvbj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div>
            <p>the total views is ({{$video->views}})</p>
        </div>
    </div>
@endsection
