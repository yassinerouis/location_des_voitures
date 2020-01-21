<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_comments;
use App\Blog_posts;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

//autoriser pour l'admin (en general) , mais il y a des routes pour l'utilisateur

class Blog_commentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
     //lister les blog_commentss
     public function index(){

    
        $listcomments=DB::table('blog_comments')
        ->join('blog_posts','blog_posts.id','=','blog_comments.blog_posts_id')
        ->select('blog_comments.id','blog_posts.title','blog_comments.email','blog_comments.texte','blog_comments.name','blog_comments.active','blog_comments.updated_at')   
        ->get();
      
        return view ('blog_comments.index',['comments'=>$listcomments]);
  }
  //afficher le formulaire de creation
  public function create(){
     $listcat=Blog_posts::all();
     return view ('blog_comments.create',['posts'=>$listcat]);
  }
  public function create_c($id){
   $post=Blog_posts::find($id);
    session()->flash('success','Commentaire bien Supprimée ! !');
    
    return view ('blog_client.create',['post'=>$post]);
 }
   //enregistrer un blog_comment
  public function store(Request $request){
   $x=User::find(Auth::user()->id);
     $blog_comment=new Blog_comments();	
     $blog_comment->name=$request->input('nom');
     $blog_comment->blog_posts_id=$request->input('article');
      $blog_comment->texte=$request->input('texte');
      $blog_comment->email=$request->input('email');
      if($x->is_admin){
         $blog_comment->active=$request->input('active');
         $blog_comment->save();
         return  redirect ('blog_comments');
      }
 else{
   $blog_comment->active='non';
   $blog_comment->save();
   return redirect('blog_posts');
 } 
 session()->flash('success','Commentaire bien enregistré ! !');
  
  }
  //recuperer un commentaire -> mettre dans formulaire(admin)
  public function edit($id){
     $com=Blog_comments::find($id);
     $post=Blog_posts::all();
     return view ('blog_comments.edit',compact('post','com'));
  }
  
  public function details($id){
    $com=Blog_comments::find($id);
    $post=Blog_posts::find($com->blog_post_id);
    
    return view ('blog_comments.details',compact('post','com'));
  }
  //modifier un blog_post
  public function update(Request $request,$id){
     $blog_comment=Blog_comments::find($id);
     
     $blog_comment->name=$request->input('nom');
     $blog_comment->blog_post_id=$request->input('article');
      $blog_comment->texte=$request->input('texte');
      $blog_comment->email=$request->input('email');
      $blog_comment->active=$request->input('active');

      session()->flash('success','Commentaire bien modifié ! !');
  $blog_comment->save();
  return  redirect ('blog_comments');
  }
  //supprimer un blog_post
  public function destroy(Request $request,$id){
    $blog_comment=Blog_comments::find($id);
    $blog_comment->delete();
     session()->flash('success','Commentaire bien Supprimée ! !');
     return redirect ('blog_comments');
  }
  public function getComments($id){
   header("Access-Control-Allow-Origin:http://localhost");

   $article=Blog_posts::find($id);
   return $article->comments;
  }
  public function addComment(Request $request,$id){
   $comment=new Blog_comments();
   $comment->name=$request->name;
   $comment->email=$request->email;
   $comment->texte=$request->texte;
   $comment->blog_posts_id=$id;
   $comment->active="non";
   $comment->save();
   return Response()->json(['etat'=>true,'id'=>$comment->id]);
  }
}
