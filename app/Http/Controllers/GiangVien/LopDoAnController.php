<?php

namespace App\Http\Controllers\GiangVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LopDoAn;
use App\SinhVien;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Validator;

class LopDoAnController extends Controller
{
    public function showLopDoAnPage(){
        $namhoc = json_decode(Cookie::get('namhoc_hocky_cookie'))->namhoc->id;
        $hocky = json_decode(Cookie::get('namhoc_hocky_cookie'))->hocky;
        $giangvien_id = json_decode(Cookie::get('user_cookie'))-> value-> id;
        $nhomlop_data = LopDoAn::
                // join("table_svlophocphan", "table_lophocphan.id", "table_svlophocphan.idlop")
                // -> join("table_doan", "table_doan.sv_lophocphan_id", "table_svlophocphan.id")
                

                whereNotNull('lhp_id')->
                where("table_lophocphan.namhoc", $namhoc)-> where("table_lophocphan.hocky", $hocky)->
                where('id_gv', $giangvien_id)
                ->orWhere('id_gv2', $giangvien_id)-> get();
        foreach ($nhomlop_data as $key => $nhomlop) {
            $lopchinh = LopDoAn::where('id', $nhomlop-> lhp_id)-> first();
            $caidat_data = DB::table('table_doan_caidat')-> where('doan_id', $lopchinh->id)->first();
            $nhomlop-> thoigianxacnhan = $caidat_data-> thoigianxacnhan ?? null;
            $nhomlop-> thoigiannop = $caidat_data-> thoigiannop ?? null;

            $nhomlop-> soluongsv = DB::table('table_svlophocphan')-> where('idlop', $nhomlop-> id)-> count();
            $nhomlop-> soluongnhom = DB::table('table_svlophocphan')
                                    -> join('table_doan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
                                    -> where('idlop', $nhomlop-> id)
                                    -> whereNull('nhom')
                                    -> count();
        }    
        
        // return $nhomlop_data;
        return view('giangvien.lopdoan_page', compact("nhomlop_data"));
    }

    public function showChiTietLopPage($nhomlop_id){
        $chitietlop_data = DB::table('table_svlophocphan')->
        join('table_doan', 'table_doan.sv_lophocphan_id', "table_svlophocphan.id")->  
        whereNull("table_doan.nhom")-> 
        where("idlop", $nhomlop_id)->
        get();

        foreach ($chitietlop_data as $key => $value) {
            $truongnhom = DB::table('table_doan')
            -> join('table_svlophocphan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
            -> join('table_sinhvien', 'table_sinhvien.masv', 'table_svlophocphan.masv')
            -> where('table_doan.sv_lophocphan_id', $value->id)-> select('table_sinhvien.*')->first();

            $value->truongnhom = $truongnhom;
            
            $thanhvien = DB::table('table_doan')
                        -> join('table_svlophocphan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
                        -> join('table_sinhvien', 'table_sinhvien.masv', 'table_svlophocphan.masv')
                        -> where('table_doan.nhom', $value->doan_chitiet_id)-> select('table_sinhvien.*')-> first();

                        $value-> thanhvien = $thanhvien;
           
        }

        // return $chitietlop_data;
        return view("giangvien.xemchitietnhom_page", compact("chitietlop_data"));
       
    }

    public function showQuanLyLopPage($doan_chitiet_id){
        $doan_data = DB::table('table_doan')-> where("doan_chitiet_id", $doan_chitiet_id)-> first();
        
        
        return view("giangvien.quanlynhom_form", compact("doan_data"));
    }

    public function duyetDeCuong($id_doan){
        $xacnhandecuong = DB::table('table_doan')-> where('doan_chitiet_id', ($id_doan))-> first()-> xacnhandecuong;
        if($xacnhandecuong == 1){
            DB::table('table_doan')-> where('doan_chitiet_id', ($id_doan))-> update(["xacnhandecuong"=> 0]);
        }else{
            DB::table('table_doan')-> where('doan_chitiet_id', ($id_doan))-> update(["xacnhandecuong"=> 1]);
        }

        return redirect()-> back();
    }

    public function chophepBVDeCuong($id_doan){
        $chophepbaove = DB::table('table_doan')-> where('doan_chitiet_id', ($id_doan))-> first()-> chophepbaove;
        if($chophepbaove == 1){
            DB::table('table_doan')-> where('doan_chitiet_id', ($id_doan))-> update(["chophepbaove"=> 0]);
           
        }else{
            DB::table('table_doan')-> where('doan_chitiet_id', ($id_doan))-> update(["chophepbaove"=> 1]);
            
        }

        return redirect()-> back();
    }

    public function showNopDeCuongForm($doan_chitiet_id){
        $doan_data = DB::table('table_doan')-> where('doan_chitiet_id', $doan_chitiet_id)-> first();

        return view('sinhvien.nopdecuong_form', compact('doan_data'));
    }

    public function updateDeCuongForSinhVien(Request $request){
        $validator = Validator::make($request->all(), [
            'doan_chitiet_id' => 'required',
            'tendetai' => 'required',
            'ketquadukien' => 'required',
            'filedecuong' => 'required',
        ]);

        if(!$validator->fails()){
            $ten_file_decuong = sha1(time()) . '_' . $request->filedecuong->getClientOriginalName();
            
            $request->file('filedecuong')->storeAs('', $ten_file_decuong, 'public');

            DB::table('table_doan')-> where("doan_chitiet_id", $request-> doan_chitiet_id)
            -> update(
                [
                    'tendetai' => $request-> tendetai,
                    'ketquadukien' => $request-> ketquadukien,
                    'filedecuong' => $ten_file_decuong,
                ]
            );

            return redirect()-> back();
        }
    }

    public function showNopBaoCaoForm($doan_chitiet_id){
        $doan_data = DB::table('table_doan')-> where('doan_chitiet_id', $doan_chitiet_id)-> first();

        return view('giangvien.nopketqua_form', compact('doan_data'));
    }

    public function updateBaoCaoForSinhVien(Request $request){
        $validator = Validator::make($request->all(), [
            'urlmanguon' => 'required',
            'filebaocao' => 'required',
            'doan_chitiet_id' => 'required'
        ]);

        if(!$validator->fails()){
            $urlmanguon = $request-> urlmanguon;
            
            $ten_file_baocao = sha1(time()) . '_' . $request->filebaocao->getClientOriginalName();
            
            $request->file('filebaocao')->storeAs('', $ten_file_baocao, 'public');

            DB::table('table_doan')-> where("doan_chitiet_id", $request-> doan_chitiet_id)
            -> update(
                [
                    'urlmanguon' => $urlmanguon,
                    'filebaocao' => $ten_file_baocao,
                    'chophepbaove' => 1
                ]
            );

            
        }
    
        return redirect()-> back();
    }
}

// join('table_doan', 'table_svlophocphan.id', "table_doan.sv_lophocphan_id")-> 
