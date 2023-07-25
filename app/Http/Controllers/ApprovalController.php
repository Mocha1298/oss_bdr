<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OssModel;
use App\Models\OssFileModel;
use App\Models\User;
use Mail;

class ApprovalController extends Controller
{
    function index() {
        $oss =  OssModel::all();
        $data = [
            'oss'=>$oss
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
