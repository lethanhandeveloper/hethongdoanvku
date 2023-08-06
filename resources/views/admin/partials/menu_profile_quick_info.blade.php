<!-- menu profile quick info -->

<div class="profile clearfix">

    <div class="profile_pic">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqc4lc1TKeAczuOV0D21HT1CeA2MuQc1yIjwhaOpMHvV_pIGtK6fk_x5WknGLaz6-LzkE&usqp=CAU"
            alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Xin chào,</span>
        <h2>
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
        </h2>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /menu profile quick info -->