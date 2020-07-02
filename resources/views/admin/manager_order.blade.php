@extends('admin_layout')
@section('admin_content')


<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Đơn Hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <!-- <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button> -->                
      </div>
      <div class="col-sm-4">
      </div>
       <div class="col-sm-3">
            <form action="{{URL::to('/tim-kiem-book-order-user')}}"  method="POST">
              {{csrf_field()}}
            <div class="search_box pull-right">
              <input type="text" name="keywords_submit" placeholder="Nhập Từ Khóa"/>
              <input type="submit" style="margin-top: 0 ; color: #000" name="search_book" class="btn btn-primary btn-sm" value="Tìm Kiếm">
            </div>
            </form>
      </div>
    </div>
    <div class="table-responsive">

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
             
            </th>

            <th>Mã Đơn Hàng</th>
            <th>Tên Người Mua</th>
            <th>Số Điện Thoại</th>
            <th>Tình Trạng</th>
            
    
            <th style="width:15px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $key => $order)
          <tr>
            <td><i></i></td>
            <td>{{ $order->order_id}}</td>
            <td>{{ $order->user_name}}</td>
             <td>{{ $order->user_phone}}</td>
             <td>{{ $order->order_status_name}}</td>
            
            
          <td>
            <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-search" aria-hidden="true"></i></a>

              <a href="{{URL::to('/edit-order-status/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                
               <a onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không ?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
        
@endsection