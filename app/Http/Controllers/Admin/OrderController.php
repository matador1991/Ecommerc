<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Exports\OrderExport;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


use Maatwebsite\Excel\Facades\Excel;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index() // Show Orders
    {
        $order=Order::with(['admin','product'])->paginate(5);
        return view('admin.orders.show',compact('order'));
    }
    public function addorder()  // Return Add Product Interface
    {
        $products=Product::Active()->get();
        return view('admin.orders.add',compact('products'));
    }
    public function add(OrderRequest $request) // Add New Order
    {
            try{
                $a= $request->products;
                $user=auth()->user()->id;
                if (Auth::guard('admin')->check()) {
                    $user=0;
                }
              $order_id=Order::insertGetId(['title'=>$request->title,'user_id'=>$user,'customer'=>$request->name,'created_at'=>Carbon::now()]);
              $order=Order::find($order_id);
                foreach ($a as $l){
                 $order->product()->attach($l);
                   }
                return redirect()->route('order.index')->with(['alert-type' => 'success', 'message' => 'add done']);
            }catch (\Exception $ex){
                return redirect()->route('order.add')->with(['alert-type' => 'failed', 'message' => 'add error']);
            }
    }
    public function edit($id)  // Return Edit Product Interface
    {
        $order=Order::with(['product'])->find($id);
        $product=Product::get();
        return view('admin.orders.edit',compact('order','product'));
    }
    public function prodOrderUpdate(Request $r) //Add New Products To Order
    {
        try{
        $a= $r->products;
        $order=Order::find($r->order_id);
        foreach ($a as $l){
            $order->product()->attach($l);
        }
        $order->update(['updated_at'=>Carbon::now()]);
            return redirect()->route('order.edit',$r->order_id)->with(['alert-type'=>'success','message'=>'add done']);
        }catch(\Exception $ex){

            return redirect()->route('order.edit',$r->order_id)->with(['alert-type'=>'danger','message'=>'error add']);
        }
    }
    public function prodOrderDelete(Request $r) //Delete Products From Order
    {
        try{
            $order=Order::find($r->id);
           $order->product()->detach($r->prod_id);
            $order->update(['updated_at'=>Carbon::now()]);
        return redirect()->route('order.edit',$r->id)->with(['alert-type'=>'success','message'=>'delete done']);
    }catch (\Exception $ex){
            return redirect()->route('order.edit',$r->id)->with(['alert-type'=>'danger','message'=>'error delete']);
        }
    }
    public function delete($id) //Delete Order
    {
        try{
           $order=Order::find($id);
           $order->delete();
            $order->product()->detach();
            return redirect()->route('order.index')->with(['alert-type'=>'success','message'=>'delete done']);
        }catch (\Exception $ex){
            return redirect()->route('order.index')->with(['alert-type'=>'danger','message'=>'error delete']);
        }
    }
    public function export() //Export All Orders As Excel file
    {
        return Excel::download(new OrderExport, 'OrderData.xlsx');
    }
    public function search(Request $request) //Search About Orders By Title,Name Of Customer,Number Of The Order
    {
        try{
            $keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;
            if ($keyword != null) {
                $order = Order::select('id','title','customer','created_at');
                $order = $order->search($keyword, null, true);
                $order = $order->orderBy('id', 'desc')->paginate(5);
                return view('admin.orders.show', compact('order'));
            }
            $order=Order::paginate(5);
            return view('admin.orders.show',compact('order'));
        }catch (\Exception $ex){
            return redirect()->route('order.index')->with(['alert-type'=>'danger','message'=>'error delete']);
        }
    }
}
