<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lista;

class HomeController extends Controller {
    public function home(){
      $lista = Lista::all();

      $array = array('lista'=>$lista);

      return view('home',$array);
    }
    public function add(Request $req){
    if($req->has('item')){
        $item = $req->input('item');

        $lista = new Lista;
        $lista->item = $item;
        $lista->save();

      }
        return redirect('/');
    }
    public function del($id){
      Lista::find($id)->delete();
      
      return redirect('/');
    }
}
