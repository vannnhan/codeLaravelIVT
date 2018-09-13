{{--  {{dd($data)}}  --}}
@extends('Admin/Master')
@section('title', 'Sửa thông tin thành viên')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa thông tin nhân viên
        <small>Edit User information</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Sửa thông tin nhân viên</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
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
    <form method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                <center><img src="upload/user/{{$data['avatar'] != "avatar.png" ? $data['user'].'/' : ''}}{{$data['avatar'] != "avatar.png" ? 'avatar/' : ''}}{{$data['avatar']}}" class="img-circle" alt="User Image" width="200px"></center>
            </div>
            <div class="col-md-6">
                <input type="hidden" value="{{$data['avatar']}}" name="old_avatar">
                <input type="hidden" value="{{$data['user']}}" name="old_user">
                <label>Tên nhân viên<b class="text-red">*</b></label>   
                <div class="input-group">                   
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="text" class="form-control" placeholder="Full Name" value="{{old('name', $data['name'])}}" name="name">
                </div> 

                <label>Email<b class="text-red">*</b></label>   
                <div class="input-group">                   
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="text" class="form-control" placeholder="email" value="{{old('email', $data['email'])}}" name="email">
                </div>

                <label>Password</label>   
                <div class="input-group">                   
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="password" class="form-control" placeholder="password" name="password">
                </div>

                <div class="form-group">
                  <label>Quyền hạn</label>
                  <select class="form-control select2" style="width: 100%;" name="role">
                    <option selected="selected" value="{{old('role', $data->Role['id'])}}">{{$data->Role['name']}}</option>
                    <option value="1">Quản trị viên</option>
                    <option value="2">Nhân viên Kinh Doanh</option>
                    <option value="3">Nhân viên Hợp Đồng</option>
                    <option value="4">Nhân viên Pháp Lý</option>
                    <option value="5">Nhân viên Kế toán</option>
                  </select>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <label>Avatar</label>   
                <div class="input-group">                   
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="file" class="form-control" name="avatar">
                </div>

                <label>Phone</label>   
                <div class="input-group">                   
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input type="text" class="form-control" placeholder="Phone Nunber" value="{{old('phone', $data['phone'])}}" name="phone">
                </div>

                <div class="form-group">
                  <label>Giới tính</label>
                  <select class="form-control select2" style="width: 100%;" name="sex">
                    <option selected="selected" value="{{old('sex', $data['sex'])}}">{{$data['sex']}}</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Chức vụ</label>
                  <select class="form-control select2" style="width: 100%;" name="sub_role">
                    <option selected="selected" value="">Nhân viên</option>
                    <option value="1">Trưởng bộ phận</option>
                  </select>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row no-print">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Hoàn thành</button>
            </div>
          </div>
        </div>
    </form>
        <!-- /.box-body -->
        <div class="box-footer">
          Sửa thông tin của nhân viên.
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>

@stop