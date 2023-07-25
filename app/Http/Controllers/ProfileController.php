<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Master;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::all();
        $data = [
            'user'=>$user,
        ];
        // return $data;
        return view("users.index",$data);
    }
    
    function create() {
        return view('users.newuser');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make("#UserReport2023"),
            'role' => $request->role,
        ]);

        return redirect("/user")->with("success","Berhasil");
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = [
            'user'=>$user,
        ];
        // return $data;
        return view("users.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('sukses','Berhasil');
    }

    public function destroy($id)
    {
        
        $user = User::find($id);

        $user->delete();

        return redirect("/user")->with("warning","Berhasil");
    }

    function reset($id) {
        $reset = User::find($id);
        $reset->password = Hash::make("#UserOss2023");
        $reset->save();
        $data["email"] = $reset->email;
        $data["title"] = "Pemberitahuan Reset Password (oss.borobudurpark.com)";
        $data["body"] = "Anda dapat menggunakan akun dibawah ini untuk mengakses oss.borobudurpark.com sebagai user:<br><br>
                        <strong>Email: ".$reset->email."<br>
                        Password: #UserOss2023</strong><br><br>
                        Mohon untuk segera memperbarui password Anda pada link berikut <br>
                        <a href='report.twc.id/profile/".$reset->id."'>Halaman Edit Password</a><br>Terimakasih.";
        Mail::send('admin.mail', $data, function($message)use($data){
            $message->to($data['email'])
                    ->subject($data['title']);
        });
    }
}
