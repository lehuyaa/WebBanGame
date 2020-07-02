@extends('admin_layout')
@section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Nền Tảng
                        </header>
                        <div class="panel-body">
                           
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-NXB')}}" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên Nền Tảng </label>
                                    <textarea style="resize: none" rows="3" class="form-control" name="communication_name"id="exampleInputPassword1" placeholder="Tên Nhà Xuất Bản"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Ảnh </label>
                                    <input type="file"  name="communnication_image" class="form-control" id="exampleInputEmail" >
                                </div>
                               
                               
                                <button type="submit" name="add_NXB_name" class="btn btn-info">Thêm Nhà Xuất Bản</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        
@endsection