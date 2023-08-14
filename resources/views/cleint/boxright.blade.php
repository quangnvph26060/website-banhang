@extends('layout.template')
@section('box')
    <div class="col-3" >
        <ul class="list-group">
            <li class="list-group-item" style="font-weight: 600">Danh Mục</li>
            @foreach($loai as $item)
                <li class="list-group-item  d-flex justify-content-between align-items-start">
                    <a href="#">{{$item->tenloai}} </a>  <span class="badge bg-primary rounded-pill">14</span>
                </li>
            @endforeach

        </ul>
    </div>
@endsection
