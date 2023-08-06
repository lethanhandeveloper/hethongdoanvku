<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DotBaoVe;
use App\HocPhan;
use App\NamHoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class DotBaoVeController extends Controller
{
    public function showDotBaoVe_page(Request $request){
        $namhoccookie = json_decode($request->cookie('namhoc_hocky_cookie'));
        $namhoc_id = $namhoccookie->namhoc->id;
        $hocky = $namhoccookie->hocky;

        $dotbaove_data = DotBaoVe::join("table_hocphan", "table_doan_dot.id_hocphan", "=", "table_hocphan.id")-> 
        join("table_namhoc_hocky", "table_doan_dot.namhoc", "=", "table_namhoc_hocky.id")->where("table_doan_dot.namhoc", $namhoc_id)-> where("table_doan_dot.hocky", $hocky)
        ->where("table_namhoc_hocky.hocky", $hocky)
        -> get();
       
        return view("admin.dotbaove_page", compact("dotbaove_data"));
    }

    public function showDotBaoVe_form(){
        $namhoc_data = NamHoc::select('*')->where('id', '<>', 0)->groupBy('id')->get();
        $hocphan_data = HocPhan::orderBy("id", "desc")-> get();

        return view("admin.dotbaove_form", compact("namhoc_data", "hocphan_data"));
    }

    public function addDotBaoVe(Request $request){
        
        $validator = Validator::make($request->all(), [
            'ten' => 'required',
            'id_hocphan' => 'required',
            'ngaybatdau' => 'required',
            'ngayketthuc' => 'required',
            'namhoc' => 'required',
            'hocky' => 'required',
        ]);

        if(!$validator->fails()){
            DotBaoVe::insert([
                "ten" => $request-> ten,
                "id_hocphan" => $request-> id_hocphan,
                "ngaybatdau" => Carbon::createFromFormat('d/m/Y H:i:s', $request-> ngaybatdau)->toDateTimeString(),
                "ngayketthuc" => Carbon::createFromFormat('d/m/Y H:i:s', $request-> ngayketthuc)->toDateTimeString(),
                "namhoc" => $request-> namhoc,
                "hocky" => $request-> hocky
            ]);
        }

        return redirect()-> route('admin.dotbaove_page');
    }
}


