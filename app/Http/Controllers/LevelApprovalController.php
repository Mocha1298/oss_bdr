<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelModel;
use App\Models\SiteModel;
use App\Models\User;
use DB;

class LevelApprovalController extends Controller
{
    function index() {
        $level = LevelModel::join('users','users.id','levels.id_user')
        ->join('sites','sites.id','levels.id_site')
        ->select('levels.id','levels.level','users.name','sites.site_name')
        ->get();
        // return $level;
        $site = SiteModel::all();
        $users = User::all();
        $data = [
            'site'=>$site,
            'level'=>$level,
            'users'=>$users,
        ];
        return view('level.index',$data);
    }
    function store(Request $req) {
        $site = SiteModel::find($req->id_site);
        $count_site = $site->approvement_level;
        $cek_level = LevelModel::where('id_site',$req->id_site)->select('level')->get();
        // return $cek_level[1]->level;
        $count_level = count($cek_level);
        $level = new LevelModel();
        $new_level = 0;
        if($count_site > $count_level){
            for ($a=0; $a < $count_site; $a++) { 
                $cek = $a+1;
                for ($b=0; $b < $count_level; $b++) { 
                    if($a+1 == $cek_level[$b]->level){
                        $cek = 0;
                    }
                }
                if ($cek != 0) {
                    $new_level = $cek;
                    break;
                }
            }
            $level->level = $new_level;
            $level->id_user = $req->id_user;
            $level->id_site = $req->id_site;
            $level->save(); 
            return redirect()->back()->with('sukses','Berhasil');
        }else{
            return redirect()->back()->with('penuh','Penuh');
        }
    }
    function edit($id) {
        $level = LevelModel::find($id);
        $user = User::where('id_site',$level->id_site)->get();
        $data = [
            'user'=>$user,
            'level'=>$level,
        ];
        return view('level.edit',$data);
    }
    function update(Request $req,$id) {
        $level = LevelModel::find($id);
        $level->id_user = $req->id_user;
        $level->save();
        return redirect('/level')->with('sukses','Berhasil');
    }
    function delete($id) {
        $level = LevelModel::find($id);
        $level->delete();
    }
    function get_user(Request $req) {
        $user = User::where('id_site',$req->id_site)->where('role',0)->get();
        return $user;
    }
}
