<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteModel;
use App\Models\LevelModel;

class SiteController extends Controller
{
    function index() {
        $site = SiteModel::all();
        $data = [
            'site'=>$site,
        ];
        return view('site.index',$data);
    }
    function store(Request $req) {
        $site = new SiteModel();
        $site->site_name = $req->site_name;
        $site->approvement_level = $req->approvement_level;
        $site->save();
        return redirect()->back()->with('sukses','Berhasil');
    }
    function edit($id) {
        $site = SiteModel::find($id);
        $data = [
            'site'=>$site,
        ];
        return view('site.edit',$data);
    }
    function update(Request $req,$id) {
        $site = SiteModel::find($id);
        $cek_level = LevelModel::where('id_site',$id)->get();
        $count = count($cek_level);
        if($count == 0){
            $site->site_name = $req->site_name;
            $site->approvement_level = $req->approvement_level;
            $site->save();
        }else{
            return redirect()->back()->with('gagal','Gagal');
        }
    }
    function delete($id) {
        $site = SiteModel::find($id);
        $cek_level = LevelModel::where('id_site',$id)->get();
        $count = count($cek_level);
        if($count == 0){
            $site->delete();
        }else{
            return redirect()->back()->with('gagal','Gagal');
        }
    }
}
