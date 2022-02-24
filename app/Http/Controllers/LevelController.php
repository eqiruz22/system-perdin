<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Level;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $data = Level::select('id','name_level','meals_allowance','hardship','rental_house_allowance','pulsa_allowance')->orderBy('id', 'asc')->paginate(10);
        return view('level.index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(),[
            'name_level' => 'required',
            'meals_allowance' => 'required',
            'hardship' => 'required',
            'rental_house_allowance' => 'required',
            'pulsa_allowance' => 'required',
        ],[
            'name_level.required' => 'Name is required',
            'meals_allowance.required' => 'Meals allowance is required',
            'hardship.required' => 'Hardship is required',
            'rental_house_allowance.required' => 'Rental house allowance is required',
            'pulsa_allowance.required' => 'Pulsa allowance is required',
        ]);

        if($rule->fails()){
            return redirect()->back()->withErrors($rule->errors());
        }

        $data = [
            'name_level' => $request->input('name_level'),
            'meals_allowance' => str_replace('.', '', $request->input('meals_allowance')),
            'hardship' => str_replace('.', '', $request->input('hardship')),
            'rental_house_allowance' => str_replace('.', '', $request->input('rental_house_allowance')),
            'pulsa_allowance' => str_replace('.', '', $request->input('pulsa_allowance')),
        ];

        DB::table('levels')->insert($data);
        return redirect('/level')->with('success', 'Level has been created');
    }

    public function edit($id)
    {
        return view('level.edit',[
            'data' => Level::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $rule = Validator::make($request->all(),[
            'name_level' => 'required',
            'meals_allowance' => 'required',
            'hardship' => 'required',
            'rental_house_allowance' => 'required',
            'pulsa_allowance' => 'required',
        ],[
            'name_level.required' => 'Name is required',
            'meals_allowance.required' => 'Meals allowance is required',
            'hardship.required' => 'Hardship is required',
            'rental_house_allowance.required' => 'Rental house allowance is required',
            'pulsa_allowance.required' => 'Pulsa allowance is required',
        ]);

        if($rule->fails()){
            return redirect()->back()->withErrors($rule->errors());
        }

        $data = [
            'name_level' => $request->input('name_level'),
            'meals_allowance' => str_replace('.', '', $request->input('meals_allowance')),
            'hardship' => str_replace('.', '', $request->input('hardship')),
            'rental_house_allowance' => str_replace('.', '', $request->input('rental_house_allowance')),
            'pulsa_allowance' => str_replace('.', '', $request->input('pulsa_allowance')),
        ];

        DB::table('levels')->where('id', $id)->update($data);
        return redirect('/level')->with('success', 'Level has been updated');
    }

    public function destroy($id)
    {
        Level::destroy($id);
        return redirect('/level');
    }
}