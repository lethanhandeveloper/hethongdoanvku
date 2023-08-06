<?php

namespace App\Http\Controllers;

use Account;
use App\GiangVien;
use App\Khoa;
use App\NamHoc;
use App\SinhVien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function login_page()
    {
        if(!Auth::guard('admin')->check() && !Auth::guard('giangvien')->check() && !Auth::guard('sinhvien')->check()){
            return view('admin.login');
        }else{
            return redirect()-> back(); 
        }
    }
    
    public function hashPassword($password){
        $hashedPassword = Hash::make($password);
        return $hashedPassword;
    }
    
    // public function login(Request $request)
    // {
    //     $role = $request->role;
    //     $email = $request->email;
    //     $password = $request->password;

    //     switch ($role) {
    //         case '1':
    //             if(Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])){
    //                 $user = Auth::guard('admin')->user();
    //                 return $user->tenKhoa;
    //             }
    //             // if (Auth::guard('admin')->check()) {
    //             //     $user = Auth::guard('admin')->user();
    //             //     return $user-> tenKhoa;
    //             // } else {
                    
    //             // }
    //             break;
    //         case '2':
    //             if(Auth::guard('giangvien')->attempt(['email' => $email, 'password' => $password])){
    //                 $user = Auth::guard('giangvien')->user();
    //                 return $user->ten;
    //             }
    //             // if (Auth::guard('giangvien')->check()) {
    //             //     $user = Auth::guard('giangvien')->user();
    //             //     return $user-> tenKhoa;
    //             // } else {
                    
    //             // }
    //             break;
    //         case '3':
    //             if(Auth::guard('sinhvien')->attempt(['email' => $email, 'password' => $password])){
    //                 $user = Auth::guard('sinhvien')->user();
    //                 return $user->ten;
    //             }
    //             // if (Auth::guard('sinhvien')->check()) {
    //             //     $user = Auth::guard('sinhvien')->user();
    //             //     return $user-> tenKhoa;
    //             // } else {
                    
    //             // }
    //             break;
    //         default:
    //             # code...
    //             break;
    //     }
        
    // }

    // public function logout(){
    //     Auth::guard('admin')-> logout();
    //     Auth::guard('giangvien')-> logout();
    //     Auth::guard('sinhvien')-> logout();

    //     return redirect('/'); 
    // }

    public function createLoginCode(Request $request){
        $to_email = $request-> email;

        if(!Khoa::where("email", $to_email)-> exists()
        && !GiangVien::where("email", $to_email)-> exists()
        && !SinhVien::where("email", $to_email)-> exists()){
            return json_encode([
                "status"=> 0,
                "message"=> "Email không tồn tại"
            ]);
        }


        $str = Str::random(10);
        $currentTime = Carbon::now();
        $expire_time = $currentTime->addMinutes(10);

        DB::table('table_token')-> insertGetId([
            "email" => $request-> email,
            "token" => $str,
            "expire_time" => $expire_time-> toDateTimeString()
        ]);

        $auth_code = $str;
        $expire_minutes = "10";

        Mail::send('emails.madangnhap', compact("auth_code", "expire_minutes"), function($email) use($to_email){
           $email->subject("Mã đăng nhập hệ thống đồ án VKU");
           $email->to($to_email, '');
        });

        return json_encode(["message"=> "Kiểm tra email để lấy mã đăng nhập"]);
    }

    //admin : dethile1@gmail.com
    //giangvien : lethice7@gmail.com
    //sinhvien : lethigo247@gmail.com
    public function login(Request $request){
        $email = $request-> email;
        $passcode = $request-> passcode;

        $currentTime = Carbon::now();

        if(DB::table('table_token')-> where("email", $email)-> where("token", $passcode)
        ->where('expire_time', '>', $currentTime)
        ->exists()){
            if(Khoa::where("email", $email)-> exists()){
                
                $user_cookie = cookie('user_cookie', json_encode([
                    "type"=> "admin",
                    "value"=> Khoa::where("email", $email)-> get()-> first()
                ]));

                
                $namhoc = NamHoc::orderBy('namhoc_key', 'desc')->first();
      

                $namhoc_hocky_cookie = cookie('namhoc_hocky_cookie', json_encode([
                    'namhoc' => [
                        'id' => $namhoc-> id,
                        'nambatdau' =>  $namhoc-> nambatdau,
                        'namketthuc' =>  $namhoc-> namketthuc
                    ],
                    'hocky' => $namhoc-> hocky
                ]));

                return redirect('admin/lopdoan')->withCookie($user_cookie)-> withCookie($namhoc_hocky_cookie);
            }else if(GiangVien::where("email", $email)-> exists()){
                
                $user_cookie = cookie('user_cookie', json_encode([
                    "type"=> "giangvien",
                    "value"=> GiangVien::where("email", $email)-> get()-> first()
                ]));

                $namhoc = NamHoc::orderBy('namhoc_key', 'desc')->first();
      

                $namhoc_hocky_cookie = cookie('namhoc_hocky_cookie', json_encode([
                    'namhoc' => [
                        'id' => $namhoc-> id,
                        'nambatdau' =>  $namhoc-> nambatdau,
                        'namketthuc' =>  $namhoc-> namketthuc
                    ],
                    'hocky' => $namhoc-> hocky
                ]));

                return redirect('giangvien/lopdoan')->withCookie($user_cookie)-> withCookie($namhoc_hocky_cookie);
            }else if(SinhVien::where("email", $email)-> exists()){
                
                $user_cookie = cookie('user_cookie', json_encode([
                    "type"=> "sinhvien",
                    "value"=> SinhVien::where("email", $email)-> get()-> first()
                ]));
                
                $namhoc = NamHoc::orderBy('namhoc_key', 'desc')->first();
      

                $namhoc_hocky_cookie = cookie('namhoc_hocky_cookie', json_encode([
                    'namhoc' => [
                        'id' => $namhoc-> id,
                        'nambatdau' =>  $namhoc-> nambatdau,
                        'namketthuc' =>  $namhoc-> namketthuc
                    ],
                    'hocky' => $namhoc-> hocky
                ]));

                return redirect('sinhvien/lopdoan')->withCookie($user_cookie)-> withCookie($namhoc_hocky_cookie);
            }else{
                return "Email không tồn tại";
            }

            
        }else{
            return "Mã đăng nhập hết hạn hoặc email không tồn tại. Vui lòng kiểm tra lại";
        }
    }

    public function logout(){
        $user_cookie = cookie('user_cookie', null);
        $namhoc_hocky_cookie = cookie('namhoc_hocky_cookie', null);

        return redirect('/')->withCookie($user_cookie)-> withCookie($namhoc_hocky_cookie);
    }

}
