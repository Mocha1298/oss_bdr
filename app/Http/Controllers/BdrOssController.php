<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BdrOssMail;
use App\Models\OssModel;
use App\Models\OssFileModel;
use App\Models\LevelModel;

class BdrOssController extends Controller
{
    public function post(Request $req)
    {
        $level = LevelModel::where('levels.id_site',1)
        ->join('users','users.id','levels.id_user')
        ->select('users.email','levels.level')
        ->orderBy('levels.level','asc')->first();
        // return $level->email;
        $oss = new OssModel();
        $oss->inc_name = $req->inc_name;
        $oss->inc_type = $req->inc_type;
        $oss->pic = $req->pic;
        $oss->no_pic = $req->no_pic;
        $oss->email_pic = $req->email_pic;
        $oss->people = $req->people;
        $oss->plan_date = $req->plan_date;
        $oss->plan_time = $req->plan_time;
        $oss->status = 0;
        $oss->id_site = 1;
        $oss->save();
        $count = count($req->dokumen);

        $data["email"] = $level->email;
        $data["title"] = "Borobudur Online Single Submission";
        $data["body"] = "Detail Informasi<br>Nama Instansi : ".$oss->inc_name."<br>Tipe Instansi : ".$oss->inc_type."<br>Nama PIC : ".$oss->pic."<br>Kontak PIC : ".$oss->no_pic."<br>Email PIC : ".$oss->email_pic."<br>Waktu Kunjungan : ".$oss->plan_time." WIB ".$oss->plan_date;

        // return $count;
        for ($i=0; $i < $count; $i++) { 
            $oss_file = new OssFileModel();
            $oss_file->id_oss = $oss->id;
            $file = $req->dokumen[$i];
            $filename = time().$i.'.'.$file->getClientOriginalExtension();//nama file
            // return $filename;
            $oss_file->file = $filename;
            $oss_file->save();
            $file->move(public_path('files'), $filename);//simpan file lokal dengan nama $filename
        }
        $oss_file = OssFileModel::where('id_oss',$oss->id)->get();
        Mail::send('mail', $data, function($message)use($data, $oss_file) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
            foreach ($oss_file as $file){
                $message->attach(public_path('files/'.$file->file));
            }
            
        });
        return view('thanks');
    }
}
