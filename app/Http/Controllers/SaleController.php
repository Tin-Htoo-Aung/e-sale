<?php

namespace App\Http\Controllers;

use App\Sale;
use Auth;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view("sales.index",[
            "sales" => $sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("sales.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale();
        if($request->hasFile('photo')){
            $sale->photo = $request->photo->store("post_images","public");
        }else{
            $sale->photo = "images/logo.png";
        }
        $sale->name = $request->name;
        $sale->description = $request->description;
        $sale->condition = $request->condition;
        $sale->price = $request->price;
        $sale->transfer = $request->gmoney;
        $sale->service = $request->smoney;
        $sale->user_id = Auth::user()->id;
        $sale->save();

        $sales = Sale::where('user_id', Auth::user()->id)->get();
        
        return view("customers.index",[
            "sales" => $sales,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view("sales.show",[
            "sale" => $sale,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
