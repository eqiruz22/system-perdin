<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Level;
use App\Models\Zone;

class LevelController extends Controller
{
    public function index()
    {
        $level = Level::with('zone')->get();
        return view('level.index',[
            'level' => $level
        ]);
    }

    public function create()
    {
        $zone = Zone::all();
        return view('level.create',[
            'zone' => $zone
        ]);
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(),[
            'name_level' => 'required',
            'zone_id' => 'required',
            'meals_allowance' => 'required',
            'hardship' => 'required',
            'rental_house_allowance' => 'required',
            'pulsa_allowance' => 'required',
            'hardship_allowance' => 'required',
        ],[
            'name_level.required' => 'Nama level harus diisi',
            'zone_id.required' => 'Zona harus diisi',
            'meals_allowance.required' => 'Uang makan harus diisi',
            'hardship.required' => 'Hardship harus diisi',
            'rental_house_allowance.required' => 'Uang penginapan harus diisi',
            'pulsa_allowance.required' => 'Uang pulsa harus diisi',
            'hardship_allowance.required' => 'Uang hardship harus diisi',
        ]);

        if($rule->fails()){
            $input = $request->all();
            return Redirect::back()->withInput($input)->withErrors($rule->errors());
        }

        $data = [
            'name_level' => $request->input('name_level'),
            'zone_id' => $request->input('zone_id'),
            'meals_allowance' => str_replace('.','',$request->input('meals_allowance')),
            'hardship' => str_replace('.','',$request->input('hardship')),
            'rental_house_allowance' => str_replace('.','',$request->input('rental_house_allowance')),
            'pulsa_allowance' => str_replace('.','',$request->input('pulsa_allowance')),
            'hardship_allowance' => str_replace('.','',$request->input('hardship_allowance')),
        ];


        Level::create($data);
        return redirect('/level')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);
        $zone = Zone::all();
        return view('level.edit',[
            'level' => $level,
            'zone' => $zone
        ]);
    }

    public function update(Request $request, $id)
    {
        $rule = Validator::make($request->all(),[
            'name_level' => 'required',
            'zone_id' => 'required|unique:levels,zone_id,'.$id,
            'meals_allowance' => 'required',
            'hardship' => 'required',
            'rental_house_allowance' => 'required',
            'pulsa_allowance' => 'required',
            'hardship_allowance' => 'required',
        ],[
            'name_level.required' => 'Nama level harus diisi',
            'zone_id.required' => 'Zona harus diisi',
            'zone_id.unique' => 'Zona sudah ada',
            'meals_allowance.required' => 'Uang makan harus diisi',
            'hardship.required' => 'Hardship harus diisi',
            'rental_house_allowance.required' => 'Uang penginapan harus diisi',
            'pulsa_allowance.required' => 'Uang pulsa harus diisi',
            'hardship_allowance.required' => 'Uang hardship harus diisi',
        ]);

        if($rule->fails()){
            $input = $request->all();
            return Redirect::back()->withInput($input)->withErrors($rule->errors());
        }

        $data = [
            'name_level' => $request->input('name_level'),
            'zone_id' => $request->input('zone_id'),
            'meals_allowance' => str_replace('.','',$request->input('meals_allowance')),
            'hardship' => str_replace('.','',$request->input('hardship')),
            'rental_house_allowance' => str_replace('.','',$request->input('rental_house_allowance')),
            'pulsa_allowance' => str_replace('.','',$request->input('pulsa_allowance')),
            'hardship_allowance' => str_replace('.','',$request->input('hardship_allowance')),
        ];

        Level::where('id',$id)->update($data);
        return redirect('/level')->with('success','Data berhasil diubah');
    }

    public function destroy($id)
    {
        Level::destroy($id);
        return redirect('/level');
    }
}