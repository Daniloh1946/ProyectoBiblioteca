<?php

namespace App\Http\Controllers;

use App\Models\Sucursale;
use Illuminate\Http\Request;

/**
 * Class SucursaleController
 * @package App\Http\Controllers
 */
class SucursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursale::paginate();

        return view('sucursale.index', compact('sucursales'))
            ->with('i', (request()->input('page', 1) - 1) * $sucursales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursale = new Sucursale();
        return view('sucursale.create', compact('sucursale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sucursale::$rules);

        $sucursale = Sucursale::create($request->all());

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sucursale = Sucursale::find($id);

        return view('sucursale.show', compact('sucursale',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursale = Sucursale::find($id);

        return view('sucursale.edit', compact('sucursale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sucursale $sucursale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursale $sucursale)
    {
        request()->validate(Sucursale::$rules);

        $sucursale->update($request->all());

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sucursale = Sucursale::find($id)->delete();

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursale deleted successfully');
    }
}
