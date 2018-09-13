@extends('Admin/Master')
@section('title', 'Quản lý loại hợp đồng')
@section('main')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            LOẠI HỢP ĐỒNG
            <small>Loại hợp đồng</small>
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
                  <h3 class="box-title">Danh Sách loại hợp đồng</h3>
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
                    Thêm loại hợp đồng
                  </button>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Loại hợp đồng</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
      
                      @foreach($data as $d)                      
                      <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>
                          <a type="submit" class="btn btn-default" href="admin/setting/city/{{$d->id}}/delete">Xóa</a>
                          <a type="button" id="edit" class="btn btn-default" data-id="{{$d->id}}" data-name="{{$d->name}}">Edit</a>
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
          {{--  /////////Thêm loại hợp đồng//////////  --}}
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{url('admin/setting/cttype')}}" method="POST" role="form">
                    @csrf
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thêm danh sách</h4>
                  </div>
                  <div class="modal-body">
                    <label>Tên loại hợp đồng<b class="text-red">*</b></label>   
                    <div class="input-group">                   
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" placeholder="Contract Name" name="name">
                    </div> 

                    <div class="form-group">
                      <label>Chọn form</label>
                      <select class="form-control select2" style="width: 100%;" name="co_id">
                        <option selected="selected" value="">Không có form</option>
                        @foreach($form as $d)
                        <option value="{{$d->id}}">{{$d->code}}-{{$d->name}}</option>
                        @endforeach
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

          {{--  /////////Sửa loại hợp đồng//////////  --}}
            <div class="modal fade" id="modal-edit">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{route('editContractType')}}" method="POST" role="form">
                    @csrf
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sửa danh sách</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <label>Tên hợp đồng<b class="text-red">*</b></label>   
                    <div class="input-group">                   
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="name" id="name">
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

        </section>
        <!-- /.content -->
      </div>

<script src="Theme/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).on('click', '#edit', function() {
    $('#id_edit').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    id = $('#id_edit').val();
    $('#modal-edit').modal('show');
});
</script> 
@stop