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
                                    <h2>Thêm đợt bảo vệ</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="min-height: 700px">
                                    <div class="">
                                        <div class="">
                                            <div class="x_content">
                                                <form action="{{ route('admin.themdotbaove') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Tên đợt bảo vệ</label>
                                                      <input name="ten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đợt bảo vệ">
                                                      
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Học phần</label>
                                                        <select name="id_hocphan" id="" class="form-control">
                                                            @foreach ($hocphan_data as $hocphan)
                                                                <option class="form-control" value="{{ $hocphan->id }}">{{ $hocphan->tenhocphan }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                      </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputPassword1">Ngày bắt đầu</label>
                                                      <input name="ngaybatdau" type="text" class="form-control timeInput" id="exampleInputPassword1" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Ngày kết thúc</label>
                                                        <input name="ngayketthuc" type="text" class="form-control timeInput" id="exampleInputPassword1" >
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Năm học</label>
                                                        <select name="namhoc" id="" class="form-control">
                                                        @foreach ($namhoc_data as $namhoc)
                                                            <option class="form-control" value="{{ $namhoc->id }}">{{ $namhoc->nambatdau.'-'.$namhoc->namketthuc }}</option>
                                                        @endforeach
                                                    </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Học kỳ</label>
                                                        <select name="hocky" id="" class="form-control">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">Hè</option>
                                                        </select>
                                                      </div>
                                                    
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $(".timeInput").datetimepicker({
                    showSecond: true,
                    format: 'd/m/Y',
                    autoHide: true
                });
            });
        </script>

</body>

</html>
