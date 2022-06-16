<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarritoRequest;
use App\Http\Requests\UpdateCarritoRequest;
use App\Models\Carrito;
use App\Models\Zapato;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::all();

        return view('carritos.index', [
            'carritos' => $carritos->where('user_id', Auth::user()->id),
        ]);
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
     * @param  \App\Http\Requests\StoreCarritoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarritoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarritoRequest  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarritoRequest $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }

    public function anadiralcarrito(Zapato $zapato)
    {
        $carrito = Carrito::where('zapato_id', $zapato->id)->where('user_id', auth()->user()->id)->first();

        if (empty($carrito)) {

            $carrito = new Carrito();

            $carrito->user_id = Auth::user()->id;
            $carrito->zapato_id = $zapato->id;
            $carrito->cantidad = 1;

            $carrito->save();

            return redirect()->route('zapatos.index')->with('success', 'Zapato añadido al carrito.');
        }

        $carrito->cantidad += 1;
        $carrito->save();

        return redirect()->route('zapatos.index')->with('success', 'Zapato anadido al carrito.');
    }

    public function restar(Carrito $carrito)
    {

        if ($carrito->cantidad === 1) {
            $carrito->delete();


            return redirect()->route('carritos.index')->with('success', 'Zapato borrado del carrito.');
        }

        $carrito->cantidad -= 1;
        $carrito->save();

        return redirect()->route('carritos.index')->with('success', 'Zapato restado al carrito.');
    }

    public function sumar(Carrito $carrito)
    {
        $carrito->cantidad += 1;
        $carrito->save();

        return redirect()->route('carritos.index')->with('success', 'Zapato sumado al carrito.');
    }

    public function vaciar()
    {
        $carrito = Carrito::where('user_id', auth()->user()->id);
        $carrito->delete();

        return redirect()->route('carritos.index')->with('success', 'Carrito vaciado con exito.');
    }
}
