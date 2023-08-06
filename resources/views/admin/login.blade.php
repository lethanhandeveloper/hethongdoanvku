<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page </title>

    @include("top_include")
    @include("bottom_include")
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('login') }}" method="POST">
              {{ csrf_field() }}
              <h1>Đăng nhập</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nhập email" name="email" id="email">
               
              </div>
              <div style="margin-top: 10px">
                <button type="button" class="btn btn-default" id="btn-getCode">Lấy mã đăng nhập</button>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Mã đăng nhập"  name="passcode"/>
              </div>
              {{-- <div>
                <select class="form-control" name="role">
                    <option value="3">Sinh viên</option>
                    <option value="2">Giảng viên</option>
                    <option value="1">Quản trị</option>
                </select>
              </div> --}}
              <div style="margin-top: 10px">
                <button class="btn btn-primary submit">Đăng nhập</button>
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Đăng nhập </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#btn-getCode').click(function (e) { 
              e.preventDefault();
              console.log("ok");
              var email = $("#email").val();
              console.log(email);
              $.ajax({
                type: "GET",
                url: "/getlogincode",
                dataType: "json",
                data: { email : email },
                success: function (response) {
                  alert(response.message);
                  
                }
              });
            });

        });
    </script>
  </body>
</html>
