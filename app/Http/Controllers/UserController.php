<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Orders;
use Auth;
use App\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $pizza = Pizza::paginate(6);
        return view('home', compact('pizza'));
    }

    public function transaction()
    {
        $trx = Transaction::where('id_users', Auth::user()->id)->get();
        return view('transaction', compact('trx'));
    }

    public function doSearch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string'
        ]);

        if($validator->fails()){
            return redirect()->route('user_home')->withErrors($validator);
        }

        $searchName = $request->input('search');
        $pizza = Pizza::where(function($query) use($searchName) {
            $query->where('name', 'like', '%'.$searchName.'%');
        })->paginate(6);
        $pizza->appends(['search' => $searchName]);
        Session::flash('search', $searchName);
        return view('home', compact('pizza'));
    }

    public function viewCart()
    {
        $cart = session()->get('myCart');
        return view('cart', compact('cart'));
    }
}
