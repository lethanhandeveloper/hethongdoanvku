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
                                    <h2>Nộp đồ án: báo cáo, slide, mã nguồn, (nếu có)</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <p class="text-muted font-13 m-b-30">
                                    </p>
                                    <div class="alert alert-success" role="alert"
                                        style="margin-bottom:0px; background-color: #dff0d8;border-color: #d0e9c6;color: #3c763d;">
                                        - Sau khi thực hiện, sinh viên cần nộp báo cáo (file word) lên hệ thống.
                                        <br> -Sinh viên cần nộp link slide báo cáo, mã nguồn (nếu đồ án cơ sở và đề án
                                        yêu cầu) bằng cách up lên google drive (ở chế độ share <b>public</b>)
                                        <br> - Để thống nhất định dạng báo cáo đồ án, báo cáo thực tập, Phòng Đào tạo
                                        gởi các bạn Mẫu báo cáo tại <a target="_blank"
                                            href="http://vku.udn.vn/tai-nguyen/dao-tao/">đây</a>
                                        <br>- Giảng viên sẽ căn cứ vào trao đổi, báo cáo được hệ thống để xác nhận bạn
                                        có được <b>cho phép bảo vệ đề tài/đề án</b> hay không
                                    </div>
                                    <p></p>
                                    <div>


                                        <form action="{{ route('sinhvien.nopketqua') }}"
                                            method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="doan_chitiet_id" value="{{ $doan_data->doan_chitiet_id }}">
                                            <div class="row">
                                                <div class="control-group col-md-12">
                                                    <label class="control-label" for="basicinput">Nộp file báo cáo
                                                        (*.doc, *.docx) (mẫu xem <a
                                                            href="http://vku.udn.vn/tai-nguyen/dao-tao/"
                                                            target="_blank">tại đây</a>)
                                                        <br>Báo cáo phải được ký duyệt bởi giảng viên hướng dẫn trước
                                                        khi Bảo vệ trước Hội đồng.
                                                    </label>
                                                    <div class="controls">
                                                        <input required="required" class="form-control" type="file"
                                                          tabindex="3" name="filebaocao">

                                                    </div>
                                                    Thao tác:<br>

                                                </div>
                                                <br>
                                                <br>

                                                <div class="control-group col-md-12">
                                                    <br>
                                                    <label class="control-label" for="basicinput">Đường dẫn mã nguồn,
                                                        báo cáo, slide,.. ở chế độ share public (google drive). <a
                                                            target="_blank"
                                                            href="https://www.youtube.com/watch?v=3CdfdTmPvj8">Xem hướng
                                                            dẫn tại đây</a>.<br>Trong trường hợp tài nguyên slide, mã
                                                        nguồn (nếu có) chưa được cấp quyền để tải theo hướng dẫn, trường
                                                        hợp này coi như sinh viên không nộp tài nguyên slide, mã nguồn
                                                        <br></label>
                                                    <div class="controls">
                                                        <input value="" name="urlmanguon" tabindex="1"
                                                            type="text" class="form-control"
                                                            placeholder="Điền Url Google drive tài nguyên slide, mã nguồn">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="control-group col-md-12">
                                                    <br>
                                                    <input type="submit" style="cursor:pointer"
                                                        class="dialog_link btn btn-success" value="Cập nhật báo cáo">
                                                    <a href="/sv/do-an-cua-toi"><input type="button"
                                                            style="cursor:pointer" class="dialog_link btn btn-warning"
                                                            value="Quay về"></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <script>
                                        document.forms[0].addEventListener('submit', function(evt) {
                                            var file = document.getElementById('file').files[0];

                                            if (file && file.size < 20485760) {
                                                //Submit form        
                                            } else {
                                                alert("File báo cáo quá nặng, vui lòng điều chỉnh lại báo cáo về < 20MB");
                                                //Prevent default and display error
                                                evt.preventDefault();
                                            }
                                        }, false);
                                    </script>
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
