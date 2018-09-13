@extends('Admin/Master')
@section('title', 'Quản lý nhân viên')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            QUẢN LÝ NHÂN VIÊN
            <small>Danh sách nhân viên</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">Modals</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          {{--  <div class="callout callout-info">
            <h4>Danh sách thành phố !</h4>
          </div>  --}}
    
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Danh Sách Nhân Viên</h3>
                </div>
                <!-- Thông báo lỗi --> 
                @if (count($errors) > 0)
                <div class="callout callout-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </div>
                @endif
                @if(Session::has('message'))
                  <div class="alert alert-success">
                    <li>{{Session::get('message')}}</li>
                  </div>
                @endif
                <!-- Kết thúc thông báo lỗi -->

                <div class="box-body">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add">
                    Thêm nhân viên
                  </button>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên nhân viên</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
      
                      @foreach($data as $d)                      
                      <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>
                            @if($d->id != 1)
                            <a class="btn btn-default" id="delete" data-id="{{$d->id}}" data-name="{{$d->name}}" title="Xóa"><i class="fa fa-trash"></i></a>  
                            @endif
                            <a class="btn btn-default" href="admin/setting/user/edit/{{$d->id}}" title="Sửa"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                      @endforeach                
                      </tbody>
                      {{--  <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                      </tfoot>  --}}
                    </table>
                </div>

              </div>
            </div>
          </div>             
        </section>
        <!-- /.content -->
      </div>

{{--  /////////Thêm Nhân Viên//////////  --}}
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('postUser')}}" method="POST" role="form" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Thêm nhân viên</h4>
          </div>
          <div class="modal-body">
                  <input type="hidden" id="id_edit" name="id_edit">
                  <label>Tên nhân viên<b class="text-red">*</b></label>   
                  <div class="input-group">                   
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" placeholder="Full Name" value="{{old('name')}}" name="name">
                  </div> 

                  <label>Username<b class="text-red">*</b></label>   
                  <div class="input-group">                   
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control" placeholder="User Name" value="{{old('user')}}" name="user">
                  </div>

                  <label>Email<b class="text-red">*</b></label>   
                  <div class="input-group">                   
                  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                  <input type="text" class="form-control" placeholder="email" value="{{old('email')}}" name="email">
                  </div>

                  <label>Password<b class="text-red">*</b></label>   
                  <div class="input-group">                   
                  <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                  <input type="password" class="form-control" placeholder="password" name="password">
                  </div>

                  
                  <label>Avatar</label>   
                  <div class="input-group">                   
                  <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                  <input type="file" class="form-control" value="{{old('avatar')}}" name="avatar">
                  </div>

                  <label>Phone</label>   
                  <div class="input-group">                   
                  <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                  <input type="text" class="form-control" placeholder="Phone Nunber" value="{{old('phone')}}" name="phone">
                  </div>

                  <div class="form-group">
                    <label>Giới tính</label>
                    <select class="form-control select2" style="width: 100%;" name="sex">
                      <option selected="selected" value="">Chưa chọn</option>
                      <option value="Nam">Nam</option>
                      <option value="Nữ">Nữ</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Quyền hạn</label>
                    <select class="form-control select2" style="width: 100%;" name="role">
                      <option selected="selected" value="">Chưa chọn</option>
                      <option value="1">Quản trị viên</option>
                      <option value="2">Nhân viên Kinh Doanh</option>
                      <option value="3">Nhân viên Hợp Đồng</option>
                      <option value="4">Nhân viên Pháp Lý</option>
                      <option value="5">Nhân viên Kế toán</option>
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
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{--  /////////Xóa thành phố//////////// --}}
<div class="modal fade" id="modal-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Bạn có chắc không ?</h4>
      </div>
      <div class="modal-body">
            <h4>Bạn có chắc là muốn xóa nhân viên <b class="name"></b> không</h4>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Không xóa</button>
        <a type="submit" class="btn btn-danger" id="link-delete" href="">Xóa</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script src="Theme/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(document).on('click', '#delete', function() {
    $('#id_edit').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    id = $('#id_edit').val();
    var name = $(this).attr('data-name');
    var route = "{{route('deleteUser',['id'])}}"
    route = route.replace('id', id)
    $('.name').html(name)
    $('#link-delete').attr('href',route)
    $('#modal-delete').modal('show');
});
</script>
@stop