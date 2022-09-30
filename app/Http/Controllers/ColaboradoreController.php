<?php

namespace App\Http\Controllers;

use App\Models\Colaboradore;
use App\Models\Sucursale;
use Illuminate\Http\Request;
USE PDF;

/**
 * Class ColaboradoreController
 * @package App\Http\Controllers
 */
class ColaboradoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Colaboradore::paginate();

        return view('colaboradore.index', compact('colaboradores'))
            ->with('i', (request()->input('page', 1) - 1) * $colaboradores->perPage());
    }
    public function PDF()
    {
        $colaboradores = Colaboradore::paginate();
        $pdf = PDF::loadView('colaboradore.pdf',['colaboradores' => $colaboradores ] );
        return $pdf->stream();      
          //return view('colaboradore.pdf',compact('colaboradores',));
    }
    
    public function create()
    {
        $colaboradore = new Colaboradore();
        $sucursale = Sucursale::pluck('nombre','id');
        return view('colaboradore.create', compact('colaboradore','sucursale' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Colaboradore::$rules);

        $colaboradore = Colaboradore::create($request->all());

        return redirect()->route('colaboradores.index')
            ->with('success', 'Colaboradore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colaboradore = Colaboradore::find($id);
        $sucursale= Sucursale::get('nombre');
        return view('colaboradore.show', compact('colaboradore','sucursale'));
       

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colaboradore = Colaboradore::find($id);
        $sucursale = Sucursale::pluck('nombre');
        return view('colaboradore.edit', compact('colaboradore','sucursale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Colaboradore $colaboradore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaboradore $colaboradore)
    {
        request()->validate(Colaboradore::$rules);

        $colaboradore->update($request->all());

        return redirect()->route('colaboradores.index')
            ->with('success', 'Colaboradore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $colaboradore = Colaboradore::find($id)->delete();

        return redirect()->route('colaboradores.index')
            ->with('success', 'Colaboradore deleted successfully');
    }
}
