<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

/**
 * Class TipoController
 * @package App\Http\Controllers
 */
class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::paginate();

        return view('tipo.index', compact('tipos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = new Tipo();
        return view('tipo.create', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipo::$rules);

        $tipo = Tipo::create($request->all());

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = Tipo::find($id);

        return view('tipo.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Tipo::find($id);

        return view('tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipo $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        request()->validate(Tipo::$rules);

        $tipo->update($request->all());

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipo = Tipo::find($id)->delete();

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo deleted successfully');
    }
}
