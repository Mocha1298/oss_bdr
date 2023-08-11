<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OssModel;
use App\Models\OssFileModel;
use App\Models\User;
use App\Models\LevelModel;
use App\Models\ApprovementModel;
use App\Models\SiteModel;
use App\Models\AprFileModel;
use Mail;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    function index() {
        $oss = DB::connection('mysql')->select("select t1.id,t1.inc_name,t1.inc_type,t1.pic,t1.no_pic,t1.email_pic,t1.people,t1.people_fix,t1.plan_date,t1.plan_time,t1.status,t1.created_at,COUNT(t2.id) AS total_approval FROM oss t1 left OUTER JOIN approvements t2 ON t2.id_oss = t1.id GROUP BY t1.id,t1.inc_name,t1.inc_type,t1.pic,t1.no_pic,t1.email_pic,t1.people,t1.people_fix,t1.plan_date,t1.plan_time,t1.status,t1.created_at");
        // return $oss;
        $level_user = User::join('levels','levels.id_user','users.id')->where('users.id',Auth::user()->id)->select('level')->first();
        $site = SiteModel::find(1);
        $data = [
            'oss'=>$oss,
            'level_user'=>$level_user,
            'site'=>$site,
        ];
        return view('approval',$data);
    }
    function approved(Request $req,$id) {
        // return $req->lampiran->getClientOriginalExtension();
        $id_oss = $id;
        $oss = OssModel::find($id_oss);
        $oss->people_fix = $req->people;
        $oss->voucher = $req->voucher;
        $oss->save();

        $cek_level = LevelModel::join('users','users.id','levels.id_user')->where('users.id',Auth::user()->id)->select('levels.id')->first();
        // return $cek_level;
        $apr = new ApprovementModel();
        $apr->id_level = $cek_level->id;
        $apr->id_oss = $id_oss;
        $apr->id_site = 1;
        $apr->save();

        $data["email"] = $oss->email_pic;
        $data["title"] = "Permintaan Anda telah disetujui";
        $data["body"] = 
            "<span style='color:black;'>Dibawah terlampir <strong>Kode Voucher</strong> yang dapat Anda tukarkan di loket saat Instansi Anda berkunjung pada:</span><br>
            Tanggal ".$oss->plan_date." Jam ".$oss->plan_time."<br>
            Jumlah pengunjung yang disetujui <strong>".$oss->people_fix." orang</strong><br>
            <div style='width:100%;height:70px;text-align:center;border:1px;background:#cecece'>
            <h1 style='padding-top: 15px;'>".$oss->voucher."</h1>
            </div>";
                        
        $apr_file = new AprFileModel();
        $file = $req->lampiran;
        $filename = time().'apr.'.$file->getClientOriginalExtension();//nama file
        $apr_file->id_approvement = $apr->id;
        $apr_file->file = $filename;
        $apr_file->save();
        $file->move(public_path('files'), $filename);//simpan file lokal dengan nama $filename

        $oss_file = OssFileModel::where('id_oss',$oss->id)->get();
        Mail::send('mail', $data, function($message)use($data, $filename) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
            $message->attach(public_path('files/'.$filename));
        });
        return redirect()->back()->with('sukses','1');
    }
    function dismissed($id) {
        $oss = OssModel::find($id);
        $oss->status = 2;
        $oss->update();
        $data["email"] = $oss->email_pic;
        $data["title"] = "Permintaan Anda ditolak";
        $data["body"] = "Dengan beberapa pertimbangan kami menyampaikan bahwa permintaan Anda kami tolak dikarenakan alasan tertentu.";
        Mail::send("mail", $data, function($message)use($data){
            $message->to($data["email"])
                    ->subject($data["title"]);
        });
        return redirect()->back()->with('sukses','1');
    }
    function approved_2nd($id_oss,$id_user) {
        $level = LevelModel::where('levels.id_user',$id_user)
        ->join('users','users.id','levels.id_user')
        ->select('levels.id','users.email','levels.level')
        ->orderBy('levels.level','asc')->first();

        $apr = new ApprovementModel();
        $apr->id_level = $level->id;
        $apr->id_oss = $id_oss;
        $apr->id_site = 1;
        $apr->save();

        $count_apr = count(ApprovementModel::where('id_oss',$id_oss)->get());

        $recipient = LevelModel::where('levels.id_site',1)->where('levels.level',$count_apr+1)->join('users','users.id','levels.id_user')->first();

        $oss = OssModel::find($id_oss);
        $data["email"] = $recipient->email;
        $data["title"] = "Borobudur Online Single Submission";
        $data["body"] = "Detail Informasi<br>Nama Instansi : ".$oss->inc_name."<br>Tipe Instansi : ".$oss->inc_type."<br>Nama PIC : ".$oss->pic."<br>Kontak PIC : ".$oss->no_pic."<br>Email PIC : ".$oss->email_pic."<br>Waktu Kunjungan : ".$oss->plan_time." WIB ".$oss->plan_date;

        $oss_file = OssFileModel::where('id_oss',$id_oss)->get();
        Mail::send('mail', $data, function($message)use($data, $oss_file) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
            foreach ($oss_file as $file){
                $message->attach(public_path('files/'.$file->file));
            }
            
        });
        return redirect()->back()->with('sukses','1');
    }
    function showdoc($id) {
        $files = OssFileModel::where('id_oss',$id)->get();
        return $files;
    }
    function showpdf($id) {
        $files = OssFileModel::find($id);
        $data = [
            'files'=>$files
        ];
        return view('showpdf',$data);
    }
}
