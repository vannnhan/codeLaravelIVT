{{-- {{dd($data)}} --}}
@extends('Admin/Master')
@section('title','Thông tin hợp đồng')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        THÔNG TIN HỢP ĐỒNG #{{$data->code}}
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
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    {{----------------------------------------------------------}}
                        
                            <!-- title row -->
                            <div class="row">
                              <div class="col-xs-12">
                                <h2 class="page-header">
                                  <i class="fa fa-globe"></i>Mã hợp đồng:  {{$data->code}}
                                  <small class="pull-right">Ngày tạo : {{$data->created_at}}</small>
                                </h2>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                              <div class="col-sm-4 invoice-col">
                                <p class="text-muted">
                                <b>Tên hợp đồng : </b> {{$data->Contracttype->name}}
                                </p>

                                <p class="text-muted">
                                <b>Ngày bắt đầu : </b> {{$data->day_begin}}
                                </p>

                                <p class="text-muted">
                                <b>Ngày kết thúc : </b> {{$data->day_end}}
                                </p>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                <p class="text-muted">
                                <b>Người tạo : </b>{{$data->UserCreated->name}}
                                </p>

                                <p class="text-muted">
                                <b>Của công ty : </b>{{$data->Company->co_name}}
                                </p>

                                <p class="text-muted">
                                <b>Giá trị hợp đồng : </b>{{number_format($data->value)}} VNĐ
                                </p>

                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                <p class="text-muted">
                                <b>Tình trạng hợp đồng : </b>{!! $data->ContractStatus['name'] !!}
                                </p>

                                <p class="text-muted">
                                <b>Ghi chú : </b>{{$data->note}}
                                </p>

                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            
                            
                            <div class="row no-print">
                              <div class="col-xs-12">
                                @if(Auth::user()->role!=='2')
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil"></i> Sửa thông tin</button>
                                @endif
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-note"><i class="fa fa-pencil"></i> Thêm ghi chú</button>
                              </div>
                            </div>
                            

                                
        
                    {{----------------------------------------------------------}}
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <div class="col-md-3">
            <div class="nav-tabs-custom">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      {{----------------------------------------------------------}}
                          
                        <!-- title row -->
                        <div class="row">
                          <div class="col-xs-12">
                            <h2 class="page-header">
                              Nhân viên thực hiện
                            </h2>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <p><center><b>Nhân viên thực hiện hợp đồng</b></center></p>
                          <p><center>{{$data->UserWork['name'] == null ? 'Chưa có nhân viên đảm nhận' : $data->UserWork['name']}}</center></p>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->                               
                        
                        <div class="row no-print">
                          @if(Auth::user()->role == '4' AND Auth::user()->sub_role == '1')
                          <div class="col-xs-12">
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-work"><i class="fa fa-pencil"></i> Giao việc</button>
                          </div>
                          @endif
                        </div>                               

                    </div>
                    <!-- /.user-block -->
                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
        </div>
        <!-- /.col -->
        @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('4') AND $data->status=='3')
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-action"> Thêm tiến độ</button>
              
            </div>
            <div class="box-body pad">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Ngày tháng</th>
                      <th>Tên tiến độ</th>
                      <th>Nội dung</th>
                      <th>Hình ảnh</th>

                    </tr>
                    </thead>
                    <tbody>
    
                    @foreach($data->ContractAction as $d)
                    <tr>
                      <td>{{date("H:i d-m-Y",strtotime($d['created_at']))}}</a></td>
                      <td>{{$d['name']}}</td>
                      <td>{{$d['note']}}</td>
                      <td><img src="{{$d['images']}}" width="200px"></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>{{date("d-m-Y",strtotime($data->created_at))}}</td>
                        <td>Hợp đồng bắt đầu được tạo trên hệ thống</td>
                        <td>
                            <p>Hợp đồng <b> {{$data->Contracttype->name}}</b> được tạo trên hệ thống.</p>
                            <p>Ngày bắt đầu: <b>{{date("d-m-Y",strtotime($data->day_begin))}}</b>  </p>
                            <p>Ngày kết thúc: <b>{{date("d-m-Y",strtotime($data->day_end))}}</b> </p>  
                        </td>
                      </tr>                
                    </tbody>
                  </table>

            </div>
          </div>
        </div>
        @endif


      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

