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
                                    <div class="x_panel">
                                        <div class="">
                                            <div class="">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Gửi email lớp</button>
                                                <table id="datatable-checkbox"
                                                    class="table table-striped table-bordered bulk_action jambo_table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>
                                                        <th><input type="checkbox" id="check-all" class="flat">
                                                        </th>
                                                        </th> --}}
                                                            <th style="width: 15%">Sinh viên thực hiện</th>
                                                            <th style="width: 30%">Thông tin đề tài</th>
                                                            {{-- <th>Định hướng</th>
                                                            <th>Kết quả dự kiến</th> --}}
                                                            <th>Tình trạng</th>
                                                            
                                                            <th>Ghi chú</th>
                                                            {{-- <th>Số tín chỉ</th>
                                                                <th>Trạng thái</th>
                                                                <th>Ghi chú</th>
                                                                <th>Thiết lập</th> --}}
                                                            
                                                            <th style="width: 10%">Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($chitietlop_data as $chitietlop)
                                                            
                                                            <tr>
                                                                <td>
                                                                 
                                                                    <b>{{ $chitietlop->truongnhom->masv }} - {{ $chitietlop->truongnhom->hodem }} {{ $chitietlop->truongnhom->ten }}</b> <br>
                                                                    @if (!empty($chitietlop->thanhvien))
                                                                        {{ $chitietlop->thanhvien->masv }} - {{ $chitietlop->thanhvien->hodem }} {{ $chitietlop->thanhvien->ten }} <br>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                   @if (empty($chitietlop->tendetai))
                                                                       <p class="badge badge-danger" style="background-color: #e44f4f;" >Sinh viên chưa đăng ký đề tài</p>
                                                                   @else
                                                                    - Tên đề tài : <b>{{ $chitietlop->tendetai }}</b><br>
                                                                    - Định hướng :  {{ $chitietlop->dinhhuong }}<br>
                                                                    - Kết quả dự kiến :  {{ $chitietlop->ketquadukien }}<br>
                                                                   @endif
                                                                </td>
                                                                <td>
                                                                    @if (empty($chitietlop->filedecuong))
                                                                    - Đề cương : <p class="badge badge-danger" style="background-color: #e44f4f;" > Chưa nộp</p><br>
                                                                    @else
                                                                        - Đề cương : <a href="{{ asset('files/'.$chitietlop->filedecuong) }}"><b>Xem file đề cương</b></a><br>
                                                                        - Xác nhận đề cương : @if ($chitietlop->xacnhandecuong == 1)
                                                                            <p class="badge badge-danger" style="background-color: #0e8d1d;" > Đã xác nhận</p><br>
                                                                        @else
                                                                        <p class="badge badge-danger" style="background-color: #e44f4f;" > Chưa xác nhận</p>
                                                                        @endif<br>
                                                                    @endif
                                                                    @if (empty($chitietlop->filebaocao))
                                                                        - Báo cáo : <p class="badge badge-danger" style="background-color: #e44f4f;" > Chưa nộp</p><br>
                                                                    @else
                                                                        - Báo cáo : <a href="{{ asset('files/'.$chitietlop->filebaocao) }}"><b>Xem file báo cáo</b></a><br>
                                                                        - Được phép bảo vệ : @if ($chitietlop->chophepbaove == 1)
                                                                        <p class="badge badge-danger" style="background-color: #0e8d1d;" > Đồng ý</p>
                                                                        @else
                                                                            <p class="badge badge-danger" style="background-color: #e44f4f;" > Không đồng ý</p>
                                                                        @endif<br>
                                                                    @endif
                                                                     
                                                                    
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <a class="btn btn-success">Gửi email nhóm</a><br>
                                                                    <a href="{{ route('giangvien.quanlylop_page', ["nhomlop_id"=> $chitietlop->doan_chitiet_id]) }}" class="btn btn-warning">Quản lý nhóm</a>
                                                                    @if (empty($chitietlop->filedecuong))
                                                                        <a href="{{ route('giangvien.nopdecuong_form', ["nhomlop_id"=> $chitietlop->doan_chitiet_id]) }}" class="btn btn-info">Nộp giúp đề cương</a>
                                                                    @endif
                                                                    @if (empty($chitietlop->filebaocao))
                                                                        <a href="{{ route('giangvien.nopbaocao_form', ["nhomlop_id"=> $chitietlop->doan_chitiet_id]) }}" class="btn btn-primary">Nộp giúp báo cáo</a>
                                                                    @endif
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Gửi email lớp</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Email:</label>
                                  <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Tiêu đề:</label>
                                    <input type="text" class="form-control">
                                  </div>
                                <div class="form-group">
                                  <label for="message-text" class="col-form-label">Nội dung:</label>
                                  <textarea class="form-control" id="message-text"></textarea>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                              <button type="button" class="btn btn-primary">Gửi</button>
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
