<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\funkoPop;
use App\Models\Product;

class FunkoPopController extends Controller
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

    public function showCreateForm()
    {
        return view('pages.addFunkoPops');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::user()->user_is_admin === true) {
            $this->validate($request, [
                'name'      => 'required|string|max:255',
                'number_pop' => 'required|integer',
                'price'     => 'required|integer',
                'stock_quantity'     => 'required|integer',
                'url'       => 'required|string',
                'year'      => 'required|integer',
                'sku'       => 'required|string',
            ]);

            $product = Product::create([
                'name' => $request['name'],
                'price' => $request['price'],
                'stock_quantity' => $request['stock_quantity'],
                'url' => $request['url'],
                'year' => $request['year'],
                'rating' => 0,
                'sku' => $request['sku'],
            ]);


            funkoPop::create([
                'id_product' => $product->id_product,
                'number_pop' => $request['number_pop'],
            ]);

            return redirect('addFunkoPops');
        }
        return redirect('products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\funkoPop  $funkoPop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funkoPop = funkoPop::find($id);
        return view('pages.funkoPop', ['funkoPop' => $funkoPop]);
    }

    /**
     * Shows all products
     *
     * @return Response
     */
    public function list()
    {
        $funkoPops = funkoPop::all();
        return view('pages.funkoPops', ['funkoPops' => $funkoPops]);
    }

    public function showUpdateForm()
    {
        return view('pages.updateFunkoPop');
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
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'number_pop' => 'required|integer',
            'price'     => 'required|integer',
            'stock'     => 'required|integer',
            'url'       => 'required|string',
            'year'      => 'required|integer',
            'sku'       => 'required|string',
        ]);

        $funko = funkoPop::find($id);
        $funko->done = $request->input('done');
        $funko->save();
        $product = Product::find($id);
        $product->done = $request->input('done');
        $product->save();
        return $funko;
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