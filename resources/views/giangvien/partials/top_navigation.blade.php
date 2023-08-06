<!-- top navigation -->
@include('bottom_include')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSS CDN -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
<!-- datetimepicker jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqc4lc1TKeAczuOV0D21HT1CeA2MuQc1yIjwhaOpMHvV_pIGtK6fk_x5WknGLaz6-LzkE&usqp=CAU"
                            alt=""><b>
                            {{-- @auth('admin')
                                    {{ Auth::guard('admin')->user()->tenKhoa }}
                                @endauth
                                @auth('giangvien')
                                    {{ Auth::guard('giangvien')->user()->chucdanh.'. '.Auth::guard('giangvien')->user()->hodem.' '.Auth::guard('giangvien')->user()->ten }}
                                @endauth
                                @auth('sinhvien')
                                    {{ Auth::guard('sinhvien')->user()->masv.' - '.Auth::guard('sinhvien')->user()->hodem.' '.Auth::guard('sinhvien')->user()->ten }}
                                @endauth --}}
                            @if (json_decode(Cookie::get('user_cookie'))->type == 'admin')
                                {{ json_decode(Cookie::get('user_cookie'))->value->tenKhoa }}
                            @endif
                            @if (json_decode(Cookie::get('user_cookie'))->type == 'giangvien')
                                {{ json_decode(Cookie::get('user_cookie'))->value->chucdanh.'. '.
                                json_decode(Cookie::get('user_cookie'))->value->hodem.' '.
                                json_decode(Cookie::get('user_cookie'))->value->ten }}
                            @endif
                            @if (json_decode(Cookie::get('user_cookie'))->type == 'sinhvien')
                                {{ json_decode(Cookie::get('user_cookie'))->value->masv.' - '.
                                json_decode(Cookie::get('user_cookie'))->value->hodem.' '.
                                json_decode(Cookie::get('user_cookie'))->value->ten }}
                            @endif
                            
                        </b>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        {{-- <li><a href="javascript:;"> Profile</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li> --}}
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        {{-- <b>Học kỳ 1 - 2023-2024</b> <span class=" fa fa-angle-down"></span> --}}
                        <b id="namhoc_hockyDropdownLabel">
                            Học kỳ
                            {{ json_decode(Cookie::get('namhoc_hocky_cookie'))->hocky != 3
                                ? json_decode(Cookie::get('namhoc_hocky_cookie'))->hocky
                                : ' hè' }}
                            -
                            {{ json_decode(Cookie::get('namhoc_hocky_cookie'))->namhoc->nambatdau .
                                '-' .
                                json_decode(Cookie::get('namhoc_hocky_cookie'))->namhoc->namketthuc }}


                        </b> <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu pull-right" onclick="event.stopPropagation()"
                        style="min-width: 420px;">
                        <li>
                            <div class="row" style="padding-top:10px;">
                                <div class="col-xs-1"></div>
                                <form action="{{ route('admin.changeNamHoc') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="namhoc" class="control-label">Năm học:</label>
                                            <select class="namhoc form-control col-md-5" id="namhoc" name="namhoc">
                                                {{-- <option value="">--</option> --}}
                                                {{-- <option value="1">
                                                2017 - 2018
                                            </option> --}}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="hocky" class="control-label">Học kỳ:</label>
                                            <select name="hocky" id="hocky" class="form-control">
                                                {{-- <option selected="" value="1">Học kỳ 1</option>
                                            <option value="2">Học kỳ 2</option>
                                            <option value="3">Học kỳ hè</option> --}}
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xs-3 nopadding-left">
                                        <label class="control-label"></label>
                                        <div class="form-control-static">
                                            <button id="btn-changeHocKy" class="btn btn-primary"
                                                type="submit">OK</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation -->

<script>
    $(document).ready(function() {
        // $('#namhoc_hockyDropdownLabel').text('alalalaalalall')

        $.ajax({
            type: "get",
            url: "/api/getNamHoc",
            dataType: "json",
            success: function(namhocData) {
                namhocData.forEach(namhoc => {
                    // console.log(namhoc);
                    var namhocOption = '<option value="' + namhoc.id + '">' + namhoc
                        .nambatdau + ' - ' + namhoc.namketthuc + '</option>';
                    $("#namhoc").append(namhocOption);


                });

                $('#hocky').empty();

                $.ajax({
                    type: "get",
                    url: "/api/getHocKy/" + $("#namhoc").val(),
                    dataType: "json",
                    success: function(hockyData) {

                        if (hockyData.length > 0) {
                            hockyData.forEach(element => {
                                // console.log("do daiiii"+hockyData.length);
                                if (element.hocky == 3) {
                                    var hockyOption =
                                        '<option value="3">Học kỳ hè</option>';
                                } else {
                                    var hockyOption =
                                        '<option value="' + element
                                        .hocky + '">Học kỳ ' +
                                        element.hocky +
                                        '</option>';
                                }

                                $('#hocky').append(hockyOption);
                            });

                        }

                    }
                });
            }
        });



        $('#namhoc').change(function(e) {

            e.preventDefault();
            $('#hocky').empty();

            if ($(this).val() > 0) {

                var hockyArr = [];
                $.ajax({
                    type: "get",
                    url: "/api/getHocKy/" + $(this).val(),
                    dataType: "json",
                    success: function(hockyData) {
                        if (hockyData.length > 0) {
                            hockyData.forEach(element => {
                                console.log(element);
                                if (element.hocky == 3) {
                                    var hockyOption =
                                        '<option value="3">Học kỳ hè</option>';
                                } else {
                                    var hockyOption = '<option value="' + element
                                        .hocky + '">Học kỳ ' + element.hocky +
                                        '</option>';
                                }

                                $('#hocky').append(hockyOption);
                            });

                        }

                    }
                });
            }
        });


    });
</script>
