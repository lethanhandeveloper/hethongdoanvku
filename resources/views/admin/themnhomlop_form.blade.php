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

            @include('admin.partials.top_navigation')

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
                            <div class="">
                                <div class="x_title">
                                    <h2>Phân nhóm lớp đồ án</h2>
                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="">
                                                <br>
                                                <form class="form-horizontal form-label-left" >
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên lớp
                                                            đồ án
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                value="{{ $lopdoan_data->tenlop }}" disabled="disabled"
                                                                id="input-className" placeholder="Disabled Input" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số
                                                            lượng nhóm</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control"
                                                                        style="width: 30%" min="1"
                                                                        id="input-groupNumber" value="1">
                                                                    <span class="input-group-btn"
                                                                        style="width: 20%; float: left">
                                                                        <button type="button" id="btn-createGroup"
                                                                            class="btn btn-primary">OK</button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form class="form-horizontal form-label-left" id="groupFormParent" method="post" action={{ route('admin.themnhomlop', ['lopdoan_id' => $lopdoan_data->id]) }}>
                                                    {{ csrf_field() }}
                                                    <div id="groupInfoFormWrapper">
                                                        <div class="groupInfoForm" id="groupInfoForm-1">
                                                            <hr>
                                                            <div class="form-group" class="tennhomlopBox">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Tên
                                                                    nhóm lớp
                                                                </label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12"
                                                                    class="tennhomlopWrapper">
                                                                    <input  
                                                                    type="hidden" id="currentGroupNumber"
                                                                    value="{{ $currentGroupNumber+1 }}" />

                                                                        <input  name="tennhomlop[]"
                                                                        class="form-control tennhomlop" type="text"
                                                                        value="{{ $lopdoan_data->tenlop }}(1)" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Tuần
                                                                </label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" class="form-control tuan"
                                                                        name="tuan[]" required value="" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Thứ
                                                                </label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <select class="form-control thu" name="thu[]"
                                                                        style="width: 15%; float: left; margin-right: 2%"
                                                                        required>
                                                                        <option value="-1">--Chọn--</option>
                                                                        <option>Hai</option>
                                                                        <option>Ba</option>
                                                                        <option>Tư</option>
                                                                        <option>Năm</option>
                                                                        <option>Sáu</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Tiết<span
                                                                        class="required">*</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12"
                                                                    style="display: flex; align-items: center">
                                                                    <select class="form-control tietbatdau"
                                                                        name="tietbatdau[]"
                                                                        style="width: 15%; float: left; margin-right: 2%"
                                                                        required>
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
                                                                    <span
                                                                        style="align-content: center; float: left; margin-right: 2%"><i
                                                                            class="fa fa-long-arrow-right"
                                                                            style="font-size: 20px; "></i></span>
                                                                    <select class="form-control tietketthuc"
                                                                        name="tietketthuc[]" style="width: 15%; "
                                                                        required>
                                                                        {{-- <option>--Chọn--</option> --}}

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Giảng
                                                                    viên hướng dẫn 1<span class="required">*</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <select class="form-control" name="id_gv[]"
                                                                        required>

                                                                        <option value="" disabled selected>--
                                                                            Chọn giảng viên --
                                                                        </option>
                                                                        @foreach ($giangvien_data as $giangvien)
                                                                            <option value="{{ $giangvien->id }}">
                                                                                {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Giảng
                                                                    viên hướng dẫn 2</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <select class="form-control" name="id_gv2[]"
                                                                        required>
                                                                        <option value="" disabled selected>--
                                                                            Chọn giảng viên --
                                                                        </option>
                                                                        @foreach ($giangvien_data as $giangvien)
                                                                            <option value="{{ $giangvien->id }}">
                                                                                {{ $giangvien->chucdanh . '.' . $giangvien->hodem . ' ' . $giangvien->ten }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="control-label col-md-3 col-sm-3 col-xs-12">Chọn
                                                                    phòng</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <select class="select2_group form-control" required
                                                                        name="phong[]">
                                                                        <option value="" disabled selected>--Chọn
                                                                            phòng--</option>
                                                                        <optgroup label="Khu V">

                                                                            @foreach ($phong_data as $phong)
                                                                                @if ($phong->tenkhu === 'V')
                                                                                    <option
                                                                                        value={{ $phong->tenphong }}>
                                                                                        {{ $phong->tenphong }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </optgroup>
                                                                        <optgroup label="Khu K">

                                                                            @foreach ($phong_data as $phong)
                                                                                @if ($phong->tenkhu === 'K')
                                                                                    <option
                                                                                        value={{ $phong->tenphong }}>
                                                                                        {{ $phong->tenphong }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </optgroup>
                                                                    </select>   
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_hocphan"  value="{{ $lopdoan_data->id_hocphan }}" />
                                                            <input type="hidden" name="namhoc"  value="{{ $lopdoan_data->namhoc }}" />
                                                            <input type="hidden" name="hocky"  value="{{ $lopdoan_data->hocky }}" />
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                            <button type="button" class="btn btn-primary">
                                                                Hủy
                                                            </button>
                                                            <button type="reset" class="btn btn-primary">
                                                                Nhập lại
                                                            </button>
                                                            <button type="submit" class="btn btn-success"
                                                                id="btn-save">
                                                                Lưu lại
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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

        
        <script>
            $(document).ready(function() {
                var groupNumber = 1;
               
                $('#btn-createGroup').click(function(e) {
                    // e.preventDefault();
                    
                    var newgroupNumber = parseInt($('#input-groupNumber').val());

                    var number = newgroupNumber - groupNumber;

                    //them
                    if (number > 0) {
                        for (var i = 1; i <= Math.abs(number); i++) {

                            var newForm = $('#groupInfoForm-1').clone();
                            newForm.attr('id', 'groupInfoForm-' + i);

                            // .children('.tennhomlopBox').children('.tennhomlopWrapper').children('.tennhomlop').val()
                            var className = $('#input-className').val();


                            newForm.find('.tennhomlop').val(className + '(' + (groupNumber + i) + ')');

                            $('#groupInfoFormWrapper').append(newForm);
                        }

                        // var elements = $('.tennhomlop');

                        //xoa
                    } else if (number < 0) {
                        for (var i = 1; i <= Math.abs(number); i++) {
                            $('.groupInfoForm').last().remove();
                        }
                    }

                    groupNumber = newgroupNumber;
                });
                //    for(var i = 2; i <= 10; i++){
                //         var newForm = $('.groupInfoForm').clone();
                //         $('#groupInfoFormWrapper').append(newForm);
                //    }

               

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

                $('#btn-save').click(function() {
                    console.log('ooooo');
                    // var validateFlag = 1;
                    // $('.groupInfoForm').each(function() {
                    //     var tennhomlop = $(this).find('.tennhomlop').val();
                    //     var tuan = $(this).find('.tuan').val();
                    //     var thu = $(this).find('.thu').val();
                    //     var tietbatdau = $(this).find('.tietbatdau').val();
                    //     var tietketthuc = $(this).find('.tietketthuc').val();

                    // if (tennhomlop === '' || tennhomlop === undefined) {                           
                    //     break;
                    // }

                    // if (tuan === '' || tuan === undefined) {                           
                    //     break;
                    // }

                    // if (thu === '' || thu === undefined) {                           
                    //     break;
                    // }

                    //     validateFlag = 0;

                    // });

                    // if (validateFlag === 1) {
                    //     alert('Dữ liệu nhập vào không hợp lệ');
                    // }
                    $.each('.groupInfoForm', function() {

                    });
                });


            });
        </script>

</body>

</html>



{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phòng<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="phong">
                                                                <option>--Chọn phòng--</option>
                                                                @foreach ($phong_data as $phong)                                    
                                                                    <option>{{ $phong->tenphong }} - {{ $phong->loaiphong }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <input type="hidden" name="id_hocphan" value="{{ $hocphan_data->id }}">
                                                    
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Tên học phần
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" value="{{ $hocphan_data->tenhocphan }}"
                                                                disabled="disabled" placeholder="Disabled Input" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã lớp học phần</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" name="malop"
                                                                 />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên lớp học phần<span class="required">*</span></label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" name="tenlop"
                                                                 />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lớp học phần gốc</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="select2_multiple form-control"
                                                                multiple="multiple">
                                                                <option selected>Lớp chính</option>
                                                                <option>Option one</option>
                                                                <option>Option two</option>
                                                                <option>Option three</option>
                                                                <option>Option four</option>
                                                                <option>Option five</option>
                                                                <option>Option six</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Lớp học phần gốc<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="lhp_id">
                                                                <option value="">-- Chọn lớp gốc --</option>
                                                                @foreach ($lophocphan_data as $lophocphan)
                                                                    <option value="{{ $lophocphan->id }}">{{ $lophocphan->tenlop }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chia nhóm</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="number" class="form-control" name="soluong"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Giảng viên hướng dẫn 1<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="id_gv">
                                                                <option>Lớp chính</option>
                                                                <option value="">-- Chọn giảng viên --</option>
                                                                @foreach ($giangvien_data as $giangvien)
                        
                                                                    <option value="{{ $giangvien->id }}">{{ $giangvien->chucdanh.'.'.$giangvien->hodem.' '.$giangvien->ten }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Giảng viên hướng dẫn 2</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="id_gv2">
                                                                <option value="">-- Chọn giảng viên --</option>
                                                                @foreach ($giangvien_data as $giangvien)
                                                                
                                                                    <option value="{{ $giangvien->id }}">{{ $giangvien->chucdanh.'.'.$giangvien->hodem.' '.$giangvien->ten }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tuần<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" name="tuan"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" name="thu"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiết<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" name="tiet"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phòng<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="phong">
                                                                <option>--Chọn tên phòng--</option>
                                                                @foreach ($phong_data as $phong)                                    
                                                                    <option>{{ $phong->tenphong }} - {{ $phong->loaiphong }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn phòng</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="select2_group form-control" name="phong">
                                                                <option value="">--Chọn phòng--</option>
                                                                <optgroup label="Khu V">
                                                                    
                                                                    @foreach ($phong_data as $phong)   
                                                                                                        
                                                                            @if ($phong->tenkhu === 'V')
                                                                                <option value={{ $phong->tenphong }}>{{ $phong->tenphong }}</option>
                                                                            @endif
                                                                        
                                                                    @endforeach
                                                                </optgroup>
                                                                <optgroup label="Khu K"> 
                                                                    
                                                                    @foreach ($phong_data as $phong)   
                                                                                                        
                                                                            @if ($phong->tenkhu === 'K')
                                                                                <option value={{ $phong->tenphong }}>{{ $phong->tenphong }}</option>
                                                                            @endif
                                                                        
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Năm học<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="namhoc">
                                                                <option>--Chọn năm học--</option>
                                                                @foreach ($namhoc_data as $namhoc)
                                                                    <option>{{ $namhoc->nambatdau }}-{{ $namhoc->namketthuc }}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Học kỳ<span class="required">*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="form-control" name="hocky">
                                                                <option>1</option>
                                                                <option>2</option>
                                                            </select>
                                                        </div>
                                                    </div>
            
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Elearning</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="password" class="form-control"
                                                                value="passwordonetwo" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Read-Only
                                                            Input</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                readonly="readonly" placeholder="Read-Only Input" />
                                                        </div>
                                                    </div> --}}
{{-- <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">AutoComplete</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" name="country"
                                                                id="autocomplete-custom-append"
                                                                class="form-control col-md-10" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select
                                                            Custom</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="select2_single form-control" tabindex="-1">
                                                                <option></option>
                                                                <option value="AK">Alaska</option>
                                                                <option value="HI">Hawaii</option>
                                                                <option value="CA">California</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="WA">Washington</option>
                                                                <option value="AZ">Arizona</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="WY">Wyoming</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TX">Texas</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select
                                                            Grouped</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select class="select2_group form-control">
                                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                    <option value="AK">Alaska</option>
                                                                    <option value="HI">Hawaii</option>
                                                                </optgroup>
                                                                <optgroup label="Pacific Time Zone">
                                                                    <option value="CA">California</option>
                                                                    <option value="NV">Nevada</option>
                                                                    <option value="OR">Oregon</option>
                                                                    <option value="WA">Washington</option>
                                                                </optgroup>
                                                                <optgroup label="Mountain Time Zone">
                                                                    <option value="AZ">Arizona</option>
                                                                    <option value="CO">Colorado</option>
                                                                    <option value="ID">Idaho</option>
                                                                    <option value="MT">Montana</option>
                                                                    <option value="NE">Nebraska</option>
                                                                    <option value="NM">New Mexico</option>
                                                                    <option value="ND">North Dakota</option>
                                                                    <option value="UT">Utah</option>
                                                                    <option value="WY">Wyoming</option>
                                                                </optgroup>
                                                                <optgroup label="Central Time Zone">
                                                                    <option value="AL">Alabama</option>
                                                                    <option value="AR">Arkansas</option>
                                                                    <option value="IL">Illinois</option>
                                                                    <option value="IA">Iowa</option>
                                                                    <option value="KS">Kansas</option>
                                                                    <option value="KY">Kentucky</option>
                                                                    <option value="LA">Louisiana</option>
                                                                    <option value="MN">Minnesota</option>
                                                                    <option value="MS">Mississippi</option>
                                                                    <option value="MO">Missouri</option>
                                                                    <option value="OK">Oklahoma</option>
                                                                    <option value="SD">South Dakota</option>
                                                                    <option value="TX">Texas</option>
                                                                    <option value="TN">Tennessee</option>
                                                                    <option value="WI">Wisconsin</option>
                                                                </optgroup>
                                                                <optgroup label="Eastern Time Zone">
                                                                    <option value="CT">Connecticut</option>
                                                                    <option value="DE">Delaware</option>
                                                                    <option value="FL">Florida</option>
                                                                    <option value="GA">Georgia</option>
                                                                    <option value="IN">Indiana</option>
                                                                    <option value="ME">Maine</option>
                                                                    <option value="MD">Maryland</option>
                                                                    <option value="MA">Massachusetts</option>
                                                                    <option value="MI">Michigan</option>
                                                                    <option value="NH">New Hampshire</option>
                                                                    <option value="NJ">New Jersey</option>
                                                                    <option value="NY">New York</option>
                                                                    <option value="NC">North Carolina</option>
                                                                    <option value="OH">Ohio</option>
                                                                    <option value="PA">Pennsylvania</option>
                                                                    <option value="RI">Rhode Island</option>
                                                                    <option value="SC">South Carolina</option>
                                                                    <option value="VT">Vermont</option>
                                                                    <option value="VA">Virginia</option>
                                                                    <option value="WV">West Virginia</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="control-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Input
                                                            Tags</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input id="tags_1" type="text"
                                                                class="tags form-control"
                                                                value="social, adverts, sales" />
                                                            <div id="suggestions-container"
                                                                style="
                                                            position: relative;
                                                            float: left;
                                                            width: 250px;
                                                            margin: 10px;
                                                          ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="col-md-3 col-sm-3 col-xs-12 control-label">Checkboxes
                                                            and radios
                                                            <br />
                                                            <small class="text-navy">Normal Bootstrap elements</small>
                                                        </label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="" /> Option
                                                                    one.
                                                                    select more than one options
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="" /> Option
                                                                    two.
                                                                    select more than one options
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" checked=""
                                                                        value="option1" id="optionsRadios1"
                                                                        name="optionsRadios" />
                                                                    Option one. only select one option
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" value="option2"
                                                                        id="optionsRadios2" name="optionsRadios" />
                                                                    Option two. only select one option
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-md-3 col-sm-3 col-xs-12 control-label">Checkboxes
                                                            and radios
                                                            <br />
                                                            <small class="text-navy">Normal Bootstrap elements</small>
                                                        </label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"
                                                                        checked="checked" />
                                                                    Checked
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat" /> Unchecked
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"
                                                                        disabled="disabled" />
                                                                    Disabled
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"
                                                                        disabled="disabled" checked="checked" />
                                                                    Disabled & checked
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" class="flat" checked
                                                                        name="iCheck" />
                                                                    Checked
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" class="flat"
                                                                        name="iCheck" />
                                                                    Unchecked
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" class="flat"
                                                                        name="iCheck" disabled="disabled" />
                                                                    Disabled
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" class="flat"
                                                                        name="iCheck3" disabled="disabled" checked />
                                                                    Disabled & Checked
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">Switch</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch"
                                                                        checked />
                                                                    Checked
                                                                </label>
                                                            </div>
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" />
                                                                    Unchecked
                                                                </label>
                                                            </div>
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch"
                                                                        disabled="disabled" />
                                                                    Disabled
                                                                </label>
                                                            </div>
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch"
                                                                        disabled="disabled" checked="checked" />
                                                                    Disabled Checked
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div> --}}

{{-- <div class="ln_solid"></div> --}}
