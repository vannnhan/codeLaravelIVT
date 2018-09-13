 {{-- {{dd($data->Company)}}  --}}
@extends('Admin/Master')
@section('title','Thêm liên hệ khách hàng')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SỬA LIÊN HỆ KHÁCH HÀNG
            <small>Edit Customer</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa công ty vào hệ thống</h3>              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                {{--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>  --}}
              </div>
              
              <!-- Thông báo lỗi --> 
              @if (count($errors) > 0)
                <div class="callout callout-danger">
                    <h4>Thông tin bạn nhập không đúng, đề nghị kiểm tra lại các thông tin sau:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              @if (isset($message))
                <div class="alert alert-success">
                {{ $message }}
                </div>
              @endif
              <!-- Kết thúc thông báo lỗi -->

            </div>

            <form method="POST" role="form">
            {!! csrf_field() !!}
            <div class="box-body">
              <div class="row">
                  <div class="col-md-6">
                      <label>Tên khách hàng <b class="text-red">*</b></label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" class="form-control" placeholder="Company Name" value="{{old('cus_name', $data['cus_name'])}}" name="cus_name">
                      </div> 

                      <label>Email</label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" value="{{old('cus_email', $data['cus_email'])}}" name="cus_email">
                      </div>
    
                  </div>
                  <div class="col-md-6">                 

                      <label>Điện thoại </label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                        <input type="text" class="form-control" value="{{old('cus_phone', $data['cus_phone'])}}" name="cus_phone">
                      </div>  

                      <div class="form-group">
                        <label>Là nhân viên của công ty</label>
                        <select class="form-control select2" style="width: 100%;" name="co_id">
                          <option selected="selected" value="{{old('co_id', $data->Company['id'])}}|{{old('co_id', $data->Company['user_assign'])}}">{{isset($data->Company['co_name']) ? $data->Company['co_name'] : 'Không làm ở công ty nào' }}</option>
                          <option value="{{''}}|{{''}}">Không làm công ty nào</option>
                          @foreach($company as $d)
                          <option value="{{$d->id}}|{{$d->user_assign}}">{{$d->co_name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <label>Ghi chú</label> 
                      <div class="box-body pad">
                          <textarea class="textarea" placeholder="Place some text here" name="note"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('co_note', $data['note'])}}</textarea>
                      </div>
                      <div class="pull-right box-tools">
                        <button type="submit" class="btn btn-primary">Hoàn tất</button>   
                      </div>
                  </div>
              </div>                
              <!-- /.row -->  
            </div>
            <!-- /.box-body -->
            
            </form>
            
        </section>
        <!-- /.content -->
        
        
        
</div>
@stop