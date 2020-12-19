<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pizza;
use Illuminate\Support\Facades\File;

class PizzaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addPizza()
    {
        return view('pizza.add');
    }

    public function do_addPizza(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'price' => 'required|numeric|min:10000',
            'description' => 'required|string|min:20',
            'image' => 'required|image',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $file = $request->file('image');
        $randNama = "pizza-".rand(11111111, 99999999)."-picture";
        $file_name = $randNama.".".$file->getClientOriginalExtension();

        $tujuan_upload = 'data_pizza';
        if($file->move($tujuan_upload, $file_name)) {
            $pizza = new Pizza;
            $pizza->name = $request->input('name');
            $pizza->description = $request->input('description');
            $pizza->price = $request->input('price');
            $pizza->image = "$tujuan_upload/$file_name";
            $pizza->save();

            return redirect('/');
        }
    }

    public function homeAdmin()
    {
        $pizza = Pizza::all();
        return view('admin.home', [
            'pizza' => $pizza
        ]);
    }

    public function editPizza($id)
    {
        $pizza = Pizza::where('id', $id)->firstOrFail();
        return view('pizza.edit', compact('pizza'));
    }

    public function do_editPizza($id, Request $request)
    {
        $pizza = Pizza::where('id', $id)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'price' => 'required|numeric|min:10000',
            'description' => 'required|string|min:20',
            'image' => 'required|image',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $file = $request->file('image');
        $randNama = "pizza-".rand(11111111, 99999999)."-picture";
        $file_name = $randNama.".".$file->getClientOriginalExtension();

        $tujuan_upload = 'data_pizza';
        if($file->move($tujuan_upload, $file_name)) {
            File::delete($pizza->image);
            $pizza->name = $request->input('name');
            $pizza->description = $request->input('description');
            $pizza->price = $request->input('price');
            $pizza->image = "$tujuan_upload/$file_name";
            $pizza->save();

            return redirect()->route('home_admin');
        }
    }

    public function deletePizza($id)
    {
        $pizza = Pizza::where('id', $id)->firstOrFail();
        return view('pizza.delete', compact('pizza'));
    }

    public function do_deletePizza($id)
    {
        $pizza = Pizza::where('id', $id)->firstOrFail();
        $pizza->delete();
        return redirect()->route('home_admin');
    }
    //
}
