@extends('layout')

@section('content')

    <form method="post" action="/listings">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title">

            @error('title')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" class="form-control" name="tags" id="tags">

            @error('tags')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="company">Company:</label>
            <input type="text" class="form-control" name="company" id="company">

            @error('company')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location">

            @error('location')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email">

            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" name="website" id="website">

            @error('website')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" id="description">

            @error('description')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-primary">Submit</button>

    </form>

@endsection
