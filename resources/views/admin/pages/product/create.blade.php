@extends('admin/layouts/default')


@section('content')
    <form action="/admin/product/create" method="Post">
        <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Ten San Pham</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Nhap Ten">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Gia</label>
            <input type="number" class="form-control" name='price' id="exampleInputPassword1" value="0" min="0">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Position</label>
            <input type="number" class="form-control" name="position" id="exampleInputPassword1"  placeholder="Tu Dong Tang" min='1'>
        </div>
        <div class="form-group form-check form-check-inline">
            <input type="radio" id="statusActive" name="status" class="form-check-input" checked value="active">
            <label for="statusActive" class="form-check-lable">Hoạt Động</label>
        </div>
        <div class="form-group form-check form-check-inline">
            <input type="radio" id="statusInactive" name="status" class="form-check-input" value="inactive">
            <label for="statusInactive" class="form-check-lable">Dừng Hoạt Động</label>
        {{-- </div>
        {{-- <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
            </div>
        </div> 
        </div> --}}
        <!-- /.card-body -->
        @csrf
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection 