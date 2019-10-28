<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Messages;
use Illuminate\Support\Facades\DB;
class MessagesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
      }
     //lister les cars
     public function index(){
        $x=User::find(Auth::user()->id);
        if($x->is_admin){
         $listcar=DB::table('messages')
         ->join('users',"messages.user_id",'=','users.id')
         ->select('messages.id','messages.updated_at','messages.sujet','messages.message','users.name')   
        
        ->where("users.id",'=',$x->id)
         ->get();
         return view ('messages.index',['msgs'=>$listcar]);
        } 
        else{
         $listcar=DB::table('messages')
         ->join('users',"messages.user_id",'=','users.id')
         ->select('messages.id','messages.updated_at','messages.sujet','messages.message','users.name')   
        
        ->where("users.id",'=',$x->id)
         ->get();
         return view ('messages_clients.index',['msgs'=>$listcar]);
        }
       
  }
  //afficher le formulaire de creation
  public function create(){
   $x=User::find(Auth::user()->id);
   if($x->is_admin){
     $listcat=User::all();
     return view ('messages.create',['users'=>$listcat]);
   }
   else return view ('messages_clients.create');
  }
   //enregistrer un car
  public function store(Request $request){
   $x=User::find(Auth::user()->id);
   $message=new Messages();
   $message->message=$request->input('msg');
      $message->sujet=$request->input('sujet');
      
   if($x->is_admin) {$message->user_id=1;
      $message->envoye_id=$request->input('user');
   
   }
   else {
      $message->user_id=$x->id;
      $message->envoye_id=1;
   }

      session()->flash('success','Le message à été bien envoyé ! !');
  $message->save();
  
  return  redirect ('messages');
  }
  public function details($id){
   $x=User::find(Auth::user()->id);
    $message=Messages::find($id);
    if($x->is_admin){
      $user=User::find($message->user_id);
      return view ('messages.details',compact('message','user'));
    }
    else  return view ('messages_clients.details',compact('message','user'));
   }
 
  //supprimer un car
  public function destroy(Request $request,$id){
     $msg=Messages::find($id);
     $msg->delete();
     session()->flash('success','Le message à été bien Supprimée ! !');
     return redirect ('messages');
  }


  public function index_re(){
   $x=User::find(Auth::user()->id);
   $listcar=DB::table('messages')
    ->join('users',"messages.user_id",'=','users.id')
    ->select('messages.id','messages.updated_at','messages.sujet','messages.message','users.name')   
    ->where('messages.envoye_id','=',$x->id)
    ->get();
   if($x->is_admin){
      return view ('messages_re.index_re',['msgs'=>$listcar]);
   }
    else 
    return view ('messages_clients_re.index_re',['msgs'=>$listcar]);
}

public function repondre($id){
   $m=Messages::find($id);
   $cli=User::find($m->user_id);
   return view('messages_re.repondre',['client'=>$cli]);
}
public function details_re($id){
   $x=User::find(Auth::user()->id);
$message=Messages::find($id);
$user=User::find($message->user_id);

if($x->is_admin)
return view ('messages_re.details_re',compact('message','user'));
else return view ('messages_clients_re.details_re',compact('message','user'));
}

//supprimer un car
public function destroy_re(Request $request,$id){
 $msg=Messages::find($id);

 $msg->delete();
 session()->flash('success','Le message à été bien Supprimée ! !');
 return redirect ('messages_re');
}
}
