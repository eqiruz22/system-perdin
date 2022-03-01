<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    public function index()
    {
        $data = Zone::with('level')->paginate(10);
        return view('zone.index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        $level = Level::all();
        return view('zone.create',[
            'level' => $level
        ]);
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(),[
            'zone_name' => 'required',
            'level_id' => 'required|unique:zones'
        ],[
            'zone_name.required' => 'Zone is required',
            'level_id.required' => 'Level is required',
            'level_id.unique' => 'Level is already exist'
        ]);

        if($rule->fails()){
            return redirect()->back()->withErrors($rule->errors());
        }

        $data = [
            'zone_name' => $request->input('zone_name'),
            'level_id' => $request->input('level_id')
        ];

        DB::table('zones')->insert($data);
        return redirect('/zone')->with('success','Zone has been created');
    }

    public function edit($id)
    {
        $data = Zone::findOrFail($id);
        $level = Level::all();
        return view('zone.edit',[
            'data' => $data,
            'level' => $level
        ]);
    }

    public function update(Request $request, Zone $id)
    {
        $rule = [
            'zone_name' => 'required',
        ];

        if($request->level_id != $id->level_id){
            $rule['level_id'] = 'required|unique:zones';
        }

        $rules = Validator::make($request->all(),$rule,[
            'zone_name.required' => 'Zone is required',
            'level_id.required' => 'Level is required',
            'level_id.unique' => 'Level is already exist'
        ]);

        if($rules->fails()){
            return redirect()->back()->withErrors($rules->errors());
        }

        $data = [
            'zone_name' => $request->input('zone_name'),
            'level_id' => $request->input('level_id')
        ];

        DB::table('zones')->where('id',$id->id)->update($data);
        return redirect('/zone')->with('success','Zone has been updated');
    }

    public function destroy($id)
    {
        $data = Zone::findOrFail($id);
        $data->delete();
        return redirect('/zone');
    }
}