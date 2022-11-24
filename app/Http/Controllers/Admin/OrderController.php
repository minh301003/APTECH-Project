<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        //tổng số đơn
        $numberOfOrders = Order::count();
        //doanh thu theo tháng
        $thisMonth = Carbon::now()->format('m');
        $sumThisMonth = Order::whereMonth('created_at', $thisMonth)->where('accept_status', '1')->sum('total');

         //doanh thu theo năm
         $thisYear = Carbon::now()->format('Y');
         $sumThisYear = Order::whereYear('created_at', $thisYear)->where('accept_status', '1')->sum('total');

        return view('/admin/admin_order/order', compact('orders', 'numberOfOrders', 'sumThisMonth', 'sumThisYear'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $order = Order::where('id', $id)->get();
        return view('/admin/admin_order/order_detail', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->accept_status = $request->input('accept_status');
        $order->payment_status = $request->input('payment_status');
        $order->ship_status = $request->input('ship_status');
        $order->save();
        return redirect()->action([OrderController::class, 'index'])->with('message', 'Cập nhật đơn hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
