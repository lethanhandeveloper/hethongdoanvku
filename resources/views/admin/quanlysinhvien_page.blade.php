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
                                    <h2>Dữ liệu sinh lớp {{ $nhomlop_data->tenlop }}</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="">
                                        <div class="">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">Thêm sinh viên
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form
                                                            action="{{ route('admin.addSinhVien', ['nhomlop_id' => $nhomlop_id]) }}"
                                                            method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <input type="hidden" value="{{ $nhomlop_data->id }}"
                                                                    name="nhomlop_id">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Nhập id
                                                                        sinh
                                                                        viên(mỗi id trên một dòng)</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="id_sinhvien"></textarea>


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Lưu</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="x_content">
                                                @if (count($sinhvien_data) > 0)
                                                    <table id="datatable-checkbox"
                                                        class="table table-striped table-bordered bulk_action jambo_table table-responsive table-sm">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th>
                                                    <th><input type="checkbox" id="check-all" class="flat">
                                                    </th>
                                                    </th> --}}
                                                                <th style="width: 15%">Mã sinh viên</th>
                                                                <th style="width: 15%">Tên sinh viên</th>
                                                                <th>Đề cương chi tiết</th>
                                                                <th>Báo cáo</th>
                                                                <th>Thao tác</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!empty($sinhvien_data))
                                                                @foreach ($sinhvien_data as $sinhvien)
                                                                <tr>
                                                                    <td>
                                                                        {{ $sinhvien->masv }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $sinhvien->hodem.' '.$sinhvien->ten }}
                                                                    </td>
                                                                    <td>_</td>
                                                                    <td>_</td>
                                                                    <td>
                                                            
                                                                                <span class="mt-2">
                
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-sm">Xóa
                                                                                        sinh viên</button>
                                                                                </span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <h2>Chưa có dữ liệu sinh viên trong nhóm</h2>
                                                @endif
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
                {{-- @include('partials.footer') --}}
                <!-- /footer content -->
            </div>
        </div>


</body>

</html>
