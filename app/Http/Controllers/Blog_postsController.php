<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Blog_posts;
use App\Blog_comments;
use App\Blog_categories;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
class Blog_postsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
     //lister les blog_postss
     public function index(){
      $x=User::find(Auth::user()->id);
        $posts=DB::table('blog_posts')
        ->join('blog_categories','blog_categories.id','=','blog_posts.blog_categorie_id')
        ->select('blog_posts.id','blog_categories.name','blog_posts.image','blog_posts.title','blog_posts.body','blog_posts.updated_at')   
        ->get();
        if($x->is_admin){return view ('blog_posts.index',['posts'=>$posts]);}
        else{
           $comments=Blog_comments::all();
         return view ('blog_client.index',compact('posts','comments'));
        }
        
  }
public function consulter($id){
   $posts=DB::table('blog_posts')
        ->select('blog_posts.id','blog_posts.image','blog_posts.title','blog_posts.body','blog_posts.updated_at')   
       ->where('blog_posts.id','=',$id)
        ->get();
        $comments=DB::table('blog_comments')
        ->where("blog_comments.blog_posts_id","=",$id)
        ->select('blog_comments.updated_at','blog_comments.texte')
        ->get();
        return view ('blog_client.index',compact('posts','comments'));
}
  public function liste_posts(){
   $x=User::find(Auth::user()->id);
     $listposts=DB::table('blog_posts')
     ->join('blog_categories','blog_categories.id','=','blog_posts.blog_categorie_id')
     ->select('blog_posts.id','blog_categories.name','blog_posts.image','blog_posts.title','blog_posts.body','blog_posts.updated_at')   
     ->get();
     return view ('blog_client.index',['posts'=>$listposts]);
}
  //afficher le formulaire de creation
  public function create(){
     $listcat=Blog_categories::all();
     return view ('blog_posts.create',['categories'=>$listcat]);
  }
   //enregistrer un blog_post
  public function store(Request $request){
     $blog_post=new Blog_posts();
    //id_blog_categorie	author	image	image_alt	title	slug	meta_title	meta_description	body	
     $blog_post->title=$request->input('titre');
     $blog_post->blog_categorie_id=$request->input('categorie');
      $blog_post->image_alt=$request->input('alt');
      $blog_post->image='';

      if($request->hasFile('image')){
         $blog_post->image=$request->file('image')->store('images');
      }
     
     
      $blog_post->body=$request->input('body');
      $blog_post->meta_title=$request->input('metat');
      $blog_post->meta_description=$request->input('metad');
      $blog_post->slug=$request->input('slug');
      session()->flash('success','Article à été bien enregistré ! !');
 $blog_post->save();
 return  redirect ('blog_posts');
  }
  //recuperer un car -> mettre dans formulaire
  public function edit($id){
     $post=Blog_posts::find($id);
     $cat=Blog_categories::all();
     return view ('blog_posts.edit',compact('post','cat'));
  }
  
  public function details($id){
    $post=Blog_posts::find($id);
    $cat=Blog_categories::find($post->blog_categorie_id);
    
    return view ('blog_posts.details',compact('post','cat'));
  }
  //modifier un blog_post
  public function update(Request $request,$id){
     $blog_post=Blog_posts::find($id);
     $blog_post->title=$request->input('titre');

    $blog_post->blog_categorie_id=$request->input('categ');
    
     
      $blog_post->image_alt=$request->input('alt');
      $blog_post->image=$request->input('image');
      $blog_post->body=$request->input('body');
      $blog_post->meta_title=$request->input('metat');
      $blog_post->meta_description=$request->input('metad');
      $blog_post->slug=$request->input('slug');

      session()->flash('success','Article à été bien modifié ! !');
  $blog_post->save();
  return  redirect ('blog_posts');
  }
  //supprimer un blog_post
  public function destroy(Request $request,$id){
     $blog_post=Blog_posts::find($id);
     $blog_post->delete();
     session()->flash('success','Article à été bien Supprimée ! !');
     return redirect ('blog_posts');
  }
  public function getPosts(){
   header("Access-Control-Allow-Origin:http://localhost");
   $articles=Blog_posts::All();
   return $articles;
  }
}
