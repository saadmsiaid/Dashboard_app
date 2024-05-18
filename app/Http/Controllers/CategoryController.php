<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable|string',
        ]);
        if($request->hasFile('photo')){
        $ext = $request->photo->extension();
        $name = "img_" . now()->valueOf() . "." . $ext;
        $path = $request->photo->storeAs("images", $name, "public");

     
        Category::create([
            'name' => $validatedData['name'],
            'photo' => $path,
            'desc' => $validatedData['desc'],
        ]);
}
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = DB::table("categories")->where('id',$id)->get();
        return view("categories.edit", ["data" => $category]);
    }
 

    public function update(CategoryRequest $request)
    {
        $validatedData = $request->validated();
         $itm =DB::table('categories')->where('id',$request->id)->first();
        if ($request->hasFile('photo')) { 
            Storage::disk('public')->delete($itm->photo);
            $ext = $request->photo->extension();
            $name = "img_" . now()->valueOf() . "." . $ext;
            $path = $request->photo->storeAs("images", $name, "public");
            DB::table('categories')->where('id',$request->id)->update(
          [   

            "name"=>$validatedData['name'],
             "photo"=>$path,
            "desc"=>$validatedData['desc'],
             
        ]);
        }
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id); 
    
        $photoPath = $category->photo; 
    
        if ($photoPath) {
          
            Storage::disk('public')->delete($photoPath); 
        }
    
        $category->delete(); 
    
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function show($categoryId)
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.id', $categoryId)
            ->get();
    
        return view('produits.index', ["data" => $products]);
    }
    
}
