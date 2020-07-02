@extends('admin_layout')
@section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Thê Loại Sách
                        </header>
                        <div class="panel-body">
                           
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Thể Loại Sách </label>
                                    <textarea style="resize: none" rows="3" class="form-control" name="category_name"id="exampleInputPassword1" placeholder="Tên Danh Mục"></textarea>
                                </div>
                                <button type="submit" name="add_category_product_name" class="btn btn-info">Thêm Thê Loại Sách</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        
@endsection