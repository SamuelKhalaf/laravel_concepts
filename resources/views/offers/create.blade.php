@extends('layouts.master')
@section('content')
    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{route('offers.store')}}">
            @csrf
            <div class="mb-3">
                <label for="offer-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="offer-name" name="name" value="{{old('name')}}" >
                @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="offer-description" class="form-label">Description</label>
                <textarea id="offer-description" name="description" rows="3" class="form-control">{{old('description')}}</textarea>
                @error('description')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="offer-price" class="form-label">Price</label>
                <input type="text" class="form-control" id="offer-price" name="price" value="{{old('price')}}">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="offer-status" class="form-label">Status</label>
                <select class="form-select" name="status" id="offer-status">
                    <option value="" {{old('status') === null ? '' : 'selected' }}>open this menu to select</option>
                    <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>active</option>
                    <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>inactive</option>
                </select>
                @error('status')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save Offer</button>
        </form>
    </div>

@endsection
