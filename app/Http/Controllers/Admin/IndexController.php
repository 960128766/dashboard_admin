<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::orderby('id', 'DESC')->paginate(3);
        return view('Main_page', compact('products'));
    }

    public function detailsProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('front.detailsProduct', compact('product'));
    }

    public function AddtoCart(AddToCartRequest $request, $id)
    {
        if ($request->tedad <= $request->inventory) {
            $user_id = auth()->id();
            $product = Product::find($id);
            $order = new Order();
            $order->user_id = $user_id;
            $order->product_id = $id;
            $order->product_name = $product->name;
            $order->product_price = $product->price;
            $order->tedad = $request->tedad;
            $order->total_price = $product->price * $request->tedad;
            $product->decrement('inventory', $request->tedad);
            $order->save();
            session()->flash('addtocart', 'successfully added to Cart');
            return redirect()->route('details.product', $id);
        } else {
            session()->flash('invalid', 'not exist....');
            return redirect()->route('details.product', $id);
        }
    }

    public function DisplayCart()
    {
        $id = auth()->id();
        $orders = Order::where('user_id', '=', $id)->orderby('id', 'DESC')->get();
        $sum = Order::where('user_id', '=', $id)->sum('total_price');
        return view('front/DisplayCart', compact('orders', 'sum'));
    }

    public function DeleteOfCart($id)
    {
        $order = Order::find($id);
        $order->delete();
        session()->flash('deleteOrder', 'successfully !... deleted item');
        return redirect()->route('DisplayCart');
    }

    public function DeleteAllUserCart()
    {
        $user = Auth::user();
        $user->orders()->delete();
        return redirect()->route('DisplayCart');
    }

    public function DisplayUser()
    {
        $users = User::orderby('id', 'DESC')->get();
        return view('Admin.users.index', compact('users'));
    }

    public function DisplayOrders()
    {
        $orders = Order::orderby('id', 'DESC')->get();
        return view('Admin.orders.index', compact('orders'));
    }
}
