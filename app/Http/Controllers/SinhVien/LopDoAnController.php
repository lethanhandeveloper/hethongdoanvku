<?php

namespace App\Http\Controllers\SinhVien;

use App\DoAn_CaiDat;
use App\GiangVien;
use App\HoiDongCham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LopDoAn;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Validator;

class LopDoAnController extends Controller
{
    public function showLopDoAn(){
       

        $svlophocphan_data = DB::table("table_svlophocphan")
                        -> join("table_lophocphan", "table_lophocphan.id", "table_svlophocphan.idlop")
                        -> join("table_doan_caidat", "table_doan_caidat.doan_id", "table_lophocphan.lhp_id")
                        -> join("table_doan", "table_doan.sv_lophocphan_id", "table_svlophocphan.id")
                        
                        -> where("table_lophocphan.lhp_id", "<>", null)
                        -> where("table_svlophocphan.masv", json_decode(Cookie::get('user_cookie'))->value->masv)
                        -> select("table_doan.*", "table_lophocphan.lhp_id", "table_doan_caidat.*", "table_svlophocphan.id",
                            "table_lophocphan.id_gv", "table_lophocphan.id_gv2", "table_svlophocphan.id as sv_lophocphan_id", "table_lophocphan.tenlop",
                        "table_lophocphan.thu", "table_lophocphan.tiet", "table_lophocphan.phong")
                        -> get();

        $data = $svlophocphan_data;
        
        foreach ($data as $key => $value) {
            $gv1 = GiangVien::where("id", $value->id_gv)-> first();
            $gv2 = GiangVien::where("id", $value->id_gv2)-> first();
            

            $value-> gv1 =  $gv1;
            $value-> gv2 =  $gv2;

            if(!empty($value->nhom)){
                $truongnhom_detai = DB::table('table_doan')-> where("doan_chitiet_id", $value->nhom)->first();

                $value->tendetai = $truongnhom_detai->tendetai;
                $value->ketquadukien = $truongnhom_detai->ketquadukien;
                $value->filedecuong = $truongnhom_detai->filedecuong;
                $value->xacnhandecuong = $truongnhom_detai->xacnhandecuong;
                $value->filebaocao = $truongnhom_detai->filebaocao;
                $value->ghichu = $truongnhom_detai->ghichu;
                $value->urlmanguon = $truongnhom_detai->urlmanguon;
                $value->chophepbaove = $truongnhom_detai->chophepbaove;
                
            }

            $hoidongcuatoi = HoiDongCham::where('id', $value->hoidong_id)-> first();
            $value->hoidongcuatoi = $hoidongcuatoi;

            if(!empty($hoidongcuatoi)){
                $danhsachhoidong = DB::table('table_svlophocphan')
                                -> join('table_doan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
                                -> join('table_sinhvien', 'table_sinhvien.masv', 'table_svlophocphan.masv')
                                -> join('table_lopsh', 'table_sinhvien.lopsh_id', 'table_lopsh.id')
                                -> where('table_doan.hoidong_id', $hoidongcuatoi->id)
                                -> where('table_doan.hoidong_id', $hoidongcuatoi->id)
                                -> select('table_sinhvien.*', 'table_doan.tendetai', 'table_lopsh.tenlop as tenlopsinhhoat')-> get();
                
                $value->danhsachhoidong = $danhsachhoidong;
                
            }
        }
        
        // return $svlophocphan_data;
        
        
        // "table_svlophocphan => table_lophocphan => table_giangvien => table_doan_caidat => table_doan
        
        
     
        return view("sinhvien.lopdoan_page", compact("data"));
    }

    public function showNopDeCuongForm($doan_chitiet_id){
        $doan_data = DB::table('table_doan')-> where("doan_chitiet_id", $doan_chitiet_id)-> first();
        $idlop = DB::table('table_svlophocphan')-> where('id', $doan_data-> sv_lophocphan_id)-> first()-> idlop;
        
        $nhomtruong_data = DB::table('table_doan')
                    -> join('table_svlophocphan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
                    -> join('table_sinhvien', 'table_sinhvien.masv', 'table_svlophocphan.masv')
                    -> where('table_svlophocphan.idlop', $idlop)     
                    -> whereNull('table_doan.nhom')
                    -> whereNull('table_doan.nhom')
                    -> where('table_svlophocphan.masv', "<>", json_decode(Cookie::get('user_cookie'))->value->masv)
                    -> get();
        
        
        return view("sinhvien.nopdecuong_form", compact("doan_data", "nhomtruong_data"));
    }

    public function nopdecuong(Request $request){
        
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

            return redirect()->route('sinhvien.lopdoan_page');;
        }
        
       
      
    }

    public function updateNhom(Request $request){
        $validator = Validator::make($request->all(), [
            'nhom' => 'required',
            'doan_chitiet_id' => 'required'
        ]);

        if(!$validator-> fails()){
            $id_nhom = $request-> nhom;
            $doan_chitiet_id = $request-> doan_chitiet_id;

            DB::table('table_doan')-> where("doan_chitiet_id", $doan_chitiet_id)-> update([
                'nhom' => $id_nhom
            ]);
        }

        return redirect()-> route('sinhvien.lopdoan_page');
    }

    public function showupdateKetQuaForm($doan_chitiet_id){
        $doan_data = DB::table('table_doan')-> where("doan_chitiet_id", $doan_chitiet_id)-> first();

        return view("sinhvien.nopketqua_form", compact("doan_data"));
    }

    public function updateKetQua(Request $request){
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

            return redirect()->route('sinhvien.lopdoan_page');
        }


    }
}
