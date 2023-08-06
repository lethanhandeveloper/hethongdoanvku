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

                    @include('sinhvien.partials.menu_profile_quick_info')

                    <br />


                    @include('sinhvien.partials.sidebar_menu')

                    @include('sinhvien.partials.menu_footer_button')
                </div>
            </div>

            @include('sinhvien.partials.top_navigation')

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
                                                <table class="table table-striped jambo_table bulk_action">
                                                    <thead>
                                                        <tr>
                                                            <th>Đồ án cơ sở / Đề án / Khóa luận</th>
                                                            <th>Liên lạc<br class="visible-xs"> GVHD</th>
                                                            <th>Nộp <br class="visible-xs">đề cương/ <br
                                                                    class="visible-xs">kết quả</th>

                                                            <th><i class="fa fa-bullhorn"></i> Các mốc <br
                                                                    class="visible-xs">/ <br class="visible-xs">Trạng
                                                                thái</th>


                                                        </tr>
                                                    </thead>

                                                    <tbody class="lophocphan">

                                                        @foreach ($data as $lopdoan)
                                                        <tr class="even pointer">

                                                            <td style="vertical-align: middle;text-align: center;"
                                                                rowspan="2" class=" "><b
                                                                    style="text-transform:uppercase">{{ $lopdoan->tenlop }}</b><br><br>
                                                                - <a target="_blank" href="{{ asset('files/'.$lopdoan->yeucau) }}">Xem Yêu cầu</a> <a
                                                                    id="pop"
                                                                    title="Xây dựng ứng dụng mạng xã hội đa nền tảng bằng React Native - SV thực hiện Đỗ Công Đức 19IT061"
                                                                    href="{{ $lopdoan->yeucau }}"></a>
                                                            </td>
                                                            <td>
                                                                <div class="blockquote-box blockquote-info clearfix">
                                                                    <div class="square pull-left">
                                                                        <img src="https://toigingiuvedep.vn/wp-content/uploads/2021/07/mau-anh-the-dep-nam.jpeg"
                                                                            style="height: 100px;padding: 0px;margin: 0px;background: #FFF;">
                                                                    </div>
                                                                    <b style="text-transform: uppercase">{{ $lopdoan->gv1->chucdanh }}. {{ $lopdoan->gv1->hodem }} {{ $lopdoan->gv1->ten }}</b>
                                                                    <p>
                                                                        <a href="tel:905165870"><i
                                                                                class="fa fa-phone"></i>
                                                                                {{ $lopdoan->gv1->phone }}</a><br>
                                                                        <a href="mailto:dcduc@vku.udn.vn"><i
                                                                                class="fa fa-inbox"></i>
                                                                                {{ $lopdoan->gv1->email }}</a><br>
                                                                    </p>
                                                                </div>




                                                            </td>

                                                            <td class=" ">
                                                                @if (empty($lopdoan->nhom))
                                                                    Bạn là trưởng nhóm đề tài <br>
                                                                @else
                                                                    Bạn là thành viên của nhóm <br>
                                                                @endif
                                                                
                                                                <b>
                                                                    <div style="">
                                                                        {{ $lopdoan->tendetai ?? 'Chưa đăng ký đề tài'}}
                                                                    </div>
                                                                </b> 
                                                            </td>
                                                            <td class=" ">
                                                                <span style="color: #008000">- <b>Xác nhận đề cương chi
                                                                        tiết:</b> &nbsp;
                                                                    <span class="badge">
                                                                        {{ date('d/m/Y H:i:s', strtotime($lopdoan->thoigianxacnhan)) }} </span>
                                                                </span><br>
                                                                <span style="color: #008000">- <b>Nộp kết quả thực hiện
                                                                        đề tài:</b>
                                                                    <span class="badge">
                                                                        {{ date('d/m/Y H:i:s', strtotime($lopdoan->thoigiannop))  }} </span>
                                                                </span>


                                                            </td>
                                                        </tr>
                                                        <tr style="background: #FFF">


                                                            <td class=" "><b>Thời gian:</b> <br
                                                                    class="visible-xs">Thứ {{ $lopdoan->thu }} ({{ $lopdoan->tiet }})
                                                                <br><br><b>Phòng:</b> {{ $lopdoan->phong }}
                                                                <br>
                                                                <br>
                                                            </td>
                                                            <td class=" ">
                                                                @if ($lopdoan->filedecuong)
                                                                    <a
                                                                    href="{{ asset('files/'.$lopdoan->filedecuong) }}">Xem
                                                                    lại <br class="visible-xs">đề cương <br
                                                                        class="visible-xs">đã nộp</a><br><br
                                                                    class="visible-xs">
                                               
                                                                @endif

                                                                @php
                                                                   $thoigianxacnhan = DateTime::createFromFormat('Y-m-d H:i:s', $lopdoan->thoigianxacnhan);
                                                                   $thoigiannop = DateTime::createFromFormat('Y-m-d H:i:s', $lopdoan->thoigiannop);
                                                                   

                                                                   $now = new DateTime(date('Y-m-d H:i:s'));
                                                                   
                                                                    
                                                                    $tgxn_diff = $thoigianxacnhan->diff($now);
                                                                    $tgnop_diff = $thoigiannop->diff($now);
                                                                @endphp
                                                                @if ((($tgxn_diff->invert == 0 && !empty($lopdoan->filedecuong)) || $tgxn_diff->invert == 1) && empty($lopdoan->nhom))
                                                                <a class="btn btn-success"  href="{{ route("sinhvien.nopdecuong_form", ["doan_chitiet_id" => $lopdoan->doan_chitiet_id]) }}">Nộp đề cương
                                                                </a>
                                                                @endif
                                                                
                                                                <hr>


                                                                @if (!empty($lopdoan->filebaocao))
                                                                <a href="{{ asset('files/'.$lopdoan->filebaocao) }}">Xem lại
                                                                    <br class="visible-xs">báo cáo <br
                                                                        class="visible-xs">đề tài</a><br>
                                                                
                                                
                                                                   
                                                                @endif
                                                                
                                                                
                                                                        @if (($tgnop_diff->invert == 1 || !empty($lopdoan->filebaocao)) && empty($lopdoan->nhom))
                                                                        <a class="btn btn-success"  href="{{ route('sinhvien.nopketqua_form', ["doan_chitiet_id"=> $lopdoan->doan_chitiet_id]) }}">Nộp kết quả thực hiện
                                                                
                                                                   
                                                                        </a>
                                                                        @endif
                                                            </td>
                                                            <td>
                                                                <p>- Nộp đề cương chi tiết:</p>
                                                                <span
                                                                    style="background: {{ ($lopdoan->filedecuong) ? "#008000" : "" }}" class="badge"><span
                                                                        style="color: #FFF">{{ ($lopdoan->filedecuong) ? "Đã nộp" : "Chưa nộp" }}</span></span><br>
                                                                <p>- GVHD xác
                                                                    nhận:</p>
                                                                <span
                                                                    style="background: {{ ($lopdoan->xacnhandecuong && $lopdoan->xacnhandecuong === 1) ? "#008000" : "" }}" class="badge"><span
                                                                        style="color: #FFF">{{ ($lopdoan->xacnhandecuong && $lopdoan->xacnhandecuong === 1) ? "Đã xác nhận" : "Chưa xác nhận" }}</span></span><br>
                                                                        <p>- Nộp kết quả thực hiện đề
                                                                            tài:</p> 
                                                                        <span style="background: {{ ($lopdoan->filebaocao) ? "#008000" : "" }}"
                                                                            class="badge"><span style="color: #FFF">{{ ($lopdoan->filebaocao) ? "Đã nộp" : "Chưa nộp" }}</span></span> <br> 
                                                                            
                                                                @if (!empty($lopdoan-> filebaocao))
                                                                    <p>- Được phép bảo vệ đề
                                                                    tài:</p> 
                                                                    <span
                                                                    style="background: {{ ($lopdoan->chophepbaove && $lopdoan->chophepbaove === 1) ? "#008000" : "" }}" class="badge"><span
                                                                        style="color: #FFF">{{ ($lopdoan->chophepbaove && $lopdoan->chophepbaove === 1) ? "Đồng ý" : "Không đồng ý" }}</span></span> <br> 
                                                                @endif
                                                                        {{-- - --}}
                                                                {{-- Điểm Hướng dẫn:
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                    style="background: #008000" class="badge"><span
                                                                        style="color: #FFF">9</span></span> --}}    
                                                            </td>
                                                        </tr>
                                                        @if (!empty($lopdoan->hoidongcuatoi))
                                                        <tr>
                                                            <td colspan="9">
                                                                <div class="alert alert-success" role="alert"
                                                                    style="margin-bottom:0px; background-color: #dff0d8;border-color: #d0e9c6;color: #3c763d;">
                                                                    <i class="fa fa-calendar"></i> DANH SÁCH HỘI ĐỒNG
                                                                    "Đồ án chuyên ngành 1 (IT)" - Học kỳ 1 Năm học
                                                                    2022-2023
                                                                </div>

                                                                <table
                                                                    class="table table-striped jambo_table bulk_action table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tên hội đồng</th>
                                                                            <th>Phòng</th>
                                                                            <th>Ngày bắt đầu</th>
                                                                            <th>Giờ</th>
                                                                            <th>Thành viên hội đồng 1</th>
                                                                            <th>Thành viên hội đồng 2</th>
                                                                            <th>Thành viên hội đồng 3</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="lophocphan">
                                                                        <tr class="even pointer">
                                                                            <td>{{ $lopdoan->hoidongcuatoi->ten }}</td>
                                                                            <td width=""><b>{{ $lopdoan->phong }}</b></td>
                                                                            <td width="">{{  date('d/m/Y', strtotime($lopdoan->hoidongcuatoi->ngaybatdau))  }}</td>
                                                                            <td width="">{{ $lopdoan->hoidongcuatoi->giovaosang }}</td>
                                                                            <td width="">{{ $lopdoan->gv1->chucdanh.'.'.$lopdoan->gv1->hodem.' '.$lopdoan->gv1->ten }}</td>
                                                                            <td width="">{{ $lopdoan->gv2->chucdanh.'.'.$lopdoan->gv2->hodem.' '.$lopdoan->gv2->ten }}</td>
                                                                            <td width=""></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_panel">
                                                                        <div class="x_title">
                                                                            <div class="clearfix"></div>
                                                                        </div>* Sinh viên vào phòng bảo vệ trước khi
                                                                        diễn ra bảo vệ <b>10 phút</b> <br>
                                                                        <div class="x_content">
                                                                            <table border="1" class="">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th rowspan="3"
                                                                                            width="5%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                STT</div>
                                                                                        </th>
                                                                                        <th colspan="5"
                                                                                            width="50%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                THÔNG TIN SINH VIÊN
                                                                                            </div>
                                                                                        </th>
                                                                                        <th colspan="2"
                                                                                            width="40%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                TÌNH HÌNH THI</div>
                                                                                        </th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th rowspan="2"
                                                                                            width="10%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                SỐ THẺ</div>
                                                                                        </th>
                                                                                        <th rowspan="2"
                                                                                            colspan="2">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                HỌ VÀ TÊN</div>
                                                                                        </th>
                                                                                        <th rowspan="2"
                                                                                            width="9%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                NGÀY SINH</div>
                                                                                        </th>
                                                                                        <th rowspan="2"
                                                                                            width="5%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                LỚP SH</div>
                                                                                        </th>
                                                                                        <th rowspan="2"
                                                                                            width="5%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                ĐỀ TÀI</div>
                                                                                        </th>
                                                                                        <th rowspan="2"
                                                                                            width="10%">
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                GHI CHÚ</div>
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="lophocphan">
                                                                                    @foreach ($lopdoan->danhsachhoidong as $danhsachhoidong)
                                                                                    <tr class="content">
                                                                                        <td align="center">1</td>
                                                                                        <td>
                                                                                            <div
                                                                                                style="text-align:center">
                                                                                                {{ $danhsachhoidong->masv }}</div>
                                                                                        </td>
                                                                                        <td>{{ $danhsachhoidong->hodem }} </td>
                                                                                        <td class="name">{{ $danhsachhoidong->ten }}</td>
                                                                                        <td align="center">{{ date('d/m/Y', strtotime($danhsachhoidong->ngaysinh)) }}
                                                                                        </td>
                                                                                        <td align="center">{{ $danhsachhoidong->tenlopsinhhoat }}</td>
                                                                                        <td>
                                                                                            <div style="width:300px">
                                                                                               {{ $danhsachhoidong->tendetai }}</div>
                                                                                        </td>
                                                                                        <td align="center"></td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                    <tr class="content"
                                                                                        style="color: red">

                                                                                    </tr>   
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <tbody>

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
                @include('sinhvien.partials.footer')
                <!-- /footer content -->
            </div>
        </div>


</body>

</html>
