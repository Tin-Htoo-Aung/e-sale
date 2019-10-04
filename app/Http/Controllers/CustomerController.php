<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Bank;
use App\Sale;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankchk = Bank::where('user_id', Auth::user()->id)->first();
        $sales = Sale::where('user_id', Auth::user()->id)->get();

        if($bankchk==null){            
            return view("customers.create");
        }else{
            return view("customers.index",[
                "sales" => $sales,
            ]);
        }
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
        $bank = new Bank();
        $bank->account = $request->cardno;
        $bank->cvv = $request->cvv;
        $bank->expired = $request->exp;
        $bank->balance = 1000000000;
        $bank->user_id = Auth::user()->id;
        $bank->save();

        $sales = Sale::where('user_id', Auth::user()->id)->get();

        return view("customers.index",[
            "sales" => $sales,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
