<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\NamHoc;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class NamHocController extends Controller
{
    public function getNamHoc_HocKy(){
        $namhoc_hocky = NamHoc::select('*')->where('id', '<>', 0)->groupBy('id')->get();
        

        return $namhoc_hocky;
    }

    public function getHocKy_byNamHocId($id){
        
        $hocky_data = NamHoc::where('id', $id)->orderBy('hocky')->get();

        return $hocky_data;
    }

    public function setDefaultCookie(){
        $namhoc = NamHoc::orderBy('namhoc_key', 'desc')->first();
      

        $namhoc_hocky_cookie = cookie('namhoc_hocky_cookie', json_encode([
            'namhoc' => [
                'id' => $namhoc-> id,
                'nambatdau' =>  $namhoc-> nambatdau,
                'namketthuc' =>  $namhoc-> namketthuc
            ],
            'hocky' => $namhoc-> hocky
        ]));
        // $hocky_cookie = cookie('hocky', $request-> hocky);
        
        return redirect('admin/lopdoan')->withCookie($namhoc_hocky_cookie);
    }

    public function getCookie(Request $request){
        // $namhoc_cookie = cookie('namhoc', $request-> namhoc);
    // $hocky_cookie = cookie('hocky', $request-> hocky);
        
        // return back()-> withCookie($namhoc_cookie)-> withCookie($hocky_cookie);
        return $request->cookie('user_cookie');
    }

    public function changeNamHoc_HocKy(Request $request){
        $namhoc = NamHoc::where('id', $request-> namhoc)-> where('hocky', $request->hocky)->first();
        
        $namhoc_hocky_cookie = cookie('namhoc_hocky_cookie', json_encode([
            'namhoc' => [
                'id' => $namhoc-> id,
                'nambatdau' =>  $namhoc-> nambatdau,
                'namketthuc' =>  $namhoc-> namketthuc
            ],
            'hocky' => $namhoc-> hocky
        ]));
        
        return redirect()-> back() -> withCookie($namhoc_hocky_cookie);
    }
}
