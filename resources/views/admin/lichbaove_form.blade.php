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
                                    <h2>Cài đặt lịch bảo vệ lớp {{ $lopdoan_data->tenlop }}</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="min-height: 700px">
                                    <div class="">
                                        <div class="">
                                            <div class="x_content">
                                               
                                                
                                                <div class="form-group">
                                                    <label for="email">Chọn đợt bảo vệ</label>
                                                    
                                                    <select name="" class="form-control" id="dotbaove-select">
                                                        <option value="-1">-- Chọn --</option>
                                                        @foreach ($dotbaove_data as $dotbaove)
                                                            <option value="{{ $dotbaove->id }}">{{ $dotbaove->ten }}</option>
                                                        @endforeach
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="email">Chọn hội đồng</label>
                                                    
                                                    <select name="" class="form-control" id="chonhoidong-select">
                                                        <option value="">-- Chọn --</option>
                                                        {{-- @foreach ($hoidong_data as $hoidong)
                                                            <option value="">{{ $hoidong->ten }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                  </div>
                                                
                                                  <label>Thêm sinh viên vào hội đồng</label>  
                                                  
                                                <div class="row">
                                                    <!-- Left side select -->
                                                    
                                                    <div class="col-xs-5 col-md-5 col-sm-5">
                                                       
                                                        <select name="from[]" id="mySideToSideSelect" class="form-control" size="8" multiple="multiple">
                                                            @foreach ($sinhvien_data as $sinhvien)
                                                                <option value="{{ $sinhvien->doan_chitiet_id }}">(Trưởng nhóm) {{ $sinhvien->masv }} - {{ $sinhvien->hodem }} {{ $sinhvien->ten }}</option>
                                                            @endforeach
                                        
                                                        </select>
                                                    </div>
                                                    
                                                    <!-- Action buttons -->
                                                    <div class="col-xs-2 col-md-2 col-sm-2">
                                                        
                                                        <button type="button" id="mySideToSideSelect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="mySideToSideSelect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="mySideToSideSelect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="mySideToSideSelect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    
                                                    <!-- Right side select -->
                                                    
                                                    <div class="col-xs-5 col-md-5 col-sm-5">
                                                        <form action="{{ route('admin.updatehdcdoan') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="hoidong_id" id="hoidong_id" required>
                                                            <select name="to[]" id="mySideToSideSelect_to" class="form-control" size="8" multiple="multiple"></select>
                                                            <button class="btn btn-primary" style="margin-top: 1em" type="submit">Lưu lại</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <!-- Default panel contents -->
                                                    <div class="panel-heading">Danh sách sinh viên trong hội đồng</div>
                                                  
                                                    <!-- Table -->
                                                    <table class="table table-striped table-bordered bulk_action jambo_table table-responsive">
                                                        <thead>
                                                            <th>STT</th>
                                                            <th>Tên nhóm sv</th>
                                                            <th>Thao tác</th>
                                                        </thead>
                                                        <tbody id="table-container">
                                                            
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
                </div>
                <!-- /page content -->
                
                <!-- footer content -->
                @include('admin.partials.footer')
                <!-- /footer content -->
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mySideToSideSelect').multiselect();
                // var svLeft = [];
                // $('#mySideToSideSelect').click(function (e) { 
                //     e.preventDefault();
                //     svLeft.push($(this).val()[0]);
                //     console.log(svLeft);
                // });

                $('#dotbaove-select').change(function (e) { 
                    e.preventDefault();
                    $('#chonhoidong-select').empty();
                    var dotbaove_id = $(this).val();
                    
                    if(dotbaove_id > 0){
                        $.ajax({
                            type: "GET",
                            url: "/admin/hoidongcham/"+dotbaove_id+"/bydot",
                            dataType: "json",
                            success: function (response) {
                                var hoidongFirstItem = "<option value=''>-- Chọn --</option>";
                                $('#chonhoidong-select').append(hoidongFirstItem);
                            response.forEach(element => {
                                    
                                    var hoidongItem = "<option value='"+element.id+"'>"+element.ten+"</option>";
                                    
                                    
                                    $('#chonhoidong-select').append(hoidongItem);
                            });
                            }
                        });
                    }
                });

                $("#chonhoidong-select").change(function (e) { 
                    e.preventDefault();
                    var hoidong_id = $("#chonhoidong-select").val();
                    $("#hoidong_id").val(hoidong_id);

                    $.ajax({
                        type: "GET",
                        url: "/admin/hoidongcham/"+hoidong_id+"/laydanhsachsinhvien",
                        dataType: "json",
                        success: function (response) {
                            var count = 0;
                            if(response !== null){
                                response.forEach(element => {
                                    var sv_item = "<tr>"
                                        +`<td>${++count}</td>`
                                        +`<td>Trưởng nhóm - ${element.masv} - ${element.hodem} ${element.ten} </td>`
                                        +`<td><a class="btn btn-danger" href="/admin/hoidongcham/${element.doan_chitiet_id}/xoasv">Xóa khỏi hội đồng</a></td>`
                                        +"</tr>";

                                    $('#table-container').append(sv_item);
                                });
                            }
                        }
                    });
                });


                $('#mySideToSideSelect_to').on('change', function () {
                    console.log('ok');
                });
            });
        </script>
        <style>
           .alert {
  padding: 20px;
  background-color: #79bde1;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
        </style>
        <script src="https://cdn.rawgit.com/crlcu/multiselect/master/dist/js/multiselect.min.js"></script>
</body>

</html>
