<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use App\Models\tipo;
use Illuminate\Http\Request;

/**
 * Class RevistaController
 * @package App\Http\Controllers
 */
class RevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revistas = Revista::paginate();

        return view('revista.index', compact('revistas'))
            ->with('i', (request()->input('page', 1) - 1) * $revistas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $revista = new Revista();
        $tipo = Tipo::pluck('tipo');
        return view('revista.create', compact('revista','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Revista::$rules);

        $revista = Revista::create($request->all());

        return redirect()->route('revistas.index')
            ->with('success', 'Revista created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revista = Revista::find($id);
          
        return view('revista.show', compact('revista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revista = Revista::find($id);
        $tipo = Tipo::pluck('tipo');
        return view('revista.edit', compact('revista','tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Revista $revista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revista $revista)
    {
        request()->validate(Revista::$rules);

        $revista->update($request->all());

        return redirect()->route('revistas.index')
            ->with('success', 'Revista updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $revista = Revista::find($id)->delete();

        return redirect()->route('revistas.index')
            ->with('success', 'Revista deleted successfully');
    }
}
