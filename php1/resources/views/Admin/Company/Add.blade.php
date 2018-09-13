@extends('Admin/Master')
@section('title','Thêm công ty')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            THÊM CÔNG TY
            <small>Add Company</small>
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
              <h3 class="box-title">Thêm công ty vào hệ thống</h3>              
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

            <form action="{{url('admin/company/add')}}" method="POST" role="form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="box-body">
              <div class="row">
                  <div class="col-md-6">
                      <input type="hidden" value="{{Auth::id()}}" name="user_created">
                      <input type="hidden" value="logo.png" name="old_logo">
                      <label>Tên công ty <b class="text-red">*</b></label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" class="form-control" placeholder="Company Name" name="co_name" value="{{old('co_name')}}">
                      </div>                      
                      
                      <label>Mã số thuế <b class="text-red">*</b></label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="VAT" name="co_vat" value="{{old('co_vat')}}">                    
                      </div>                    
                      
                      <label>Địa chỉ công ty</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                        <input type="text" class="form-control" placeholder="Address" name="co_address" value="{{old('co_address')}}">                    
                      </div>
        
                      <label>Địa chỉ xuất hóa đơn</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map"></i></span>
                        <input type="text" class="form-control" placeholder="Address VAT" name="co_address_vat" value="{{old('co_address_vat')}}">
                      </div>   
                                        
                      <div class="form-group">
                        <label>Tỉnh/Thành phố</label>
                        <select class="form-control select2" style="width: 100%;" name="co_localtion" value="{{old('co_localtion')}}">
                          <option selected="selected" value="">Chọn</option>
                          @foreach ($city as $c)
                          <option value="{{$c->id}}">{{$c->city_name}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Nhân viên tư vấn</label>
                        <select name="user_assign" class="form-control select2" style="width: 100%;">
                          <option selected="selected" value="{{Auth::id()}}">{{Auth::user()->name}}</option>
                          @foreach ($user as $u)
                          <option value="{{$u->id}}">{{$u->name}}</option>
                          @endforeach
                        </select>
                      </div>

                  </div>
                  <div class="col-md-6">  
                      <label>Logo công ty</label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        <input type="file" class="form-control" name="logo">
                      </div>
                                       
                      <label>Số điện thoại</label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Phone Number" name="co_phone" value="{{old('co_phone')}}">
                      </div>
    
                      <label>Số Fax</label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                        <input type="text" class="form-control" placeholder="Fax Number" name="co_fax" value="{{old('co_fax')}}">
                      </div>
    
                      <label>Email</label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Email" name="co_email" value="{{old('co_email')}}">
                      </div>
    
                      <label>Ngành nghề</label>   
                      <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                        <input type="text" class="form-control" placeholder="Career" name="co_career" value="{{old('co_career')}}">
                      </div>
    
                      <div class="form-group">
                          <label>Loại khách hàng</label>
                          <select class="form-control select2" name="co_type" style="width: 100%;" value="{{old('co_type')}}">
                            <option selected="selected" value="">Chọn</option>
                            @foreach ($type as $t)
                            <option value="{{$t->id}}">{{$t->cotype_name}}</option>
                            @endforeach
                          </select>
                        </div>

                  </div>
                  <div class="col-md-12">
                    <label>Ghi chú</label>  
                    <div class="box-body pad">
                        <textarea class="textarea" name="co_note"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="pull-right box-tools">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-pulse"></i> Hoàn tất</button>   
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