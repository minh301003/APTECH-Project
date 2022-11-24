<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
        $cartItems = \Cart::getContent();
        return view('client/checkout', compact('cartItems'));
    }
    
    public function placeorder(Request $request) {
        //Lưu thông tin user
        $user = User::where('id', Auth::id())->first();
        $user->name    = $request->input('user_name');
        $user->address = $request->input('user_address');
        $user->phone   = $request->input('user_phone');
        $user->email   = $request->input('user_email');
        $user->save();

        //Lưu thông tin order
        $order = new Order();
        $order->user_ID        = $user->id;
        $order->user_name      = $request->input('user_name');
        $order->user_address   = $request->input('user_address');
        $order->user_phone     = $request->input('user_phone');
        $order->user_email     = $request->input('user_email');
        $order->payment_method = $request->input('payment_method');
        $order->total          = \Cart::getTotal();
        $order->save();

        $cartItems = \Cart::getContent();
        foreach($cartItems as $item) {
            OrderDetail::create([
                'order_ID'     => $order->id,
                'product_ID'   => $item->id,
                'amount'       => $item->quantity,
                'total'        => $item->price*$item->quantity, 
                'user_ID'      => $user->id,
                
            ]);
            $product = Product::where('id',  $item->id)->first();
            $product->amount -= $item->quantity;
            $product->save();
        }
        //gui mail xac nhan
        Mail::send('mails.order_mail', compact('order'), function($email) use($order){ 
            $email->subject('Xác nhận đơn hàng') ;
            $email->to($order->user_email, $order->user_name);
        });
        
        //Huy don hang
        \Cart::clear();
        return redirect()->action([ProductController::class, 'index'])->with('message', 'Đặt hàng thành công');
    }
}
