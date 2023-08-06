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
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>{{ $lopdoan_data->tenlop }}</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="">
                                        <div class="">
                                            <div class="x_content">
                                                <table id="datatable-checkbox"
                                                    class="table table-striped table-bordered bulk_action jambo_table table-responsive table-sm">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>
                                                        <th><input type="checkbox" id="check-all" class="flat">
                                                        </th>
                                                        </th> --}}
                                                            <th style="width: 15%">Tên nhóm lớp</th>
                                                            <th>Tình trạng</th>
                                                            <th style="width: 20%">Giảng viên hướng dẫn</th>
                                                            <th>Tiếp sv</th>
                                                            <th>Các mốc</th>
                                                            <th style="width: 10%">Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        @foreach ($nhomlop_data as $nhomlopdoan)
                                                            <tr>
                                                                {{-- <td>
                                                            <th><input type="checkbox" id="check-all" class="flat">
                                                            </th> --}}
                                                                {{-- </td> --}}
                                                                {{-- <td>{{ $lophocphan->soTC }}</td>
                                                                    <td>{{ $lophocphan->trangthai }}</td>
                                                                    <td>{{ $lophocphan->ghichu }}</td> --}}
                                                                {{-- <td><a href="{{ route('themnhomlop_form', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                        class="btn btn-primary">Phân nhóm lớp</a>
                                                                    <a href="{{ route('xemnhomlop', ['lopdoan_id' => $lophocphan->id]) }}"
                                                                        class="btn btn-success">Xem nhóm lớp</a>
                                                                </td> --}}
                                                                <td>
                                                                    <b>{{ $nhomlopdoan->tenlop }}<b><br>
                                                                        <br>
                                                                    <span class="mt-2">
                                                                        <button type="button" class="btn btn-default btn-sm">Sửa lớp</button>
                                                                        <button type="button" class="btn btn-danger btn-sm">Xóa lớp</button>
                                                                    </span>
                                                                </td>
                                                                <td>_</td>
                                                                <td>
                                                                    {{ $nhomlopdoan->tengv_1 }}<br>
                                                                    {{ $nhomlopdoan->tengv_2 }}
                                                                </td>
                                                                <td>
                                                                    {{ $nhomlopdoan->thu }}|{{ $nhomlopdoan->tiet }}|{{ $nhomlopdoan->phong }}
                                                                
                                                                </td>
                                                                <td>
                                                                    <p class="text-success"><b>- Xác nhận:</b> </p>
                                                                    <p class="text-danger"><b>- Nộp báo cáo:</b> </p>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-default" href="{{ route("admin.qlsinhvien_page", ["nhomlop_id"=> $nhomlopdoan->id]) }}">Quản lý sinh viên</a><br>
                                                                    <button class="btn btn-warning">Quản lý đồ án</button>
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
