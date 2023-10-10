<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Option;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {        
        $option = Option::find($id);
        return view('order.create',compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->status = $request->status;
        $order->gig_id = $request->gig_id;
        $order->user_id = $request->user_id;
        $order->freelancer_id = $request->freelancer_id;
        $order->option_id = $request->option_id;
        $order->description = $request->description;
        $order->deadline = $request->deadline;
        $order->save();
        return redirect()->route('gig.show',['id'=>$request->gig_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('order.edit',compact('order'));
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
        $order = Order::find($id);
        $order->status = $request->status;
        $order->gig_id = $request->gig_id;
        $order->user_id = $request->user_id;
        $order->freelancer_id = $request->freelancer_id;
        $order->option_id = $request->option_id;
        $order->description = $request->description;
        $order->deadline = $request->deadline;
        $order->save();
        return redirect()->route('order.show',['id'=>$order->id]);
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
