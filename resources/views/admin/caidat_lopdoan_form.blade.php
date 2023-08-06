<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hệ thống quản lý đồ án - Trường Đại học CNTT&TT Việt - Hàn </title>

    @include('top_include')
    @include('bottom_include')



</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-university"></i> <span>VKU!</span></a>
                    </div>

                    <div class="clearfix"></div>

                    @include('admin.partials.menu_profile_quick_info')

                    <br />


                    @include('admin.partials.sidebar_menu')

                    @include('admin.partials.menu_footer_button')
                </div>
            </div>

            @include('partials.top_navigation')

            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 100%">
                <div class="">
                    {{-- <div class="page-title">
                        <div class="title_left">
                            <h3>Danh sách Đề án/Đồ án</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Danh sách Đề án/Đồ án</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="min-height: 700px">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="x_content">
                                                <form class="form-horizontal form-label-left" id="groupFormParent"
                                                    enctype="multipart/form-data" method="post"
                                                    action="{{ route('admin.settingLopDoAn', ['lopdoan_id' => $lopdoan_id]) }}">
                                                    {{ csrf_field() }}
                                                    <div id="groupInfoFormWrapper">
                                                        <div class="groupInfoForm" id="groupInfoForm-1">
                                                            <hr>
                                                            <div class="form-group" class="tennhomlopBox">
                                                                <label style="float: left"
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Thời
                                                                    gian tạo nhóm    
                                                                </label>
                                                                <div class="form-group" style="width: 30%; float: left">
                                                                    <div class='input-group date'>
                                                                        <input type='text' name="thoigiantaonhom"
                                                                            required 
                                                                            value="{{ $caidat_data ? date('d/m/Y H:i:s', strtotime($caidat_data->thoigiantaonhom)) : null }}"
                                                                            class="form-control timeInput"/>
                                                                        <span class="input-group-addon">
                                                                            <span
                                                                                class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" class="tennhomlopBox">
                                                                <label style="float: left"
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Thời
                                                                    gian xác nhận
                                                                </label>
                                                                <div class="form-group" style="width: 30%; float: left">
                                                                    <div class='input-group date'>
                                                                        <input type='text' name="thoigianxacnhan"
                                                                            required
                                                                            
                                                                            value="{{$caidat_data  ? date('d/m/Y H:i:s', strtotime($caidat_data->thoigianxacnhan)) : null }}"
                                                                            class="form-control timeInput"
                                                                            id='createGroupTimeInput' />
                                                                        <span class="input-group-addon">
                                                                            <span
                                                                                class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" class="tennhomlopBox">
                                                                <label style="float: left"
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Thời
                                                                    gian nộp
                                                                </label>
                                                                <div class="form-group" style="width: 30%; float: left">
                                                                    <div class='input-group date'>
                                                                        <input type='text' name="thoigiannop"
                                                                            required  
                                                                            value="{{ $caidat_data ? date('d/m/Y H:i:s', strtotime($caidat_data->thoigiannop)) : null }}"
                                                                            class="form-control timeInput"
                                                                            id='createGroupTimeInput' />
                                                                        <span class="input-group-addon">
                                                                            <span
                                                                                class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" class="tennhomlopBox">
                                                                <label style="float: left"
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Yêu
                                                                    cầu
                                                                </label>
                                                                <div class="form-group"
                                                                    style="width: 30%; float: left">
                                                                    <div class='input-group date'>
                                                                        <input type='file' class="form-control"
                                                                            name="yeucau" {{ $caidat_data ? null : "required" }}
                                                                            id='createGroupTimeInput' />
                                                                        @if ($caidat_data)
                                                                            <a href="{{ asset("files/".$caidat_data->yeucau) }}">Xem yêu cầu</a>
                                                                            <input type="hidden" name="yeucaucu" value="{{ $caidat_data->yeucau }}">
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" class="tennhomlopBox">
                                                                <label style="float: left"
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Định
                                                                    hướng

                                                                </label>
                                                                <div class="form-group"
                                                                    style="width: 30%; float: left"
                                                                    id="dinhhuongWrapper">
                                                                    @if (empty($dinhhuongArr))

                                                                        <div class='input-group date dinhhuongItem'
                                                                            id="dinhhuongItem">
                                                                            <input type='text'
                                                                                class="form-control mt-0"
                                                                                name="dinhhuong[]" required />
                                                                            <span class="input-group-btn">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-removeDinhHuong">
                                                                                    X
                                                                                </button>
                                                                            </span>
                                                                        </div>

                                                                        <button class="btn btn-success btn-sm"
                                                                            id="btn-themDinhHuong">Thêm định
                                                                            hướng</button>
                                                                    @else
                                                                        @foreach ($dinhhuongArr as $key => $dinhhuong)
                                                                            @if ($key === 0)
                                                                                <div class='input-group date dinhhuongItem'
                                                                                    id="dinhhuongItem">
                                                                                    <input type='text'
                                                                                        value="{{ $dinhhuong }}"
                                                                                        class="form-control mt-0"
                                                                                        
                                                                                        name="dinhhuong[]" required />
                                                                                    <span class="input-group-btn">
                                                                                        <button type="button"
                                                                                            class="btn btn-danger btn-removeDinhHuong">
                                                                                            X
                                                                                        </button>
                                                                                    </span>
                                                                                </div>
                                                                            @else
                                                                                <div
                                                                                    class='input-group date dinhhuongItem'>
                                                                                    <input type='text'
                                                                                        class="form-control mt-0"
                                                                                        value="{{ $dinhhuong }}"
                                                                                        name="dinhhuong[]" required />
                                                                                    <span class="input-group-btn">
                                                                                        <button type="button"
                                                                                            class="btn btn-danger btn-removeDinhHuong">
                                                                                            X
                                                                                        </button>
                                                                                    </span>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                        <button class="btn btn-success btn-sm"
                                                                            id="btn-themDinhHuong">Thêm định
                                                                            hướng</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_hocphan" value="" />
                                                            <input type="hidden" name="namhoc" value="" />
                                                            <input type="hidden" name="hocky" value="" />
                                                        </div>
                                                    </div>


                                                    <div class="form-group" style="margin-top: 30px">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                            <button type="button" class="btn btn-primary">
                                                                Hủy
                                                            </button>
                                                            <button type="reset" class="btn btn-primary">
                                                                Nhập lại
                                                            </button>
                                                            <button type="submit" class="btn btn-success"
                                                                id="btn-save">
                                                                Lưu lại
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                @include('admin.partials.footer')
                <!-- /footer content -->
            </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $(".timeInput").datetimepicker({
                    showSecond: true,
                    format: 'd/m/Y H:i:s',
                    autoHide: true
                });

                // $("#btn-themDinhHuong").click(function(e) {
                //     e.preventDefault();


                // });

                $("#btn-themDinhHuong").on("click", function(e) {
                    e.preventDefault();
                    var dinhhuongItem = $("#dinhhuongItem").clone();
                    dinhhuongItem.removeAttr("id");
                    dinhhuongItem.val('');

                    $(this).before(dinhhuongItem);
                });

                $(document).on("click", ".btn-removeDinhHuong", function() {

                    console.log($(this).parent().parent());
                    console.log("ok");
                    $(this).parent().parent().remove();
                });
            });
        </script>

</body>

</html>
