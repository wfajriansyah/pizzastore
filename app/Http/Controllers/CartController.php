<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Pizza;
use App\Cart;
use App\Orders;
use App\Transaction;
use Auth;

class CartController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pizza_id' => 'required|numeric|exists:pizza,id',
            'qty' => 'required|numeric'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $id = $request->input('pizza_id');
        $qty = $request->input('qty');
        $pizza = Pizza::findOrFail($id);
        $cart = session()->get('myCart');
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $pizza->name,
                    "photo" => $pizza->image,
                    "description" => $pizza->description,
                    "price" => $pizza->price,
                    "quantity" => $qty
                ]
            ];
            session()->put('myCart', $cart);
            return redirect()->route('viewCart');
        }
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $qty;
            session()->put('myCart', $cart);
            return redirect()->route('viewCart');
        }
        $cart[$id] = [
            "name" => $pizza->name,
            "photo" => $pizza->image,
            "description" => $pizza->description,
            "price" => $pizza->price,
            "quantity" => $qty
        ];
        session()->put('myCart', $cart);
        return redirect()->route('viewCart');
    }

    public function updateCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pizza_id' => 'required|numeric|exists:pizza,id',
            'button' => 'required|string'
        ]);
        $validator->sometimes('qty', 'required|numeric', function($input) {
            return $input->button == "update";
        });
        if($validator->fails()){
            return redirect()->route('viewCart')->withErrors($validator);
        }
        $id = $request->input('pizza_id');
        $qty = $request->input('qty');
        $btnMode = $request->input('button');

        $cart = session()->get('myCart');
        if($cart) {
            if($btnMode == "update") {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $qty;
                session()->put('myCart', $cart);
                return redirect()->route('viewCart');
            } else if($btnMode == "delete") {
                unset($cart[$id]);
                session()->put('myCart', $cart);
                return redirect()->route('viewCart');
            }
        } else {
            return redirect()->route('viewCart')->withErrors(["message" => "You not have cart."]);
        }
    }

    public function checkoutCart()
    {
        $cart = session()->get('myCart');
        $carts = Cart::where('id_users', Auth::user()->id)->Where('status', 'Unpaid')->first();
        if(!$carts) {
            $id_orders = Str::random(15);
            $cartss = new Cart();
            $cartss->id_users = Auth::user()->id;
            $cartss->id_orders = $id_orders;
            $cartss->status = "Unpaid";
            $cartss->save();
            $id_cart = $cartss->id;
            if($cart) {
                $total = 0;
                foreach($cart as $keyItem => $valueItem) {
                    $orders = new Orders();
                    $orders->id_users = Auth::user()->id;
                    $orders->id_orders = $id_orders;
                    $orders->id_pizza = $keyItem;
                    $orders->quantity = $valueItem['quantity'];
                    $orders->save();

                    $price = $valueItem['price'] * $valueItem['quantity'];
                    $total += $price;
                }

                $transaction = new Transaction();
                $transaction->id_users = Auth::user()->id;
                $transaction->id_cart = $id_cart;
                $transaction->total = $total;
                $transaction->save();
                session()->pull('myCart');
                return redirect()->route('user_home');
            } else {
                return redirect()->route('viewCart')->withErrors(["message" => "You not have cart."]);
            }
        } else {
            return redirect()->route('viewCart')->withErrors(["message" => "You have cart and status is unpaid."]);
        }
    }
}
