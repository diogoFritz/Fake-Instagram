<?php

namespace App\Http\Controllers;

use \App\Models\Post as Post;

use Illuminate\Http\Request;
//importar pacote para manipular a imagem
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        
        //$posts = Post::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
        $posts = Post::whereIn('user_id',$users)->latest()->paginate(5);
        //dd($posts);
        return view('posts.index',compact('posts'));

    }
    public function create(){
        return view('posts.create');
    }

    public function store(){
       // dd(request()->all());
       //dd('/profile/'.auth()->user()->id);

       $data = request()->validate([
           
           'caption' => 'required',
           'image' => 'required|image',
       ]);

       $imagePath = request('image')->store('uploads','public');
        //GP package xammp enable extension in php.ini
       $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
       //auth()->user()->posts()->create($data);

         auth()->user()->posts()->create([
           'caption' => $data['caption'],
           'image' => $imagePath,
        ]);
        
       return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post) {
        //dd($post);
       
        return view('posts.show', compact('post'));
    }
}
