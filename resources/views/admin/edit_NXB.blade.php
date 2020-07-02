@extends('admin_layout')
@section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Nhà Xuất Bản
                        </header>
                        <div class="panel-body">
                           @foreach($edit_NXB as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-NXB/'.$edit_value->communication_id )}}" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail">Tên Thể Loại Sách </label>
                                    <input type="text" value="{{ $edit_value->communication_name}}" name="NXB_name" class="form-control" id="exampleInputEmail" placeholder="Tên Nhà Xuất Bản">
                                </div>
                              
                               
                               
                                <button type="submit" name="update_NXB_name" class="btn btn-info">Cập Nhật Nhà Xuất Bản</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        
@endsection