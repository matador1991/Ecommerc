<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index()  //show all products
   {

      $prod=Product::select(['id','name','photo','status','price'])->paginate(5);

       return view('admin.products.show',compact('prod'));
   }
public function addproduct() //return Add Product Interface
{
       return view('admin.products.add');
}
public function add(ProductsRequest $request) //Add New Product
{
    try {
        $filename = "";
        if ($request->has('photo'))
            $filename=uploadImage('prod-photo',$request->photo);
        Product::create(['name' => $request->name, 'photo' => $filename, 'status' => $request->status,'price'=>$request->price,
            'slug'=>Str::slug($request->name)]);

        return redirect()->route('product.index')->with(['alert-type' => 'success', 'message' => 'added done']);
    }catch (\Exception $ex){
        return redirect()->route('product.add')->with(['alert-type' => 'failed', 'message' => 'add error']);
    }

}
public function edit($id) //return Edit Product Interface
{
   $prod=Product::find($id);
   return view('admin.products.edit',compact('prod'));
}
public function update(ProductsRequest $request) //Update Product
{
    try{

        $filename='';
        $prod=Product::find($request->id);
        if($request->has('photo')){
            unlink(public_path('/admin/'.$prod->photo));
            $filename=uploadImage('prod-photo',$request->photo);
            $prod->update(['photo'=>$filename]);
        }

        $prod->update(['name'=>$request->name,'status'=>$request->status,
            'price'=>$request->price,'slug'=>Str::slug($request->name)]);
        return redirect()->route('product.index')->with(['alert-type'=>'success','message'=>'update done']);
    }catch (\Exception $ex){
        return redirect()->route('product.index')->with(['alert-type' => 'failed', 'message' => 'update error']);
    }
}
public function delete($id) //Delete Product
{
       try{
       $prod=Product::find($id);
           if($prod->photo != null){
               unlink(public_path('/admin/'.$prod->photo));
           }
       $prod->delete();
    return redirect()->route('product.index')->with(['alert-type'=>'success','message'=>'delete done']);
}catch (\Exception $ex){

return redirect()->route('product.index')->with(['alert-type'=>'danger','message'=>'error delete']);
}
  }

   public function active($id) //Active Products
   {
       try{
           $cate=Product::find($id);
           if( $cate->status== 1)
               $cate->update(['status'=>0]);
           else
               $cate->update(['status'=>1]);
           return redirect()->route('product.index')->with(['alert-type'=>'success','message'=>'done']);
   }catch (\Exception $ex){
           return redirect()->route('product.index')->with(['alert-type'=>'danger','message'=>'active  error']);
       }
   }
}

