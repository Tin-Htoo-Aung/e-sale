<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Sale;
use Auth;
use DB;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adminbank = Bank::where('id', 1)->first();
        $sellerbank = Bank::where('user_id', $request->seller)->first();
        $buyerbank = Bank::where('user_id', Auth::user()->id)->first();

        //buyer
        DB::table('banks')
        ->where('user_id', Auth::user()->id)
        ->update(['balance' => (($buyerbank->balance)-($request->itemprice))]);

        
        $payseller = (93*($request->itemprice))/100;
        DB::table('banks')
        ->where('user_id', $request->seller)
        ->update(['balance' => (($sellerbank->balance)+$payseller)]);

        $payadmin = (7*($request->itemprice))/100;
        DB::table('banks')
        ->where('id', 1)
        ->update(['balance' => (($adminbank->balance)+$payadmin)]);

        return view("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
