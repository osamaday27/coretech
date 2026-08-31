<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    //
    public function index(){

        $productsOfDB = Product::all();
        return view('products.index',['products'=>$productsOfDB]);
    }

    public function show($productId){

       $product = Product::find($productId);
        return view('products.show',['product'=>$product]);
    }
    public function create(){
        $categories = Category::all();
        return view('products.create',['categories'=>$categories]);
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'description' => $request->description,
        'image' => $imagePath
    ]);

            return to_route('products.index');
        }

    public function edit(Product $product){

  $categories = Category::all();
        return view('products.edit',['categories'=>$categories,'product'=>$product]);
    }

   public function update(Request $request, Product $product)
{
    // ✅ Check data
    $request->validate([
        'name' => 'required|min:3',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // ✅ data reqiuerment
    $data = $request->only(['name', 'price', 'category_id', 'description']);

    // ✅ لو المستخدم رفع صورة جديدة
    if ($request->hasFile('image')) {
        // حذف الصورة القديمة إن وُجدت (اختياري)
        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }

        // رفع الصورة الجديدة
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    // ✅ update product
    $product->update($data);

    return to_route('products.index');
}



     public function destroy($productId)
    {
        //1- delete the post from database
            //select or find the post
            //delete the post from database
        $product = Product::find($productId);
        $product->delete();

        // Post::where('id', $postId)->delete();       حل اخر ----

        //2- redirect to posts.index
        return to_route('products.index');
    }

}
