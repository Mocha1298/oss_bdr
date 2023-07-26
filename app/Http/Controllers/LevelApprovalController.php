<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelModel;
use App\Models\SiteModel;
use App\Models\User;

class LevelApprovalController extends Controller
{
    function index() {
        $level = LevelModel::join('users','users.id','levels.id_user')
        ->join('sites','sites.id','users.id_site')
        ->select('levels.id','levels.level','users.name','sites.site_name')->get();
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
        $cek_level = LevelModel::where('id_site',$req->id_site)->select('id')->get();
        $count = count($cek_level);
        $level = new LevelModel();
        if($site->approvement_level > $count){
            $level->level = $count+1;
            $level->id_user = $req->id_user;
            $level->id_site = $req->id_site;
            $level->save();
            return redirect()->back()->with('sukses','Berhasil');
        }else{
            return redirect()->back()->with('error','Penuh');
        }
    }
    function edit($id) {
        $level = LevelModel::find($id);
        $data = [
            'level'=>$level,
        ];
        return view('level.edit',$data);
    }
    function update(Request $req,$id) {
        $level = LevelModel::find($id);
        $level->level = $req->level;
        $level->id_user = $req->id_user;
        $level->save();
        return redirect()->back()->with('sukses','Berhasil');
    }
    function delete($id) {
        $level = LevelModel::find($id);
        $level->delete();
        return redirect()->back()->with('hapus','Berhasil');
    }
    function get_user(Request $req) {
        $user = User::where('id_site',$req->id_site)->get();
        return $user;
    }
}
