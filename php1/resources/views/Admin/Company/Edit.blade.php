{{--  {{dd($data)}}  --}}
@extends('Admin/Master')
@section('title','Sửa thông tin công ty khách hàng')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SỬA THÔNG TIN CÔNG TY
            <small>Edit Company</small>
          </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa thông tin công ty</h3>              
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

            <form method="POST" role="form" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Tên công ty <b class="text-red">*</b></label>   
                        <div class="input-group">                   
                          <span class="input-group-addon"><i class="fa fa-building"></i></span>
                          <input type="text" class="form-control" value="{{old('co_name', $data['co_name'])}}" name="co_name">
                        </div>                      
                        
                        <label>Mã số thuế <b class="text-red">*</b></label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                          <input type="text" class="form-control" value="{{old('co_vat', $data['co_vat'])}}" name="co_vat">                    
                        </div>                    
                        
                        <label>Địa chỉ công ty</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                          <input type="text" class="form-control" value="{{old('co_address', $data['co_address'])}}" name="co_address">                    
                        </div>
          
                        <label>Địa chỉ xuất hóa đơn</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map"></i></span>
                          <input type="text" class="form-control" value="{{old('co_address_vat', $data['co_address_vat'])}}" name="co_address_vat">
                        </div>   
                                          
                        <div class="form-group">
                          <label>Địa bàn</label>
                          <select name="co_localtion" class="form-control select2" style="width: 100%;">
                            <option selected="selected"  value="{{old('co_localtion', $data->City->id)}}">{{$data->City->city_name}}</option>
                            @foreach ($city as $d)
                            <option value="{{$d->id}}">{{$d->city_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Loại khách hàng</label>
                          <select name="co_type" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="{{old('co_type', $data->Type->id)}}">{{$data->Type->cotype_name}}</option>
                            @foreach ($type as $d)
                              <option value="{{$d->id}}">{{$d->cotype_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Nhân viên tư vấn</label>
                          <select name="user_assign" class="form-control select2" style="width: 100%;">
                            <option selected="selected"  value="{{old('user_assign', $data->UserAssign['id'])}}">{{isset($data->UserAssign['name']) ? $data->UserAssign['name'] : 'Tự do'}}</option>
                            <option value="">Tự do</option>
                            @foreach ($user as $u)  
                            <option value="{{$u->id}}">{{$u->name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">     
                        <label>Logo công ty</label>
                        <input type="hidden" value="{{$data['co_logo']}}" name="old_logo">
                        <div class="input-group">                   
                          <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                          <img src="upload/company/{{$data['co_logo']!="logo.png" ? $data['co_folder'].'/' : ''}}{{$data['co_logo']!="logo.png" ? 'logo/' : ''}}{{$data['co_logo']}}" width="100px">   
                          <input type="file" class="form-control" name="logo">
                        </div>

                        <label>Số điện thoại</label>   
                        <div class="input-group">                   
                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" class="form-control" value="{{old('co_phone', $data['co_phone'])}}" name="co_phone">
                        </div>
      
                        <label>Số Fax</label>   
                        <div class="input-group">                   
                          <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                          <input type="text" class="form-control" value="{{old('co_fax', $data['co_fax'])}}" name="co_fax">
                        </div>
      
                        <label>Email</label>   
                        <div class="input-group">                   
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" class="form-control" value="{{old('co_email', $data['co_mail'])}}" name="co_email">
                        </div>
      
                        <label>Ngành nghề</label>   
                        <div class="input-group">                   
                          <span class="input-group-addon"><i class="fa fa-list"></i></span>
                          <input type="text" class="form-control" value="{{old('co_career', $data['co_career'])}}" name="co_career">
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                      <label>Ghi chú</label>  
                      <div class="box-body pad">
                          <textarea class="textarea" name="co_note"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$data->note}}</textarea>
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