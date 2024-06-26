<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\image;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function table()
    {
        $users = User::all();
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
        $user = User::find($id);
        return view('admin.user.update', compact('user'));
    }
    public function update_user(Request $req, $id)
    {
        $data = $req->all();
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'newpassword' => 'nullable',
        ];
        $errors = validator::make($data, $rule);
        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withinput();
        }
        $update = User::find($id);
        $update->name = $req->name;
        $update->email = $req->email;
        $update->password = $req->password;
        $update->save();
        return redirect('/admin/user');
    }
    public function destroy($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect('/admin/user');
    }
    public function show_image($id)
    {
        $images = Image::where('subject_id',$id)->where('type','1')->get();
         return view('admin.user.image',compact('id','images'));
    }

    public function create_image(Request $req , $id)
    {
        $image = new Image();
        $image->type = '1';
        $image->subject_id = $id;

        if($req->hasFile('image')){
            $img = $req->file('image');
            $image_name= time() . '.' . $img->getClientOriginalExtension();
            $address = 'image/user/';
            $img->move($address , $image_name);

            $image->image= $address . $image_name;
        }
        $image->save();
        return redirect()->back();
    }
}
