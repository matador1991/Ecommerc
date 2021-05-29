@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-4"><h4 class="m-0 font-weight-bold text-primary">Orders</h4></div>
                    <div class="col-6">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                        action="{{route('search')}}" method="get">
                            @csrf
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control  border-0 small" placeholder="Search for..."
                                           aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <div class="col-2"><a href="{{route('order.export')}}" class="btn btn-outline-primary"><i class="fa fa-file-export"></i>Export</a></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="text-center">Order Number</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Date</th>
                            <th colspan="2" class="text-center">Operation</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($order->IsNotEmpty())
                            @foreach($order as $l)
                        <tr>
                            <td class="text-center">{{$l->id}}</td>
                            <td class="text-center">{{$l->title}}</td>
                            <td class="text-center">{{$l->customer}}</td>
                            <td class="text-center">{{$l->product->sum('price')}}</td>
                            <td class="text-center">{{ $l->created_at->format('d-m-Y h:i a') }}</td>
                                <td class="text-center"><a href="{{route('order.edit',$l->id)}}" class="btn btn-outline-dark"><i class="fa fa-edit"></i>Modify</a></td>
                                <td class="text-center"><a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteProd{{$l->id}}"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <div class="modal fade" id="deleteProd{{$l->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal">Are you Sure For Delete?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-outline-danger" href="{{route('order.delete',$l->id)}}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            @endif
                        </tbody>

                    </table>
                   {!! $order->appends(request()->input())->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
