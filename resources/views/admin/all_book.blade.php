@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Các Sách Đang Bán
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
            <form action="{{URL::to('/tim-kiem-book-user')}}"  method="POST">
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
            <th>Tên Sách</th>
            <th>Mô Tả</th>
            <th>Nội Dung</th>
            <th>Giá</th>
            <th>Hình Ảnh</th>
            <th>Trạng Thái</th>
            <th>Thể Loại</th>
            <th>Nhà Xuất Bản</th>
            <th style="width:15px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_book as $key => $book)
          <tr>
            <td><i></i></td>
            <td>{{ $book->Book_name}}</td>
            <td>{{ $book->Book_desc}}</td>
            <td>{{ $book->Book_content}}</td>
            <td>{{ $book->Book_price}}</td>
            <td><image src="public/uploadimage/{{$book->Book_image}}" height="300" width="200"></td>
            <td>{{ $book->Book_status}}</td>
            <td>{{ $book->category_name}}</td>
            <td>{{ $book->communication_name}}</td>
           
          
          <td>
              <a href="{{URL::to('/edit-book/'.$book->Book_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không ?')" href="{{URL::to('/delete-book/'.$book->Book_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
        
@endsection