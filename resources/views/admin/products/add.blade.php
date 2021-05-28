@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('product.add.prod')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
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
                        <input type="text" name='price' class="form-control" id="photo">
                        @error('price')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" >Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
