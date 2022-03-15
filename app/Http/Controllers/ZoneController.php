<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    public function index()
    {
        $data = Zone::all();
        return view('zone.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('zone.create');
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:zones,name'
        ],[
            'name.required' => 'Nama zone harus diisi',
            'name.string' => 'Nama zone harus berupa angka & huruf',
            'name.max' => 'Nama zone maksimal 255 karakter',
            'name.unique' => 'Nama zone sudah ada',
        ]);
        
        
        if($rule->fails()){
            $input = $request->all();
            return Redirect::back()->withInput($input)->withErrors($rule->errors());
        }
        
        $data = [
            'name' => $request->input('name')
        ];

        Zone::create($data);
        return redirect('/zone')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Zone::findOrFail($id);
        return view('zone.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $rule = Validator::make($request->all(), [
            'name' => 'required|string|unique:zones,name,'.$id
        ],[
            'name.required' => 'Nama zone harus diisi',
            'name.string' => 'Nama zone harus berupa angka & huruf',
            'name.unique' => 'Nama zone sudah ada',
        ]);

        if($rule->fails()){
            $input = $request->all();
            return Redirect::back()->withInput($input)->withErrors($rule->errors());
        }

        $data = [
            'name' => $request->input('name')
        ];

        Zone::where('id', $id)->update($data);
        return redirect('/zone')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Zone::destroy($id);
        return redirect('/zone');
    }
}