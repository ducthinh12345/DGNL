<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class OrderController extends Controller
{
   public function add(Request $request)
   {

      $order = new Order();

      $tmp_price = 0;
      $quantity_arr = $request->get('quantity');
      foreach ($quantity_arr as $product_id => $quantity) {
         if ($quantity) continue;
         unset($quantity_arr[$product_id]);
      }
      foreach ($quantity_arr as $product_id => $quantity) {
         $product_data = Product::find($product_id);
         $tmp_price += $product_data->price * $quantity;
      }
      $user = Auth::user();
      $user_id = $user->id;

      $order->user_id = $user_id;
      $order->total_price = $tmp_price;

      $order->save();

      $last_order = Order::latest()->first();

      foreach ($quantity_arr as $product_id => $quantity) {
         $order_detail = new OrderDetail();
         $order_detail->order_id = $last_order->id;
         $order_detail->product_id = $product_id;
         $order_detail->save();
      }
      return redirect()->route('product');
   }
}
