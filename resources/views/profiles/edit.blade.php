@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit page</h1>
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="Post">
        {{-- Questao de seguranca --}}
        @csrf
        @method('PATCH')

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label">Title</label>
            <input id="title" name='title' type="text" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">Description</label>
            <input id="description" name='description' type="text" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('description') ?? $user->profile->description  }}" autocomplete="description" autofocus>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group row">
            <label for="url" class="col-md-4 col-form-label">URL</label>
            <input id="url" name='url' type="text" class="form-control @error('url') is-invalid @enderror"
                value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

            @error('url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
            @enderror

        </div>

        <div class="row">
            <label for="image" class="col-md-4 col-form-label">Profile Image</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('image')}}</strong>
            </span>
            @enderror
        </div>

        <div class="row pt-4">
            <button class="btn btn-primary">Save Profile</button>
        </div>
</div>

</form>
</div>
@endsection