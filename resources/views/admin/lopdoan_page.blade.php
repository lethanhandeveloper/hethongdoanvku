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
            <div class="right_col" role="main">
                
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
                            <div class="x_panel" >
                                <div class="x_title">
                                    <h2>Danh sách Đề án/Đồ án</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="x_panel" style="min-height: 600px">
                                        <div class="">
                                            <div class="x_content">
                                                
                                                <table id="datatable-checkbox"
                                                    class="table table-striped table-bordered bulk_action jambo_table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>
                                                        <th><input type="checkbox" id="check-all" class="flat">
                                                        </th>
                                                        </th> --}}
                                                            <th>Tên lớp đồ án/đề án</th>
                                                            
                                                            <th>Yêu cầu</th>
                                                            <th>Tiến độ tạo nhóm</th>
                                                            <th>Tiến độ duyệt đề cương</th>
                                                            <th>Tiến độ nộp báo cáo</th>
                                                            {{-- <th>Số tín chỉ</th>
                                                                <th>Trạng thái</th>
                                                                <th>Ghi chú</th>
                                                                <th>Thiết lập</th> --}}
                                                            <th style>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($lophocphan_data as $lophocphan)
                                                            <tr>
                                                                {{-- <td>
                                                            <th><input type="checkbox" id="check-all" class="flat">
                                                            </th> --}}
                                                                {{-- </td> --}}
                                                                <td>{{ $lophocphan->tenlop }}</td>
                                                               
                                                                <td><a href="{{ asset("files/".$lophocphan->yeucau) }}">Xem yêu cầu</a></td>
                                                             
                                                                {{-- <td>{{ $lophocphan->soTC }}</td>
                                                                    <td>{{ $lophocphan->trangthai }}</td>
                                                                    <td>{{ $lophocphan->ghichu }}</td> --}}
                                                                    
                                                                <td>{{ $lophocphan->thoigiantaonhom ? date('d-m-Y H:m:s', strtotime($lophocphan->thoigiantaonhom)) : "-" }}</td>
                                                                <td>{{ $lophocphan->thoigianxacnhan ? date('d-m-Y H:m:s', strtotime($lophocphan->thoigianxacnhan)) : "-" }}</td>
                                                                <td>{{ $lophocphan->thoigiannop ? date('d-m-Y H:m:s', strtotime($lophocphan->thoigiannop)) : "-" }}</td>
                                                                
                                                                <td>
                                                                    <a href="{{ route('admin.settingLopDoAn_form', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                        class="btn btn-warning">Cài đặt lớp</a>
                                                                    <a href="{{ route('admin.themnhomlop_form', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                        class="btn btn-primary">Phân nhóm lớp</a>
                                                                    <a href="{{ route('admin.xemnhomlop', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                        class="btn btn-success">Xem nhóm lớp</a>
                                                                        <a href="{{ route('admin.lichbaove_form', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                            class="btn btn-warning">Lịch bảo vệ</a>
                                                                    {{-- <a href="{{ route('xemnhomlop', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                            class="btn btn-success">Cài đặt lớp</a><br>
                                                                            <a href="{{ route('xemnhomlop', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                                class="btn btn-success">Quản lý sinh viên</a><br> --}}

                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

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


</body>

</html>
