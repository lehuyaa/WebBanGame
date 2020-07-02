@extends('admin_layout')
@section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Trạng Thái Đơn Hàng
                        </header>
                        <div class="panel-body">
                             @foreach($edit_order_status as $key => $edit_status)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-order-status/'.$edit_status->order_id)}}"  method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                 <div class="form-group">
                                     <label for="exampleInputEmail">Trạng Thái Đơn Hàng </label>
                                      <select  name="order_status_id" class="input-sm form-control input-sm m-bot15">
                                         @foreach( $order_status as $key=>$status)
                                         <option value="{{$status->order_status_id }}">{{$status->order_status_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" name="update_book" class="btn btn-info">Cập Trạng Thái Đơn Hàng</button>
                            </form>
                               @endforeach
                            </div>
                      
                        </div>
                    </section>

            </div>
        
@endsection