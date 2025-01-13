@extends('layouts.master')
@section('content')
    <div class="container my-4">
        <table class="table table-success table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Offer name</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @if($offers)
                @foreach($offers as $offer)
                    <tr>
                        <td>{{$offer->name}}</td>
                        <td>{{$offer->description}}</td>
                        <td>{{$offer->price}}</td>
                        <td>{{$offer->status}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
