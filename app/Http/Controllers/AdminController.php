<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Transaction;
use App\Pizza;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userslist()
    {
        $users = Users::all();
        return view('admin.users', compact('users'));
    }

    public function home()
    {
        $pizza = Pizza::paginate(6);
        return view('admin.home', compact('pizza'));
    }

    public function transactionlist()
    {
        $transaction = Transaction::all();
        return view('admin.transaction', compact('transaction'));
    }

    public function transactionbyid($id)
    {
        $transaction = Transaction::find($id);
        return view('admin.transaction_list', compact('transaction'));
    }
}
