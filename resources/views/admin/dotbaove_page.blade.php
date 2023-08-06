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
                                <div class="x_content">
                                    <div class="x_panel" style="min-height: 600px">
                                        <div class="">
                                            <div class="x_content">
                                                <a class="btn btn-primary" href="{{ route('admin.dotbaove_form') }}">Thêm đợt bảo vệ</a>
                                                
                                                <table id="datatable-checkbox"
                                                    class="table table-striped table-bordered bulk_action jambo_table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>
                                                        <th><input type="checkbox" id="check-all" class="flat">
                                                        </th>
                                                        </th> --}}
                                                            <th>Tên đợt bảo vệ</th>
                                                            <th>Học phần</th>                                                          
                                                            <th>Ngày bắt đầu</th>
                                                            <th>Ngày kết thúc</th>
                                                            {{-- <th>Số tín chỉ</th>
                                                                <th>Trạng thái</th>
                                                                <th>Ghi chú</th>
                                                                <th>Thiết lập</th> --}}
                                                            <th>Năm học-Học kỳ</th>
                                                            <th style>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dotbaove_data as $dotbaove)
                                                            <tr>
                                                                <td>{{ $dotbaove->ten }}</td>
                                                           
                                                           
                                                                <td>{{ $dotbaove->tenhocphan }}</td>
                                                        
                                                           
                                                                <td>{{ $dotbaove->ngaybatdau }}</td>
                                                           
                                                            
                                                                <td>{{ $dotbaove->ngayketthuc }}</td>
                                                           
                                                           
                                                                <td>{{ $dotbaove->nambatdau.'-'.$dotbaove->namketthuc }} Học kỳ {{ ($dotbaove->hocky!== 3) ? $dotbaove->hocky : "Hè" }}</td>
                                                            
                                                            
                                                                <td>
                                                                    <button class="btn btn-success">Sửa</button>
                                                                    <a class="btn btn-danger" href="">Xóa</a>
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
