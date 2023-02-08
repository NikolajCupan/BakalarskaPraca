@extends('layout')

@section('content')

    <form method="post" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$listing->title}}">

            @error('title')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" class="form-control" name="tags" id="tags" value="{{$listing->tags}}">

            @error('tags')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="company">Company:</label>
            <input type="text" class="form-control" name="company" id="company" value="{{$listing->company}}">

            @error('company')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location" value="{{$listing->location}}">

            @error('location')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$listing->email}}">

            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" name="website" id="website" value="{{$listing->website}}">

            @error('website')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Default file input example</label>
            <input type="file" class="form-control" name="image" id="image">

            <img src="{{
                $listing->image ? asset('storage/' . $listing->image) : asset('/images/image.png')
            }}" class="card-img-top" alt="...">

            @error('image')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" name="description" id="description">{{$listing->description}}</textarea>

            @error('description')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-primary">Submit</button>

    </form>

@endsection
