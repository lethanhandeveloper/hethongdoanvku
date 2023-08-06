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
                                    <h2>Thêm hội đồng chấm</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="min-height: 700px">
                                    <div class="">
                                        <div class="">
                                            <div class="x_content">
                                                <form action="{{ route('admin.themhoidong') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tên hội đồng</label>
                                                        <input name="ten" type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="Tên hội đồng">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Đợt bảo vệ</label>
                                                        
                                                        <select name="dot_id" id="" class="form-control">
                                                            <option class="form-control" value="-1"
                                                            >-- Chọn --
                                                            </option>
                                                            @foreach ($dotbaove_data as $dotbaove)
                                                                <option class="form-control"
                                                                    value="{{ $dotbaove->id }}">{{ $dotbaove->ten }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Phòng</label>
                                                        <select name="phong_id" id="" class="form-control">
                                                            @foreach ($phong_data as $phong)
                                                                <option class="form-control" value="{{ $phong->id }}" name="">
                                                                    {{ $phong->tenphong }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Ngày bắt đầu</label>
                                                        <input name="ngaybatdau" type="text" class="form-control timeInput"
                                                            id="startDay">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Ngày kết thúc</label>
                                                        <input name="ngayketthuc" type="text" class="form-control timeInput"
                                                            id="endDay">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Giờ bắt đầu</label>
                                                        <input name="giovaosang" type="time" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiết
                                                            <div class="required">*
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12"
                                                            style="display: flex; align-items: center">
                                                            <select class="form-control tietbatdau" name="tietbatdau"
                                                                style="float: left; margin-right: 2%" required>
                                                                <option value="-1" disabled selected>
                                                                    --Chọn--</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                {{-- <option>5</option> --}}
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                {{-- <option>10</option> --}}
                                                            </select>
                                                            <div style="align-content: center; float: left; margin-right: 2%"><i
                                                                    class="fa fa-long-arrow-right"
                                                                    style="font-size: 20px; "></i></div>
                                                            <select class="form-control tietketthuc" name="tietketthuc"
                                                                style="" required>
                                                                {{-- <option>--Chọn--</option> --}}
        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label>Thành viên hội đồng 1</label>
                                                        <select name="thanhvien1" id="" class="form-control">
                                                            <option value="-1" >-- Chọn giảng viên --</option>
                                                            @foreach ($giangvien_data as $giangvien)
                                                                <option value="{{ $giangvien->id }}">
                                                                    {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" class="form-group">
                                                        <label for="exampleInputPassword1">Thành viên hội đồng 2</label>
                                                        <select name="thanhvien2" id="" class="form-control">
                                                            <option value="-1">-- Chọn giảng viên --</option>
                                                            @foreach ($giangvien_data as $giangvien)
                                                                <option class="form-control" value="{{ $giangvien->id }}">
                                                                    {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" class="form-group">
                                                        <label for="exampleInputPassword1">Thành viên hội đồng
                                                            3</label>
                                                        <select name="thanhvien3" id="" class="form-control">
                                                            <option value="-1">-- Chọn giảng viên --</option>
                                                            @foreach ($giangvien_data as $giangvien)
                                                                <option class="form-control" value="{{ $giangvien->id }}">
                                                                    {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" class="form-group">
                                                        <label for="exampleInputPassword1">Thành viên hội đồng
                                                            4</label>
                                                        <select name="thanhvien4" id="" class="form-control">
                                                            <option value="-1">-- Chọn giảng viên --</option>
                                                            @foreach ($giangvien_data as $giangvien)
                                                                <option class="form-control" value="{{ $giangvien->id }}">
                                                                    {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" class="form-group">
                                                        <label for="exampleInputPassword1">Thành viên hội đồng
                                                            5</label>
                                                        <select name="thanhvien5" id="" class="form-control">
                                                            <option value="-1">-- Chọn giảng viên --</option>
                                                            @foreach ($giangvien_data as $giangvien)
                                                                <option class="form-control" value="{{ $giangvien->id }}">
                                                                    {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
        
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                    </form>
                                            </div>

                                            


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
                format: 'Y-m-d H:i:s',
                autoHide: true
            });


            $(document).on('change', '.tietbatdau', function() {

                var tietketthucArr = [];
                var tietbatdau = parseInt($(this).val());


                if (tietbatdau > 0) {
                    if (tietbatdau < 6) {
                        for (var i = tietbatdau + 1; i <= 5; i++) {
                            tietketthucArr.push(i);
                        }
                    } else {
                        for (var i = tietbatdau + 1; i <= 10; i++) {
                            tietketthucArr.push(i);
                        }
                    }


                }

                var tietketthucSelect = $(this).parent().find('.tietketthuc');
                tietketthucSelect.empty();

                var tietketthucOption = '<option value="-1" disabled selected>--Chọn--</option>';
                tietketthucSelect.append(tietketthucOption);
                tietketthucArr.forEach((element) => {
                    tietketthucOption = '<option>' + element + '</option>';
                    tietketthucSelect.append(tietketthucOption);
                });


            });


        });
    </script>
    
</body>

</html>