<form action="{{route('postEditContract', $data->id)}}" method="POST" role="form">
  {!! csrf_field() !!}
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Sửa thông tin hợp đồng</h4>
        </div>
        <div class="modal-body"> 
          @foreach($data->Company->Customer as $d)   
            <input type="hidden" value="{{$d['cus_email']}}" name="mail_contact[]">
          @endforeach
          <input type="hidden" value="{{$data->Company->co_name}}" name="name_company">
          <input type="hidden" value="{{$data->Contracttype->name}}" name="name_contract">
          <input type="hidden" value="{{$data->Company->UserAssign['name']}}" name="assign_name">
          <input type="hidden" value="{{$data->Company->UserAssign['email']}}" name="assign_email">
          <input type="hidden" value="{{$data->Company->UserAssign['phone']}}" name="assign_phone">
          
          <label>Mã hợp đồng <b class="text-red">*</b></label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
            <input type="text" class="form-control" value="{{old('code',$data['code'])}}" name="code">
          </div>     

          <label>Giá trị <b class="text-red">*</b></label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input type="number" class="form-control currency" value="{{old('contract_value', $data['value'])}}" name="contract_value">
          </div>  
          
          <label>Ngày bắt đầu</label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
            <input type="date" class="form-control" value="{{old('contract_begin',$data['day_begin'])}}" name="contract_begin">
          </div>

          <label>Ngày kết thúc</label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
            <input type="date" class="form-control" value="{{old('contract_end',$data['day_end'])}}" name="contract_end">
          </div>
          
          @if(Auth::user()->role!=='2')
          <div class="form-group">
            <label>Tình trạng hợp đồng</label>
            <select class="form-control" name="contract_status">
              <option value="{{$data->status}}">{!!$data->ContractStatus['name']!!}</option>
              @if(Auth::user()->hasRole('1'))
                <option value="1">Chưa xác nhận</option> 
              @endif

              @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('3'))
                <option value="2">Xác nhận</option>
              @endif

              @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('4'))
                <option value="3">Đang thực hiện</option>
              @endif

              @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('4'))
                <option value="4">Hoàn thành</option>
              @endif

              @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('3'))
                <option value="5">Ngừng hợp đồng</option>
              @endif
            </select>
          </div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>

<form action="{{route('postContractNote', $data->id)}}" method="POST" role="form">
  {!! csrf_field() !!}
  <div class="modal fade" id="modal-note">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Thêm Ghi chú</h4>
        </div>
        <div class="modal-body"> 
          
            <label>Ghi chú</label>  
            <div class="box-body pad">
                <textarea class="textarea" name="contract_note"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('contract_note',$data['note'])}}</textarea>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>

<form action="{{route('postContractWork', $data->id)}}" method="POST" role="form">
  {!! csrf_field() !!}
  <div class="modal fade" id="modal-work">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Giao việc</h4>
        </div>
        <div class="modal-body"> 
           
            <div class="form-group">
                <label>Giao việc cho nhân viên</label>
                <select class="form-control" name="contract_work">
                  <option value="{{$data->user_work}}">{{$data->UserWork['name']}}</option>
                  @foreach($userWork as $u)
                    <option value="{{$u->id}}">{{$u->name}}</option> 
                  @endforeach
                </select>
              </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>

<form action="{{route('postActionContract')}}" method="POST" role="form" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="modal fade" id="modal-action">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Thêm tiến độ hồ sơ</h4>
        </div>
        <div class="modal-body">      
          <input type="hidden" value="{{$data->id}}" name="contract_id_action">
          <input type="hidden" value="{{$data->Company->co_vat}}" name="company_vat">  

          <label>Tiến độ<b class="text-red">*</b></label>   
          <div class="input-group">                   
            <span class="input-group-addon"><i class="fa fa-cogs"></i></span>
            <input type="text" class="form-control" value="{{old('contract_name_action')}}" name="contract_name_action">
          </div>

          <label>Đã hoàn thành<b class="text-red">(Chỉ được nhập sô)</b></label> 
          <div class="slidecontainer">
            <input type="range" min="1" max="100" value="{{old('contract_progress', $data['progress'])}}" class="slider" id="contract_progress" name="contract_progress">
            <center><span id="demo" style="font-weight:bold;color:red"></span></center>
          </div>
          

          <label>Hình ảnh</b></label> 
          <div class="input-group">
            <span class="input-group-btn">
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Chọn ảnh
              </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="filepath">
          </div>
          <img id="holder" style="margin-top:15px;max-height:100px;">

          <label>Ghi chú</label>  
          <div class="box-body pad">
              <textarea class="textarea" name="contract_name_note"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>

<script src="Theme/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="vendor/laravel-filemanager/js/lfm.js"></script>
<script>
  var domain = "";
  $('#lfm').filemanager('image', {prefix: domain});
</script>
<script>
  var slider = document.getElementById("contract_progress");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value; // Display the default slider value

  // Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
      output.innerHTML = this.value;
  }
</script>
@stop