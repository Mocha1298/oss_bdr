<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OssModel;
use App\Models\OssFileModel;
use App\Models\User;
use App\Models\LevelModel;
use App\Models\ApprovementModel;
use App\Models\SiteModel;
use Mail;
use DB;
use Auth;

class ApprovalController extends Controller
{
    function index() {
        $oss = DB::connection('mysql')->select("select t1.id,t1.inc_name,t1.inc_type,t1.pic,t1.no_pic,t1.email_pic,t1.people,t1.people_fix,t1.plan_date,t1.plan_time,t1.status,t1.created_at,COUNT(t2.id) AS total_approval FROM oss t1 left OUTER JOIN approvements t2 ON t2.id_oss = t1.id GROUP BY t1.id,t1.inc_name,t1.inc_type,t1.pic,t1.no_pic,t1.email_pic,t1.people,t1.people_fix,t1.plan_date,t1.plan_time,t1.status,t1.created_at");
        $level_user = User::join('levels','levels.id_user','users.id')->where('users.id',Auth::user()->id)->select('level')->first();
        $data = [
            'oss'=>$oss,
            'level_user'=>$level_user,
        ];
        return view('approval',$data);
    }
    function approved(Request $req,$id) {
        $oss = OssModel::find($id);
        $oss->people_fix = $req->people;
        $oss->voucher = $req->voucher;
        $oss->status = 1;
        $oss->save();
        // $data = [
        //     'email'=>$oss->email_pic,
        //     'title'=>"Permintaan Anda telah disetujui",
        //     'body'=>"Berikut detail tiket yang dapat Anda gunakan pada tanggal ".$oss->plan_date." pukul ".$oss->plan_time
        // ];
        // return $data['email'];
        $data["email"] = $oss->email_pic;
        $data["title"] = "Permintaan Anda telah disetujui";
        $data["body"] = "<span style='color:black;'>Dibawah terlampir <strong>Kode Voucher</strong> yang dapat Anda tukarkan di loket saat Instansi Anda berkunjung pada:</span><br>
                        Tanggal ".$oss->plan_date." Jam ".$oss->plan_time."<br>
                        <div style='width:100%;height:70px;text-align:center;border:1px;background:#cecece'>
                        <h1 style='padding-top: 15px;'>".$oss->voucher."</h1>
                        </div>";
        Mail::send('mail', $data, function($message)use($data){
            $message->to($data['email'])
                    ->subject($data['title']);
        });
        return redirect()->back()->with('sukses','1');
    }
    function dismissed($id) {
        $oss = OssModel::find($id);
        $oss->status = 2;
        $oss->save();
        $data["email"] = $oss->email_pic;
        $data["title"] = "Permintaan Anda ditolak";
        $data["body"] = "Dengan beberapa pertimbangan kami menyampaikan bahwa permintaan Anda kami tolak dikarenakan alasan tertentu.";
        Mail::send("mail", $data, function($message)use($data){
            $message->to($data["email"])
                    ->subject($data["title"]);
        });
        return redirect()->back()->with('sukses','1');
    }
}
