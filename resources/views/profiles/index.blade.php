@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            {{-- Nao consigo encontrar directoria local das imagens  --}}
            <img class='w-100 rounded-circle' src="{{$user->profile->profileImage()}}" alt="profile">
            {{-- '/storage/profile.png' --}}
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <h1>{{ $user->username }}</h1>
                    

                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"> </follow-button>
                
                </div>


                @can('update',$user->profile)
                    <a href="/p/create">Add new Post</a>
                @endcan 
            </div>
            @can('update',$user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile </a>
            @endcan
            <div class="d-flex"> 
                <div class="pr-2"><strong>{{$user->posts->count()}}</strong> Posts</div>
                <div class="pr-2"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-2"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="">{{$user->profile->url}}  </a></div>
        </div>

        <div class="row pt-5">
            @foreach ($user->posts as $post)
                {{-- <div>{{$post->image}}</div> --}}
                <div class="col-4 pb-3">
                    <a href="/p/{{$post->id}}">
                        <img class='w-100' src="/storage/{{$post->image}}">
                    </a>
                    
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
