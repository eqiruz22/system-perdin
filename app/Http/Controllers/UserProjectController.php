<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserProjectController extends Controller
{
    public function index()
    {
        $data = UserProject::with('levels')->paginate(10);
        return view('user-project.index',[
            'data' => $data
        ]);
    }
    
    public function create()
    {
        $level = Level::select('id', 'name_level')->get();
        return view('user-project.create',[
            'level' => $level
        ]);
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns|unique:user_projects',
            'level_id' => 'required'
        ],[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already exists',
            'level_id.required' => 'Level is required'
        ]);

        if($rule->fails()){
            return redirect()->back()->withErrors($rule->errors());
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level_id' => $request->input('level_id')
        ];

        DB::table('user_projects')->insert($data);
        return redirect('/user-project')->with('success', 'User has been created');
    }

    public function edit($id)
    {
        $data = UserProject::findOrFail($id);
        $level = Level::select('id', 'name_level')->get();
        return view('user-project.edit',[
            'data' => $data,
            'level' => $level
        ]);
    }

    public function update(Request $request, UserProject $id)
    {
        $rule = [
            'name' => 'required',
            'level_id' => 'required'
        ];

        if($request->email != $id->email){
            $rule['email'] = 'required|email:dns|unique:user_projects';
        }

        $rules = Validator::make($request->all(),$rule,[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'level_id.required' => 'Level is required'
        ]);

        if($rules->fails()){
            return redirect()->back()->withErrors($rules->errors());
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level_id' => $request->input('level_id')
        ];

        DB::table('user_projects')->where('id', $id->id)->update($data);
        return redirect('/user-project')->with('success', 'User has been updated');
    }

    public function destroy($id)
    {
        $data = UserProject::findOrFail($id);
        $data->delete();
        return redirect('/user-project');
    }
}