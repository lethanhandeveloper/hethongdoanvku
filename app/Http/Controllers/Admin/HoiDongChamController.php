<?php

namespace App\Http\Controllers\Admin;

use App\DotBaoVe;
use App\GiangVien;
use App\HoiDongCham;
use App\Http\Controllers\Controller;
use App\LopDoAn;
use App\Phong;
use App\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class HoiDongChamController extends Controller
{
    public function showHoiDongCham(Request $request)
    {
        $namhoccookie = json_decode($request->cookie('namhoc_hocky_cookie'));
        $namhoc_id = $namhoccookie->namhoc->id;
        $hocky = $namhoccookie->hocky;

        $hoidongcham_data = HoiDongCham::join('table_doan_dot', 'table_doan_dot.id', 'table_doan_hoidong.dot_id')
            ->join('table_phong', 'table_phong.id', 'table_doan_hoidong.phong_id')
            ->where('namhoc', $namhoc_id)
            ->where('hocky', $hocky)
            ->select('table_doan_hoidong.*', 'table_phong.tenphong')->get();

        $thanhvienArr = [];
        foreach ($hoidongcham_data as $key => $hoidongcham) {
            $hoidongcham->giovaosang = str_replace(':', 'h', $hoidongcham->giovaosang);

            $thanhvien1 = GiangVien::where('id', $hoidongcham->thanhvien1)->first();
            $thanhvien2 = GiangVien::where('id', $hoidongcham->thanhvien2)->first();
            $thanhvien3 = GiangVien::where('id', $hoidongcham->thanhvien3)->first();
            $thanhvien4 = GiangVien::where('id', $hoidongcham->thanhvien4)->first();
            $thanhvien5 = GiangVien::where('id', $hoidongcham->thanhvien5)->first();

            array_push($thanhvienArr,  $thanhvien1);
            array_push($thanhvienArr,  $thanhvien2);
            array_push($thanhvienArr,  $thanhvien3);
            array_push($thanhvienArr,  $thanhvien4);
            array_push($thanhvienArr,  $thanhvien5);

            $hoidongcham->thanhvien = $thanhvienArr;

            $thanhvienArr = [];
        }


        // return $hoidongcham_data;
        return view("admin.hoidongcham_page", compact('hoidongcham_data'));
    }

    public function showHoiDongChamForm(Request $request)
    {
        $giangvien_data = GiangVien::where('is_gv', 1)->orderBy('hodem', 'asc')->get();
        $phong_data = Phong::whereIn('loai', [1])->get();
        $namhoccookie = json_decode($request->cookie('namhoc_hocky_cookie'));
        $namhoc_id = $namhoccookie->namhoc->id;
        $hocky = $namhoccookie->hocky;

        $dotbaove_data = DB::table('table_doan_dot')->where('namhoc', $namhoc_id)->where('hocky', $hocky)->get();

        return view('admin.hoidongcham_form', compact('giangvien_data', 'phong_data', 'dotbaove_data'));
    }

    public function addHoiDong(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'ten' => 'required',
            'phong_id' => 'required|min:1',
            'dot_id' => 'required|min:1',
            'ngaybatdau' => 'required',
            'ngayketthuc' => 'required',
            'giovaosang' => 'required',
            'tietbatdau' => 'required',
            'tietketthuc' => 'required',
            'thanhvien1' => 'required|min:1',
            'thanhvien2' => 'required|min:1',
            'thanhvien3' => 'required|min:1',
            'thanhvien4' => 'required|min:1',
            'thanhvien5' => 'required|min:1',
        ]);

        $data = [
            'ten' => $request->ten,
            'phong_id' => $request->phong_id,
            'dot_id' => $request->dot_id,
            'ngaybatdau' => $request->ngaybatdau,
            'ngayketthuc' => $request->ngayketthuc,
            'giovaosang' => $request->giovaosang,
            'tiet' => $request->tietbatdau . '-' . $request->tietketthuc,
            'thanhvien1' => ($request->thanhvien1 ? $request->thanhvien1 : null),
            'thanhvien2' => ($request->thanhvien2 ? $request->thanhvien2 : null),
            'thanhvien3' => ($request->thanhvien3 ? $request->thanhvien3 : null),
            'thanhvien4' => ($request->thanhvien4 ? $request->thanhvien4 : null),
            'thanhvien5' => ($request->thanhvien5 ? $request->thanhvien5 : null),
        ];



        if (!$validator->fails()) {
            DB::table('table_doan_hoidong')->insert($data);
        }

        return redirect()->route('admin.hoidongcham_page');
    }

    public function showLichBaoVeForm(Request $request, $lopdoan_id)
    {
        $namhoccookie = json_decode($request->cookie('namhoc_hocky_cookie'));
        $namhoc_id = $namhoccookie->namhoc->id;
        $hocky = $namhoccookie->hocky;

        $dotbaove_data = DotBaoVe::where('namhoc', $namhoc_id)->where('hocky', $hocky)->get();

        $hoidong_data = HoiDongCham::join('table_doan_dot', 'table_doan_dot.id', 'table_doan_hoidong.dot_id')
            ->where('namhoc', $namhoc_id)->where('hocky', $hocky)
            ->select('table_doan_hoidong.*')
            ->get();

        $sinhvien_data = DB::table('table_svlophocphan')
            ->join('table_lophocphan', 'table_lophocphan.id', 'table_svlophocphan.idlop')
            ->join('table_doan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
            ->where('table_lophocphan.namhoc',  $namhoc_id)->where('table_lophocphan.hocky', $hocky)
            ->where('table_lophocphan.lhp_id',  '<>', null)
            ->where('table_doan.nhom', null)
            ->where('table_doan.chophepbaove', 1)
            ->where('table_doan.hoidong_id', null)
            ->orWhere('table_doan.hoidong_id', '')
            ->get();

        foreach ($sinhvien_data as $key => $sinhvien) {
            $sv = SinhVien::where('masv', $sinhvien->masv)->first();
            
            $sinhvien_data[$key] = $sv;
            $sinhvien_data[$key]-> doan_chitiet_id = $sinhvien->doan_chitiet_id;
        }

        $lopdoan_data = LopDoAn::where('id', $lopdoan_id)->first();

        return view('admin.lichbaove_form', compact('hoidong_data', 'dotbaove_data', 'lopdoan_data', 'sinhvien_data'));
    }

    public function getHoiDongChamByDotId($dot_id)
    {
        $hoidongcham_data = HoiDongCham::where('dot_id', $dot_id)->get();

        return $hoidongcham_data;
    }

    public function updateHoiDongChamforDoAn(Request $request){
        // return $request-> all();
        $validator = Validator::make($request->all(), [
            'hoidong_id'=> 'required',
            'to.*'=> 'required',
        ]);

        if(!$validator->fails()){
            foreach ($request-> to as $key => $doan_chitiet_id) {
                if(!empty($doan_chitiet_id)){
                    DB::table('table_doan')-> where('doan_chitiet_id', $doan_chitiet_id)-> update(['hoidong_id'=> $request-> hoidong_id]);
                }
            }
        }

        return redirect()-> back();
    }

    public function getDanhSachSinhVienByHoiDongId($hoidong_id){
        $sinhvien_data = DB::table('table_svlophocphan')
                        -> join('table_doan', 'table_doan.sv_lophocphan_id', 'table_svlophocphan.id')
                        -> join('table_sinhvien', 'table_sinhvien.masv', 'table_svlophocphan.masv')
                        -> where('table_doan.hoidong_id', $hoidong_id)-> select('table_sinhvien.*', 'table_doan.doan_chitiet_id')-> get();

        return $sinhvien_data;
    }

    public function removeSinhVienFromHoiDong($doan_chitiet_id){
        DB::table('table_doan')-> where('doan_chitiet_id', $doan_chitiet_id)-> update([
            'hoidong_id'=> null
        ]);

        return redirect()-> back();
    }
}
