<?php

namespace App\Http\Controllers;


use App\Models\User as User;

use Illuminate\Http\Request;
//importar pacote para manipular a imagem
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        //dd($user);
        //$user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //dd($follows);

        return view('profiles.index',compact('user','follows'));
/*         return view('profiles.index',[
            'user' => $user,
            'follows' =>$follows,
        ]); */
    }

    public function edit(User $user){
        //dd($user);
        //policy card
        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){

        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
    ]);


    if (request('image')){
        $imagePath = request('image')->store('profile','public');
            
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();

        $imageArray = ['image' => $imagePath];
    }

    //dd($data);
/*     dd(array_merge(
        $data,
        ['image' => $imagePath]
    )); */
    

    auth()->user()->profile->update(array_merge(
        $data,
        $imageArray ?? []
    ));

    return redirect("/profile/$user->id");
    }
}
