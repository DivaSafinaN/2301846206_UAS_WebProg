<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request, $id){
        $book = Ebook::where('id',$id)->first();

        //simpan ke db pesanan    
            $cart = new Order;
            $cart->user_id = Auth::user()->id;
            $cart->ebook_id = $book->id;
            $cart->status = 0;
            $cart->save();

        return redirect('cart');
    }

    public function cart(){
        $cart = null;
        $cart = Order::where('user_id',Auth::user()->id)->where('status',0)->get();
        return view('cart',[
            "title" => "Cart",
        ],
        compact('cart')
    );
    }

    public function destroy($id){
        $cart = Order::find($id);
        $cart->delete();
        return redirect('cart');
    }

    public function submit(){
        $cart = Order::where('user_id', Auth::user()->id)->where('status',0)->update(['status'=>1]);

        return redirect('success');
    }
}
