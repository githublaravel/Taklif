<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function table()
    {
        $users = DB::table('users')->get();
        return view('admin.user.view', compact('users'));
    }
    public function show_create()
    {
        return view('admin.user.create');
    }
    public function create_user(Request $req)
    {
        $data = $req->all();
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ];
        $errors = validator::make($data, $rule);
        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withinput();
        }
        $insert = new User();
        $insert->name = $req->name;
        $insert->email = $req->email;
        $insert->password = $req->password;
        $insert->save();
        return redirect('/admin/user/');
    }

    public function show_update($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.update', compact('user'));
    }
    public function update_user($req, $id)
    {
        $data = $req->all();
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ];
        $errors = validator::make($data, $rule);
        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withinput();
        }

    }
    public function destroy($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect('/admin/user');
    }
}
