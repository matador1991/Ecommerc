@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit product</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('product.update')}}" enctype="multipart/form-data">
                    @csrf
                    <input name="id" value="{{$prod->id}}" hidden>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" value="{{$prod->name}}" class="form-control" id="name" aria-describedby="emailHelp">
                        @error('name')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name='photo' class="form-control" id="photo">
                        @error('photo')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name='price' value="{{$prod->price}}" class="form-control" id="price">
                        @error('price')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" >Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" @if($prod->status == 1) selected @endif>Active</option>
                            <option value="0" @if($prod->status == 0) selected @endif>InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
