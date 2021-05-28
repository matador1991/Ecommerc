@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Order</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('order.add.prod')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Order Title</label>
                        <input type="text" name="title" class="form-control"  >
                        @error('title')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Customer Name</label>
                        <input type="text" name="name" class="form-control"  >
                        @error('name')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="products" >Products</label>
                        <select class="form-control" name="products[]" multiple>
                            @if(isset($products) && $products->count() > 0)
                                @foreach($products as $p)
                            <option value={{$p->id}}>{{$p->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('products')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
