
@extends('layout.master')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name" >
        </div>
        @error('name')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror


        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Image</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="anh_the_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="hinh" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">

                        <label for="cmt_truoc">Ảnh thẻ</label><br/>
                    </div>
                </div>
            </div>
        </div>
        @error('hinh')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">

            <label  class="form-label">Giá sản phẩm</label>

            <input type="text" class="form-control" name="gia" >

        </div>
        @error('gia')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">
            <label  class="form-label">Số Lượng</label>
            <input type="text" class="form-control" name="sl" >
        </div>
        @error('sl')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3">
        <select class="form-select"  name="hangloai" aria-label="Default select example">
            <option selected>Danh Mục Hãng</option>
           @foreach($loai as $item)
                <option value="{{$item->id}}">{{$item->tenloai}}</option>
           @endforeach
        </select>
        </div>
        @error('hangloai')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="form-floating">
            <textarea class="form-control" name="mota" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Mô tả</label>
        </div>
        @error('mota')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <button class="btn btn-success" type="submit">Save</button>

    </form>
@endsection

