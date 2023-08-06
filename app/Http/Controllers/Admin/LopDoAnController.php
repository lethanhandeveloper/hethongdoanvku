<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DoAn_CaiDat;
use App\GiangVien;
use App\LopDoAn;
use App\NamHoc;
use App\Phong;
use App\SinhVien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Validator;

class LopDoAnController extends Controller
{

    public function showLopDoAnPage(Request $request)
    {

        $namhoccookie = json_decode($request->cookie('namhoc_hocky_cookie'));
        $newest_namhoc = NamHoc::orderBy('namhoc_key', 'desc')->first();
        $namhoc_id = $namhoccookie->namhoc->id;
        $hocky = $namhoccookie->hocky;

        $lophocphan_data = DB::table('table_lophocphan')->join(
            'table_hocphan',
            'table_lophocphan.id_hocphan',
            '=',
            'table_hocphan.id'
        )->leftJoin('table_doan_caidat', 'table_lophocphan.id', '=', 'table_doan_caidat.doan_id')
            ->where('namhoc', $namhoc_id)->where('hocky', $hocky)->where('lhp_id', null)
            ->orderByDesc('table_lophocphan.id')->select(
                'table_lophocphan.*',
                'table_doan_caidat.thoigiannop',
                'table_doan_caidat.thoigiantaonhom',
                'table_doan_caidat.thoigianxacnhan',
                'table_doan_caidat.yeucau',
                'table_doan_caidat.dinhhuong'
            )->get();

        $reponse = new Response(view("admin/lopdoan_page", compact('lophocphan_data')));
        return $reponse;
    }

    public function showThemNhomLopDoAnForm(Request $request)
    {
        $currentGroupNumber = LopDoAn::where('lhp_id', $request->lopdoan_id)->count();

        $lopdoan_data = LopDoAn::where('id', $request->lopdoan_id)->first();

        $giangvien_data = GiangVien::where('is_gv', 1)->get();
        // $lophocphan_data = LopDoAn::join('table_hocphan', 'table_lophocphan.id_hocphan', '=', 'table_hocphan.id')
        // -> where('table_hocphan.type', 3)-> select('table_lophocphan.*')-> get();
        $phong_data = Phong::whereIn('loai', [1])->get();
        $namhoc_data = NamHoc::get();

        return view("admin/themnhomlop_form", compact('lopdoan_data', 'giangvien_data', 'phong_data', 'namhoc_data', 'currentGroupNumber'));
    }

    public function showNhomLop($id)
    {
        $lopdoan_data = LopDoAn::where('id', $id)->first();
        $nhomlop_data = LopDoAn::where('lhp_id', $id)->get();

        foreach ($nhomlop_data as $key => $nhomlop) {
            // return  GiangVien::where('id', $nhomlop-> id_gv)-> first();
            $giangvien_1 = GiangVien::where('id', $nhomlop->id_gv)->first();

            $nhomlop['tengv_1'] = $giangvien_1->chucdanh . '. ' . $giangvien_1->hodem . ' ' . $giangvien_1->ten;
            if (!empty($nhomlop->id_gv2)) {
                $giangvien_2 = GiangVien::where('id', $nhomlop->id_gv2)->first();
                $nhomlop['tengv_2'] = $giangvien_2->chucdanh . '. ' . $giangvien_2->hodem . ' ' . $giangvien_2->ten;;
            } else {
                $nhomlop['tengv_2'] = "-";
            }
        }


        return view("admin/nhomlopdoan_page", compact('lopdoan_data', 'nhomlop_data'));
    }

    public function addNhomLop($lhp_id, Request $request)
    {
        //tennhomlop tuan thu tietbatdau tietketthuc id_gv id_gv2 phong

        $validator = Validator::make($request->all(), [
            'tennhomlop.*' => 'required',
            'tuan.*' => 'required',
            'thu.*' => 'required',
            'tietbatdau.*' => 'required',
            'tietketthuc.*' => 'required',
            'id_gv.*' => 'required',
            'phong.*' => 'required',
            'namhoc.*' => 'required',
            'hocky.*' => 'required',
        ]);

        if (!$validator->fails()) {
            $tenlop = $request->tennhomlop;
            $id_hocphan = $request->id_hocphan;
            $tuan = $request->tuan;
            $thu = $request->thu;
            $tietbatdau = $request->tietbatdau;
            $tietketthuc = $request->tietketthuc;
            $id_gv = $request->id_gv;
            $id_gv2 = $request->id_gv2 ?? '';
            $phong = $request->phong;
            $namhoc = $request->namhoc;
            $hocky = $request->hocky;


            $lopdoan_arr = [];

            for ($i = 0; $i < count($tenlop); $i++) {
                $lopdoan = [
                    'tenlop' =>  $tenlop[$i],
                    'id_hocphan' =>  $id_hocphan,
                    'lhp_id' =>  $lhp_id,
                    'soluong' =>  '',
                    'id_gv' =>  $id_gv[$i],
                    'id_gv2' =>  $id_gv2[$i],
                    'tuan' =>  $tuan[$i],
                    'thu' =>  $thu[$i],
                    'tiet' =>  $tietbatdau[$i] . '&#8594;' . $tietketthuc[$i],
                    'phong' =>  $phong[$i],
                    'namhoc' =>  $namhoc,
                    'hocky' =>  $hocky,
                    'trangthai' => 1
                ];

                array_push($lopdoan_arr, $lopdoan);
            }

            // $lopdoan_arr = [
            //     "tenlop" => "Đồ án cơ sở 6(1)",
            //     "id_hocphan" => "7656",
            //     "soluong" => "",
            //     "id_gv" => "14",
            //     "id_gv2" => "20",
            //     "tuan" => "aaaaaaaaaaaa",
            //     "thu" => "Hai",
            //     "tiet" => "1&#8594;3",
            //     "phong" => "V.A301",
            //     "namhoc" => 3,
            //     "hocky" => 1,
            //     "trangthai" => 1
            // ];
            // return $lopdoan_arr; 
            LopDoAn::insert($lopdoan_arr);
        }

        return redirect()-> route('admin.lopdoan_page');
    }

