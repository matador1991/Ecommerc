@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Language</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('category.trans.cate')}}" >
                    @csrf
                    @foreach($lang as $l)
                    <input  name="id" value="{{$lang->id}}" hidden>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" name="name" value="{{$lang->name}}" class="form-control" id="name" aria-describedby="emailHelp">
                        @error('name')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="local">Locale</label>
                        <input type="text" name='local' value="{{$lang->local}}" class="form-control" id="local">
                        @error('local')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="native">Native</label>
                        <input type="text" name='native' value="{{$lang->native}}" class="form-control" id="native">
                        @error('native')
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" >Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" @if($lang->status == 1) selected @endif>Active</option>
                            <option value="0" @if($lang->status == 0) selected @endif>InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
