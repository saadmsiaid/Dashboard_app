<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 function index() {
    
    $pr=DB::table('products')->get();
    return view("produits.index",["data"=>$pr]);
 }
 function ajoute() {

  $cat=DB::table('categories')->get();
  
   return view("produits.ajouter",["data"=>$cat]);
 }
 function update($id) {
   
   $pr=DB::table('products')->where('id',$id)->get();
   return view("produits.edit",["data"=>$pr]);
 }
 function destroy($id) {
  
   DB::table('products')->where('id', $id)->delete();
        
   return redirect()->route('product.index');
  
 }
 function store(Request $request){
 
   if($request->hasFile('photo')){
    $ext=$request->photo->extension();
    $name="img_".now()->valueOf().".".$ext;
    $path=$request->photo->storeAs("images",$name,"public");
    DB::table('products')->insert(
    [   "desg"=>$request->desg,
        "qtes"=>$request->qtes,
        "category_id"=>$request->category,
        "pu"=>$request->pu,
        "photo"=>$path
  ]);
  $status="Product ajouté avec succès";
  session()->flash("status",$status);
   return redirect()->route('product.index');
   
}
   
 
 }

 function edit(Request $req){

  $itm =DB::table('products')->where('id',$req->id)->first();
 
  if ($req->hasFile('photo')) {
      
 
      Storage::disk('public')->delete($itm->photo);
     
      $ext=$req->photo->extension();
      $name="img_".now()->valueOf().".".$ext;
      $path=$req->photo->storeAs("images",$name,"public");
      
  

  DB::table('products')->where('id',$req->id)->update(
    [   "desg"=>$req->desg,
        "qtes"=>$req->qtes,
        "pu"=>$req->pu,
        "photo"=>$path
  ]);
}

      session()->flash('notif.success', 'Post updated successfully!');
      return redirect()->route('product.index');
  


   

}   




//  function show($id){
//    $pr=DB::table('products')->where('id',$id)->get();
//    return view('produits.index', ["data" => $pr]);
//  }






}
