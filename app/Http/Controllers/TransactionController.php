<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;


class TransactionController extends Controller
{
    public function index()
    {
        $transaction=Transaction::all();
        return view('transactions.index', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction=Transaction::find($id);
        $orders=Order::all();
        return view('transactions.edit',compact('transaction','orders'));
    }

    public function update($id, Request $request)
    {
        $transaction=Transaction::find($id);
        $transaction->id=$request->id;
        $transaction->order_id=$request->order_id;
        $transaction->type=$request->type;
        $transaction->mode=$request->mode;
        $transaction->update();
        if($transaction)
        request()->session()->flash('transactionsuccess', 'successfully update transaction detail!!');
        return redirect()->route('transactions.index');
    }

    public function delete($id, Request $request)
    {
        $transaction=Transaction::find($id);
        $transaction->delete();
        if($transaction)
        request()->session()->flash('transactionsuccess', 'successfully delete transaction detail!!');
        return redirect()->route('transactions.index');

    }
}
