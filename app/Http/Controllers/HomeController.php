<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Pizza;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if (Gate::allows('isAdmin')) {
            return redirect()->route('home_admin');
        } else if (Gate::allows('isMember')) {
            return redirect()->route('user_home');
        } else {
            $pizza = Pizza::paginate(6);
            return view('home', compact('pizza'));
        }
    }

    public function viewPizza($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizza.view', compact('pizza'));
    }
}
