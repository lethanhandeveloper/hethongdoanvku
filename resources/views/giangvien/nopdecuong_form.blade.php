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
                                    <h2>Nộp đề cương chi tiết</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <p class="text-muted font-13 m-b-30">
                                    </p>
                                    <div class="alert alert-success" role="alert"
                                        style="margin-bottom:0px; background-color: #dff0d8;border-color: #d0e9c6;color: #3c763d;">
                                        - Sinh viên cần phải gặp Giảng viên để thực hiện đề án/đồ án theo thời
                                        gian/phòng/lịch đăng ký hoặc liên lạc trực tiếp SĐT của giảng viên
                                        <br> - Sinh viên tham khảo <b>mẫu tài liệu đề cương chi tiết đồ án / đề án</b>
                                        tại <a target="_blank" href="http://vku.udn.vn/tai-nguyen/dao-tao/">đây</a>
                                        <br> - Sinh viên cần lưu ý các mốc phải hoàn thành (nộp đề cương, nộp kết quả
                                        thực hiện) theo đúng thời gian quy định.
                                        <br>- Giảng viên sẽ căn cứ vào trao đổi, báo cáo hệ thống để xác nhận bạn có
                                        được <b>chấp thuận đề cương</b> hoặc <b>cho phép bảo vệ đề tài/đề án</b> hay
                                        không
                                    </div>
                                    <p></p>
                                    <div>
                                        <script>
                                            function check_truongnhom() {
                                                truongnhom = $("input[id='truongnhom']:checked").val();
                                                if (truongnhom == "on") {
                                                    $("#table_truongnhom").show();
                                                    $("#table_thanhvien").hide();
                                                } else {
                                                    $("#table_truongnhom").hide();
                                                    $("#table_thanhvien").show();
                                                }
                                            }
                                        </script>



                                        <h2>Bạn đã có nhóm chưa?</h2>
                                        <div class="radio">
                                            <label><input checked="" type="radio" id="truongnhom"
                                                    onclick="check_truongnhom()" name="optradio">Tôi là trưởng nhóm hoặc
                                                làm đề tài 1 mình</label>
                                            <input type="hidden" name="nhom" value="">
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" id="thanhvien" onclick="check_truongnhom()"
                                                    name="optradio">Tôi đã có nhóm rồi</label>
                                        </div>
                                        <form action="{{ route('giangvien.nopdecuong') }}" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="doan_chitiet_id"
                                                value="{{ $doan_data->doan_chitiet_id }}">
                                            <div style="display: block;" width="100%" id="table_truongnhom"
                                                class="control-group">
                                                <hr>
                                                <div class="row">
                                                    <div class="control-group col-md-12">
                                                        <label class="control-label" for="basicinput">Tên đề tài</label>
                                                        <div class="controls">
                                                            <input required="required" name="tendetai" tabindex="1"
                                                                type="text" class="form-control"
                                                                placeholder="Điền tên đề tài đã thống nhất với giảng viên..."
                                                                value="{{ $doan_data->tendetai }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="control-group col-md-12">
                                                        <label class="control-label" for="basicinput">Kết quả dự
                                                            kiến</label>
                                                        <div class="controls">
                                                            <textarea name="ketquadukien" tabindex="1" type="text" class="form-control"
                                                                placeholder="Điền các kết quả dự kiến của đề tài...">{{ $doan_data->ketquadukien }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="control-group col-md-12">

                                                        <label class="control-label" for="basicinput">Nộp file đề cương
                                                            (*.doc, *.docx) (mẫu xem <a
                                                                href="http://vku.udn.vn/tai-nguyen/dao-tao/"
                                                                target="_blank">tại đây</a>)</label>
                                                        <div class="controls">
                                                            <input required="required" class="form-control"
                                                                type="file" tabindex="3" name="filedecuong">

                                                        </div>
                                                    </div>
                                                    <div class="control-group col-md-12">
                                                        <br>
                                                        <input type="submit" style="cursor:pointer"
                                                            class="dialog_link btn btn-success" value="Cập nhật">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('sinhvien.chonnhomdoan') }}" method="post">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="doan_chitiet_id"
                                                value="{{ $doan_data->doan_chitiet_id }}">
                                            <table style="display: none;" width="100%" id="table_thanhvien">
                                                <tbody>
                                                    <tr>
                                                        <td width="40%"><b>Nhóm</b></td>
                                                        <td>

                                                            <select name="nhom" size="6"
                                                                class="form-control">
                                                                <option value="">Chọn nhóm</option>
                                                                @foreach ($nhomtruong_data as $nhomtruong)
                                                                    <option value="{{ $nhomtruong->doan_chitiet_id }}">
                                                                        (Trưởng nhóm:
                                                                        {{ $nhomtruong->hodem . ' ' . $nhomtruong->ten }}) -
                                                                        {{ !empty($nhomtruong->tendetai) ? $nhomtruong->tendetai : 'Chưa đăng ký đề tài' }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td></td><br>
                                                        <td><br><input type="submit" style="cursor:pointer"
                                                                class="dialog_link btn btn-success mt-2"
                                                                value="Cập nhật"></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
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

        <script type="text/javascript">
            $(document).ready(function() {

            });
        </script>

</body>

</html>
