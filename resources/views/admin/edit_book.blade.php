@extends('admin_layout')
@section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sách
                        </header>
                        <div class="panel-body">
                             @foreach($edit_book as $key => $book)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-book/'.$book->Book_id)}}"  method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                               
                                 <div class="form-group">
                                    <label for="exampleInputEmail">Tên Sách </label>
                                    <input type="text"  name="Book_name" class="form-control" id="exampleInputEmail" value="{{$book->Book_name}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail">Mô Tả </label>
                                    <input type="text"  name="Book_desc" class="form-control" id="exampleInputEmail" value="{{$book->Book_desc}}">
                                </div>
                                   <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung </label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="Book_content"id="exampleInputPassword1" >{{$book->Book_content}}"</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail">Giá </label>
                                    <input type="text"  name="Book_price" class="form-control" id="exampleInputEmail"value="{{$book->Book_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Ảnh </label>
                                    <input type="file"  name="Book_image" class="form-control" id="exampleInputEmail"  >
                                    <img src="{{URL::to('public/uploadimage/'.$book->Book_image)}}"height="150" width="150">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail">Trạng Thái </label>
                                    <input type="text"  name="Book_status" class="form-control" id="exampleInputEmail" value="{{$book->Book_status}}" >
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputEmail">Thể Loại Sách </label>
                                   <select   name="cate"  class="input-sm form-control input-sm m-bot15">
                                       @foreach($cate_book as $key=>$cate)
                                         <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                       @endforeach

                                    </select>
                                </div>
                                  <div class="form-group">
                                     <label for="exampleInputEmail">Nhà Xuất Bản </label>
                                      <select  name="NXB_book" class="input-sm form-control input-sm m-bot15">
                                         @foreach($NXB_book as $key=>$NXB)
                                         <option value="{{$NXB->communication_id }}">{{$NXB->communication_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <button type="submit" name="update_book" class="btn btn-info">Cập Nhật Sách</button>
                            </form>
                               @endforeach
                            </div>
                      
                        </div>
                    </section>

            </div>
        
@endsection