    public function showQuanLySinhVien_page($nhomlop_id)
    {
        $nhomlop_data = LopDoAn::where("id", $nhomlop_id)->first();
        $sinhvien_data = SinhVien::join("table_svlophocphan", "table_sinhvien.masv", '=', "table_svlophocphan.masv")
            ->where("table_svlophocphan.idlop", $nhomlop_id)->select("table_sinhvien.*")->get();

        // return $sinhvien_data;
        return view("admin/quanlysinhvien_page", compact("nhomlop_data", "sinhvien_data", "nhomlop_id"));
    }

    public function settingLopDoAn_page($lopdoan_id)
    {
        $caidat_data = DoAn_CaiDat::where("doan_id", $lopdoan_id)->first();

        $dinhhuongArr = explode('|', $caidat_data->dinhhuong ?? "");

        return view('admin.caidat_lopdoan_form', compact('caidat_data', 'lopdoan_id', "dinhhuongArr"));
    }

    public function settingLopDoAn(Request $request, $lopdoan_id)
    {
        if (!DoAn_CaiDat::where("doan_id", $lopdoan_id)->exists()) {
            $validator = Validator::make($request->all(), [
                'thoigiantaonhom' => 'required',
                'thoigianxacnhan' => 'required',
                'thoigiannop' => 'required',
                'yeucau' => 'required|file',
                'dinhhuong.*' => 'required',
            ]);

            if(!$validator->fails()){
                $file_yeucau = sha1(time()) . '_' . $request->yeucau->getClientOriginalName();
                $request->file('yeucau')->storeAs('', $file_yeucau, 'public');

                $dinhhuong = '';
                foreach ($request->dinhhuong as $key => $value) {
                    $dinhhuong .= $value . "|";
                }

                $lopdoan_data = [
                    'doan_id' => $lopdoan_id,
                    'thoigiantaonhom' => Carbon::createFromFormat('d/m/Y H:i:s', $request->thoigiantaonhom)->toDateTimeString(),
                    'thoigianxacnhan' => Carbon::createFromFormat('d/m/Y H:i:s', $request->thoigianxacnhan)->toDateTimeString(),
                    'thoigiannop' => Carbon::createFromFormat('d/m/Y H:i:s', $request->thoigiannop)->toDateTimeString(),
                    'yeucau' => $file_yeucau,
                    'dinhhuong' => substr($dinhhuong, 0, -1),
                ];


                DoAn_CaiDat::insert($lopdoan_data);
            }else{
               

                return view('invalid_error');
            }
        } else {


            DoAn_CaiDat::where("doan_id", $lopdoan_id)-> update();
            return redirect()-> back();
        }
        // var_dump($lopdoan_data);
        return redirect()-> back();
        // $request->file('yeucau')->storeAs('', sha1(time()).'_'.$file_yeucau->getClientOriginalName() , 'public');
    }

    public function addSinhVien(Request $request)
    {
        $masvArr = preg_split("/\r\n|\n|\r/", $request->id_sinhvien);
        $nhomlop_id = $request->nhomlop_id;
        $nhomlop = LopDoAn::where("id", $nhomlop_id)->first();
        $nhomlopArr = LopDoAn::select("id")->where("lhp_id", $nhomlop->lhp_id)->where("id", "<>", $nhomlop_id)->get();
        $nhomlopIdArr = [];
        foreach ($nhomlopArr as $key => $nhomlop) {
            array_push($nhomlopIdArr, $nhomlop->id);
        }


        foreach ($masvArr as $key => $masv) {
            if (
                DB::table("table_svlophocphan")->where("idlop", $nhomlop->lhp_id)->where("masv", $masv)
                && DB::table("table_svlophocphan")->where("idlop", $nhomlopIdArr)->count() < 1
            ) {
                $data = [
                    "idlop" => $nhomlop_id,
                    "masv" => $masv
                ];

                $id = DB::table('table_svlophocphan')->insertGetId($data);
                DB::table("table_doan")-> insert(["sv_lophocphan_id"=> $id, "chophepbaove"=> 0]);
            } else {
                break;
            }
        }

        return redirect()-> back();
    }

    
    
}
