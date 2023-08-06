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

                    @include('giangvien.partials.menu_profile_quick_info')

                    <br />


                    @include('giangvien.partials.sidebar_menu')

                    @include('giangvien.partials.menu_footer_button')
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
                                    <h2>Danh sách Đề án/Đồ án</h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="x_panel">
                                        <div class="">
                                            <div class="">
                                                <table id="datatable-checkbox"
                                                    class="table table-striped table-bordered bulk_action jambo_table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>
                                                        <th><input type="checkbox" id="check-all" class="flat">
                                                        </th>
                                                        </th> --}}
                                                            <th>Tên nhóm lớp</th>
                                                            <th>Các mốc</th>  
                                                            <th>Tình trạng</th>                                                         
                                                            <th>Số lượng sinh viên</th>
                                                            <th>Số lượng nhóm</th>
                                                           
                                                            {{-- <th>Số tín chỉ</th>
                                                                <th>Trạng thái</th>
                                                                <th>Ghi chú</th>
                                                                <th>Thiết lập</th> --}}
                                                            
                                                            <th style>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($nhomlop_data as $nhomlop)
                                                            <tr>
                                                                <td>{{ $nhomlop->tenlop }}</td>
                                                            <td>
                                                                - Nộp đề cương : {{ 
                                                                    !empty($nhomlop->thoigianxacnhan) ? date('d/m/Y H:i:s', strtotime($nhomlop->thoigianxacnhan)) : '-'
                                                                    }}<br>
                                                                - Nộp báo cáo : {{ !empty($nhomlop->thoigiannop) ? date('d/m/Y H:i:s', strtotime($nhomlop->thoigiannop)) : '-' }}<br>
                                                            </td>
                                                            <td>-</td> 
                                                            <td>{{ $nhomlop->soluongsv }}</td>
                                                            <td>{{ $nhomlop->soluongnhom }}</td> 
                                                            <td>
                                                                <a href="{{ route('giangvien.xemlop_page', ["nhomlop_id"=> $nhomlop->id]) }}" class="btn btn-success">Xem</a>
                                                            
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
                @include('giangvien.partials.footer')
                <!-- /footer content -->
            </div>
        </div>


</body>

</html>
