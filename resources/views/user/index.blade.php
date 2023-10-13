           @role('nhan vien')
               <h1>quản lý user</h1>
               <p>add user</p>
               <p>eidt user</p>
               <h1>quản lý order</h1>
               <p>add order</p>
               <p>eidt order</p>
               <h1>quản lý loại sản phẩm </h1>
               @can('show')
                   <p>add loại sản phẩm </p>
               @endcan
               <p>edit loại sản phẩm </p>
               <h1>quản lý khách hàng </h1>
               <p>add khách hàng</p>
               <p>eidt khách hàng</p>
           @endrole



