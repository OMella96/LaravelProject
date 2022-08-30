<?php

namespace App\Http\Controllers;

use App\Models\Manuale;
use Illuminate\Http\Request;

/**
 * Class ManualeController
 * @package App\Http\Controllers
 */
class ManualeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuales = Manuale::paginate();

        return view('manuale.index', compact('manuales'))
            ->with('i', (request()->input('page', 1) - 1) * $manuales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manuale = new Manuale();
        return view('manuale.create', compact('manuale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Manuale::$rules);

        $manuale = Manuale::create($request->all());

        return redirect()->route('manuales.index')
            ->with('success', 'Manual creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manuale = Manuale::find($id);

        return view('manuale.show', compact('manuale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manuale = Manuale::find($id);

        return view('manuale.edit', compact('manuale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Manuale $manuale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manuale $manuale)
    {
        request()->validate(Manuale::$rules);

        $manuale->update($request->all());

        return redirect()->route('manuales.index')
            ->with('success', 'Manual editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $manuale = Manuale::find($id)->delete();

        return redirect()->route('manuales.index')
            ->with('success', 'Manual eliminado correctamente');
    }
}
