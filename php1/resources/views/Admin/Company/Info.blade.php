 {{-- {{dd($data)}}  --}}
@extends('Admin/Master')
@section('title','Thông tin chi tiết công ty')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        THÔNG TIN CÔNG TY
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            @foreach ($errors->all() as $error)
                <strong>Cảnh báo! >> </strong>{{ $error }}<br/>
            @endforeach
        </div>
        @endif
        @if(Session::has('message'))
        <div class="alert alert-success">
          <strong>Thông báo : </strong>{{Session::get('message')}}<br/>
        </div>
      @endif
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="upload/company/{{$data->co_logo!="logo.png" ? $data->co_folder.'/' : ''}}{{$data->co_logo!="logo.png" ? 'logo/' : ''}}{{$data->co_logo}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$data->co_name}}</h3>

              <p class="text-muted text-center"><b> {{$data->Type->cotype_name}}</b></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          @if(Auth::id()==$data->user_assign || Auth::user()->hasRole('1'))
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin người liên hệ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($data->Customer as $d)
              <strong><i class="fa fa-book margin-r-5"></i><a href="admin/customer/edit/{{$d->id}}">{{$d->cus_name}}</a></strong>
              <p class="text-muted">
                <li><b>Email </b>{{$d->cus_email}}</li>
                <li><b>Phone </b>{{$d->cus_phone}}</li>

              </p>
              <hr>
              @endforeach
              {{--  <a href="{{url('admin/customer/add')}}" class="btn btn-block btn-danger"><b>Thêm liên hệ</b></a>  --}}

              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                Thêm liên hệ
              </button>
            </div>
            <!-- /.box-body -->
          </div>
          @endif
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Thông tin chi tiết</a></li>
              <li><a href="#contract" data-toggle="tab">Hợp đồng</a></li>
              {{-- <li><a href="#settings" data-toggle="tab">Settings</a></li> --}}
            </ul>
            <div class="tab-content">
              @if(Auth::id()==$data->user_assign || Auth::user()->hasRole('1'))
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    {{----------------------------------------------------------}}
                        
                            <!-- title row -->
                            <div class="row">
                              <div class="col-xs-12">
                                <h2 class="page-header">
                                  <i class="fa fa-globe"></i> {{$data->co_name}}
                                  <small class="pull-right">Ngày tạo : {{$data->created_at}} - Người tạo : {{$data->UserCreated->name}}</small>
                                </h2>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                              <div class="col-sm-4 invoice-col">
                                <p class="text-muted">
                                <b>Mã số thuế : </b> {{$data->co_vat}}
                                </p>

                                <p class="text-muted">
                                <b>Địa chỉ : </b> {{$data->co_address}}
                                </p>

                                <p class="text-muted">
                                <b>Địa chỉ xuất hóa đơn : </b> {{$data->co_address_vat}}
                                </p>

                                <p class="text-muted">
                                <b>Ngành nghề : </b> {{$data->co_career}}
                                </p>

                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                  <p class="text-muted">
                                  <b>Điện thoại : </b>{{$data->co_phone ? $data->co_phone : "Chưa nhập"}}
                                  </p>
                                  

                                  <p class="text-muted">
                                  <b>Fax : </b> {{$data->co_fax ? $data->co_fax : "Chưa nhập"}}
                                  </p>

                                  <p class="text-muted">
                                  <b>Địa bàn : </b>{{$data->City->city_name}}
                                  </p>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                  <b>Ghi chú</b><br>
                                  {{$data->note}}
                              </div>
                              <!-- /.col -->
                              
                            </div>
                            <!-- /.row -->
                            
                      
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                              <div class="col-xs-12">
                                <a href="{{url('admin/company/edit/').'/'.$data->id}}" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Sửa thông tin</a>
                              </div>
                            </div>

                    {{----------------------------------------------------------}}
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
              </div>
              @endif
              <!-- /.tab-pane -->

              <div class="tab-pane" id="contract">
                  <section class="content">
                    {{--  <div class="callout callout-info">
                      <h4>Danh sách thành phố !</h4>
                    </div>  --}}
              
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box box-default">
                          <div class="box-header with-border">
                            <h3 class="box-title">Danh Sách Hợp đồng</h3>
                          </div>

                          <div class="box-body">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-contract">
                              Thêm hợp đồng
                            </button>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Tên hợp đồng</th>
                                  <th>Mã hợp đồng</th>
                                  <th>Giá trị</th>
                                  <th>Ngày kết thúc</th>
                                  <th>Nhân viên tạo</th>
                                  {{--  <th>Ngày gửi</th>  --}}
                                  {{-- <th>Action</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                
                                @foreach($data->Contract as $d)                      
                                <tr>
                                  <td>{{$d->id}}</td>
                                  <td>{{$d->Contracttype->name}}</td>
                                  <td>{{$d->code}}</td>
                                  <td>{{number_format($d->value).' VNĐ'}}</td>
                                  <td>{{date("d-m-Y", strtotime($d->day_end))}}</td>
                                  <td>{{$d->UserCreated->name}}</td>
                                  {{--  <td>{{date("d-m-Y",strtotime("-40 day", strtotime($d->day_end)))}}</td>  --}}
                                  {{-- <td><a href="#">Xóa</a> --}}
                                </tr>
                                @endforeach                
                                </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                    </div>             
                   
                  </section>
              </div>
              <!-- /.tab-pane -->

              {{-- <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div> --}}
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

<!-- Thêm Liên Hệ -->
<form action="{{route('postCustomer')}}" method="POST" role="form">
  {!! csrf_field() !!}
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Thêm liên hệ</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" value="{{$data->id}}" name="co_id">
          <input type="hidden" value="{{Auth::id()}}" name="user_created">
          <label>Tên khách hàng <b class="text-red">*</b></label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" value="{{old('cus_name')}}" placeholder="Company Name" name="cus_name">
          </div>    
          
          <label>Email</label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" value="{{old('cus_email')}}" placeholder="Email" name="cus_email">
          </div>

          <label>Điện thoại</label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
            <input type="text" class="form-control" value="{{old('cus_phone')}}" placeholder="Phone Number" name="cus_phone">
          </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>
<!-- ENd Thêm Liên Hệ -->


<!-- Thêm Hợp đồng -->
<form action="{{route('postAddContract')}}" method="POST" role="form">
  {!! csrf_field() !!}
  <div class="modal fade" id="modal-contract">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Thêm hợp đồng</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" value="{{$data->id}}" name="contract_co">
          <input type="hidden" value="{{Auth::id()}}" name="contract_user">
          @foreach($data->Customer as $d)  
          <input type="hidden" name="mail_contact[]" value="{{$d['cus_email']}}">
          @endforeach
          <div class="form-group">
            <label>Loại hợp đồng<b style="color:red">*</b></label>
            <select class="form-control select2" style="width: 100%;" name="contract_type" value="{{old('contract_type')}}">
              <option selected="selected" value="">Chọn</option>
              @foreach ($cttype as $c)
              <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          
          {{-- <label>Mã hợp đồng <b class="text-red">*</b></label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" placeholder="Contract Code" name="contract_code">
          </div>      --}}

          <label>Giá trị <b class="text-red">*</b></label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input type="text" class="form-control" placeholder="Value" name="contract_value">
            <span class="input-group-addon"> VNĐ</span>
          </div>  
          
          <label>Ngày bắt đầu</label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="date" class="form-control" name="contract_begin">
          </div>

          <label>Ngày kết thúc</label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
            <input type="date" class="form-control" name="contract_end">
          </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>
<!--END  Thêm Hợp đồng -->
@stop