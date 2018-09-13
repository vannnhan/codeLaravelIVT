@extends('Admin/Master')
@section('title', 'Trang quản trị')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        SETTING
    </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class="active"><a href="#">Tùy chỉnh</a></li>
            <li><a href="admin/setting/city">Thành phố</a></li>
            <li><a href="admin/setting/cotype" >Loại khách hàng</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane" id="city">
                    @yield('city')
                </div>


                <div class="tab-pane" id="cotype">
                    @yield('cotype')   
                </div>
            

                <div class="tab-pane" id="settings">
                
                </div>
        
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
</div>
@stop