@extends('Admin/Master')
@section('title', 'Sửa Form Mail')
@section('main')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Thêm Form Mail
                <small>Form email</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
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
          @if(Session::has('message'))
                  <div class="alert alert-success">
                    <li>{{Session::get('message')}}</li>
                  </div>
                @endif
          <!-- Kết thúc thông báo lỗi -->
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="{{route('postEditForm',$data['id'])}}" method="POST" role="form">
                @csrf
                <div class="col-md-6">
                    <label>Tên Form<b class="text-red">*</b></label>   
                    <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" class="form-control" name="name" value="{{old('name', $data['name'])}}">
                    </div>
                </div> 

                <div class="col-md-6">
                    <label>Code của form<b class="text-red">*</b></label>   
                    <div class="input-group">                   
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" class="form-control" name="code" value="{{old('code', $data['code'])}}">
                    </div> 
                </div>

                <div class="col-md-12">
                    <label>Soạn thảo form</label>
                    <textarea id="form" name="form" rows="200" cols="80">{{old('form', $data['content'])}}</textarea>
                </div>

                <div class="row no-print">
                <div class="col-xs-12">
                    <a href="{{route('Form')}}" class="btn btn-primary pull-left"><i class="fa fa-print"></i> Back</a>
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Hoàn thành
                    </button>
                </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>


<script src="Theme/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="Theme/Admin/plugins/ckeditor/ckeditor.js"></script>
<script>
var options = {
    filebrowserImageBrowseUrl: '{{asset('')}}laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '{{asset('')}}laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '{{asset('')}}laravel-filemanager?type=Files',
    filebrowserUploadUrl: '{{asset('')}}laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('form', options)
</script>
@stop