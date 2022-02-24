<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public $name;

    public function index()
    {
        $data = User::select('id', 'name', 'email', 'created_at')->orderBy('id', 'desc')->paginate(10);
        return view('user.index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:6',
        ],[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email has already been taken',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ]);

        if ($rule->fails()) {
            return redirect()->back()->withErrors($rule->errors());
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ];

        User::create($data);
        return redirect('/user')->with('success', 'User has been created');
    }

    public function edit(User $id)
    {
        return view('user.edit',[
            'data' => $id
        ]);
    }

    public function update(Request $request, User $id)
    {
        $rule = [
            'name' => 'required',
        ];

        if ($request->email != $id->email) {
            $rule['email'] = 'required|unique:users|email:dns';
        }

        $data = $request->validate($rule);

        User::where('id',$id->id)->update($data);
        return redirect('/user')->with('success', 'User has been updated');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user');
    }

}