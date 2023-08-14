
    @extends('layout.master')
    @section('content')
        <br>
        <br>
        <br>
       <div class="row">
           <div class="col-md-8">
               <div class="row">
                   <div class="col-4">
                       <a href="{{route('addbanner')}}" class="btn btn-primary">Thêm Banner</a>
                   </div>
               </div>

               <table class="table">
                   <thead>
                   <tr>
                       <th scope="col">Banner</th>
                       <th scope="col">Action</th>
                   </tr>
                   </thead>
                   @foreach($banner as $item)
                       <tr>

                           <td>
                               <img src="{{$item->imagebanner ? Storage::url($item->imagebanner):""}}" width="30%">
                           </td>
                           <td>
                               <a onclick="return confirm('Bạn Có Muốn Xóa Không')" class="btn btn-danger" href="">Delete</a>
                               <a class="btn btn-primary"href="{{route('editbanner',['id'=>$item->id])}}">Edit</a>
                           </td>
                       </tr>
                   @endforeach
               </table>
           </div>

           <div class="col-md-4 text-center" >
             <form action="" method="POST">
                 @csrf
                 <img src="{{$item->imagebanner ? Storage::url($item->imagebanner):""}}" width="50%" style="border-radius: 50%">
             </form>
           </div>
       </div>
    @endsection

