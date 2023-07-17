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
        // return $oss;
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
        $data["body"] = "Berikut detail tiket yang dapat Anda gunakan pada tanggal ".$oss->plan_date." pukul ".$oss->plan_time;
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
