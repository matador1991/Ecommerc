@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-10"><h4 class="m-0 font-weight-bold text-primary">Edit Order</h4></div>
                    <div class="col-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> Add Products
                    </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <form method="post" action="{{route('orderProd.Update')}}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="order_id" value="{{$order->id}}" hidden>
                                                <div class="form-group">
                                                    <label for="products" >Products</label>
                                                    <select class="form-control" name="products[]" multiple>
                                                        @if(isset($product) && $product->count() > 0)
                                                            @foreach($product as $p)
                                                                <option value={{$p->id}}>{{$p->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                          <tr>
                              <th class="text-center">Order Number</th>
                              <th class="text-center">Title</th>
                              <th class="text-center">Customer Name</th>
                              <th class="text-center">Date</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td class="text-center">{{$order->id}}</td>
                              <td class="text-center">{{$order->title}}</td>
                              <td class="text-center">{{$order->customer}}</td>
                              <td class="text-center">{{$order->created_at->format('d-m-Y h:i a') }}</td>
                          </tbody>
                      </table>
                  </div>
              </div>
                <div class="row">
                    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                        <table id="dtVerticalScrollExample" class="table table-bordered table-striped mb-0" cellspacing="0" width="100%">
                            <tr><h3 class="text-center" style="color:darkcyan">Products</h3></tr>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th class="text-center" scope="col" >Name</th>
                                <th class="text-center" scope="col">price</th>
                                <th class="text-center" scope="col">photo</th>
                                <th class="text-center" scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($order->product->IsNotEmpty())
                                @php $i=1 @endphp
                                @foreach($order->product as $o)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td class="text-center">{{$o->name}}</td>
                                        <td class="text-center">{{$o->price}}</td>
                                        <td class="text-center"><img src="{{asset('/admin/'.$o->photo)}}" width="100px" height="100px" ></td>
                                        <td class="text-center">
                                        <form  method="post" action="{{route('orderProd.delete')}}">
                                            @csrf
                                            <input type="text" name="id" value="{{$order->id}}" hidden>
                                            <input type="text" name="prod_id" value="{{$o->id}}" hidden>
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




