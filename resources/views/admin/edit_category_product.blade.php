@extends('admin_layout')
@section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Thể Loại Sách
                        </header>
                        <div class="panel-body">
                           @foreach($edit_category_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail">Tên Thể Loại Sách </label>
                                    <input type="text" value="{{ $edit_value->category_name}}" name="category_name" class="form-control" id="exampleInputEmail" placeholder="Tên Danh Mục">
                                </div>
                              
                               
                               
                                <button type="submit" name="update_category_product_name" class="btn btn-info">Cập Nhật Thể Loại Sách</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        
@endsection