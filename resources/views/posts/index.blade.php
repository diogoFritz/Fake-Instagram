@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-6 offset-4">
                <a href="/profile/{{$post->user->id}}"><img class="w-100" src="/storage/{{$post->image}}" alt=""></a>
            </div>
        </div>

        <div class="row pt-2 pb-2">
            <div class="col-6 offset-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img style="max-width: 40px;" class='w-100 rounded-circle' src="{{$post->user->profile->profileImage()}}" alt="">
                    </div>
        
                    <div>
                        <div class="font-weight-bold"><a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></div>
                    </div>

                    {{-- <a href="#" class="font-weight-bold pl-3">Follow</a> --}}
                </div>

                <p class="pt-2"><span class="font-weight-bold">{{$post->user->username}}:</span> {{$post->caption}}</p>
                <hr>

                
            </div>
        </div>  
        
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
