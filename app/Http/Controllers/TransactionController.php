<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($id)
    {
        $transaction = Transaction::where('id_users', Auth::user()->id)->get();
        return view('transaction.view', compact('transaction'));
    }
}
