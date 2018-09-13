@extends('Admin/Master')
@section('title', 'Quản lý thành phố')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            THÀNH PHỐ
            <small>Danh sách thành phố</small>
          </h1>
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
                  <h3 class="box-title">Danh Sách Thành Phố</h3>
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
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Thêm thành phố
                  </button>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Thành phố</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
      
                      @foreach($data as $d)                      
                      <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->city_name}}</td>
                        <td>
                          <a type="button" class="btn btn-default" id="delete" data-id="{{$d->id}}" data-name="{{$d->city_name}}">Xóa</a>
                          <a type="button" class="btn btn-default" id="edit"  data-id="{{$d->id}}" data-name="{{$d->city_name}}">Edit</a>
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
            <h4>Bạn có chắc là muốn xóa thành phố <b class="city_name"></b> không</h4>   
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

{{--  /////////Thêm thành phố//////////  --}}
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{url('admin/setting/city')}}" method="POST" role="form">
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm danh sách</h4>
      </div>
      <div class="modal-body">
            <label>Tên thành phố<b class="text-red">*</b></label>   
            <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" placeholder="City Name" name="city_name">
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

{{--  /////////Sửa thành phố//////////  --}}
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content" id="form-horizontal">
      <form action="{{route('editCity')}}" method="POST" role="form">
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa danh sách</h4>
      </div>
      <div class="modal-body">
            <input type="hidden" id="id_edit" name="id_edit">
            <label>Sửa thành phố<b class="text-red">*</b></label>   
            <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" placeholder="City Name" name="city_name" id="city_name">
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

<script src="Theme/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).on('click', '#edit', function() {
    $('#id_edit').val($(this).data('id'));
    $('#city_name').val($(this).data('name'));
    id = $('#id_edit').val();
    $('#modal-edit').modal('show');
});

$(document).on('click', '#delete', function() {
    $('#id_edit').val($(this).data('id'));
    $('#city_name').val($(this).data('name'));
    id = $('#id_edit').val();
    var city_name = $(this).attr('data-name');
    var route = "{{route('deleteCity',['id'])}}"
    route = route.replace('id', id)
    $('.city_name').html(city_name)
    $('#link-delete').attr('href',route)
    $('#modal-delete').modal('show');
});

</script>    
@stop