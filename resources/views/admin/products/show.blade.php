@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">price</th>
                            <th class="text-center">photo</th>
                            <th class="text-center">Status</th>
                            <th colspan="4" class="text-center">Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($prod->IsNotEmpty())
                            @foreach($prod as $l)
                        <tr>
                            <td class="text-center">{{$l->name}}</td>
                            <td class="text-center">{{$l->price}}</td>
                            <td class="text-center"><img src="{{$l->photo}}" width="100px" height="100px" ></td>
                            <td class="text-center">{{$l->status()}}</td>
                            @if($l->status == 0)
                                <td class="text-center"><a href="{{route('product.active',$l->id)}}" class="btn btn-outline-success"><i class="fa fa-charging-station"></i> Active</a></td>
                            @else
                                <td class="text-center"><a href="{{route('product.active',$l->id)}}" class="btn btn-outline-danger"><i class="fa fa-charging-station"></i> InActive</a></td>
                            @endif
                                <td class="text-center"><a href="{{route('product.edit',$l->id)}}" class="btn btn-outline-dark"><i class="fa fa-edit"></i> Edit</a></td>
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
                                        <a class="btn btn-outline-danger" href="{{route('product.delete',$l->id)}}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                    {!! $prod->appends(request()->input())->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
