<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function rating(Request $request) {
        $star       = $request->input('product_rating');
        $comment    = $request->input('comment');
        $product_ID = $request->input('product_ID');

        $verified_purchase = Order::where('order.user_ID', Auth::id())
        ->join('order_detail', 'order_detail.order_ID', 'order.id')
        ->where('order_detail.product_ID', $product_ID)
        ->get();

            if ($verified_purchase->count() == 0) {
                return redirect()->action([ProductController::class, 'index'])->with('message', "Bạn không thể đánh giá khi chưa mua sản phẩm");
            } else {
                $existing_rating = Rate::where('user_ID', Auth::id())->where('product_ID', $product_ID)->first();
                if ($existing_rating) {
                    $existing_rating->star       = $star;
                    $existing_rating->comment    = $comment;
                    $existing_rating->product_ID = $product_ID;
                    $existing_rating->save();
                    return redirect()->action([ProductController::class, 'index'])->with('message', "Cảm ơn khách hàng đã đánh giá!");
                }                   
                 else {
                    Rate::create([
                        'user_ID'   =>Auth::id(),
                        'product_ID'=> $product_ID,
                        'star'      => $star,
                        'comment'   => $comment
                    ]);
                    return redirect()->action([ProductController::class, 'index'])->with('message', "Cảm ơn khách hàng đã đánh giá!");
                }
            }
    }
}

