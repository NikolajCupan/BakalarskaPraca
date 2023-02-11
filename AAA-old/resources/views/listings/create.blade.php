@extends('old.layout')

@section('content')

    <form method="post" action="/listings" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">

            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" class="form-control" name="tags" id="tags" value="{{old('tags')}}">

            @error('tags')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="company">Company:</label>
            <input type="text" class="form-control" name="company" id="company" value="{{old('company')}}">

            @error('company')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location" value="{{old('location')}}">

            @error('location')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">

            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" name="website" id="website" value="{{old('website')}}">

            @error('website')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" name="description"
                      id="description">{{old('description')}}</textarea>

            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-primary">Submit</button>

    </form>

@endsection
