<?php

namespace App\Http\Controllers;

use App\LopHocPhan;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use PHPExcel_IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        return view("admin/index");
    }


    public function tablePage(){
        return view("gentelella-master/production/tables");
    }

   
    public function home()
    {
        $data = DB::select('call produc_diemlopsh(16, 4, 1)');

        $columns = array_keys((array) $data[0]);

        $rows = array_map(function ($value) {
            return (array) $value;
        }, $data);

        // foreach($values as $value){
        //     foreach($value as $chvalue){
        //         echo $chvalue;
        //     }

        //     echo "<br>";
        // }

        // foreach($data as $vl){
        //     echo $vl->name."\n";
        // }

        return view('export', compact("columns", "rows"));
    }

    public function exportExcel()
    {
        // $excel = new PHPExcel();
        // $excel->setActiveSheetIndex(0)
        //     ->setCellValue('A1', 'Hello, world!');
        // $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        // $writer->save('example.xlsx');
        // phpinfo();
        // \Excel::create('Filename', function ($excel) {

        //     // Set the title
        //     $excel->setTitle('Our new awesome title');

        //     // Chain the setters
        //     $excel->setCreator('Maatwebsite')
        //         ->setCompany('Maatwebsite');

        //     // Call them separately
        //     $excel->setDescription('A demonstration to change the file properties');
        // });

        $excel = App::make('excel');
        Excel::create('Filename', function($excel) {

        })->export('xls');
        
    }

    public function importExport()
    {
        return view('importExport');
    }
    
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
        return Excel::create('itsolutionstuff_example', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if (Input::hasFile('import_file')) {
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['title' => $value->title, 'description' => $value->description];
                }
                if (!empty($insert)) {
                    DB::table('items')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }

    public function createToken(){
        $str = Str::random(10);
        $currentTime = Carbon::now();
        $expire_time = $currentTime->addMinutes(10);

        $id = DB::table('table_token')-> insertGetId([
            "email" => 'slslsls@gmail.com',
            "token" => $str,
            "expire_time" => $expire_time-> toDateTimeString()
        ]);

        $auth_code = $str;
        $expire_minutes = "10";

        Mail::send('emails.madangnhap', compact("auth_code", "expire_minutes"), function($email){
           $email->subject("Mã đăng nhập hệ thống đồ án VKU");
           $email->to('hethongdoanvku@gmail.com', '');
        });

        // DB::unprepared("
        //     CREATE EVENT delete_token_event
        //     ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE
        //     ON COMPLETION PRESERVE
        //     DO
        //     DELETE FROM table_token where id = {$id}
        // ");
    }
}
