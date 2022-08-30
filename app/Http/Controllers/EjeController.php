<?php

namespace App\Http\Controllers;

use App\Models\Eje;
use App\Models\Manuale;
use Illuminate\Http\Request;

/**
 * Class EjeController
 * @package App\Http\Controllers
 */
class EjeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejes = Eje::paginate();

        return view('eje.index', compact('ejes'))
            ->with('i', (request()->input('page', 1) - 1) * $ejes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eje = new Eje();
        $manuale =Manuale::pluck('nombre','id');
        return view('eje.create', compact('eje','manuale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Eje::$rules);

        $eje = Eje::create($request->all());

        return redirect()->route('ejes.index')
            ->with('success', 'Eje creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eje = Eje::find($id);

        return view('eje.show', compact('eje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eje = Eje::find($id);
        $manuale =Manuale::pluck('nombre','id');
        return view('eje.edit', compact('eje','manuale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Eje $eje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eje $eje)
    {
        request()->validate(Eje::$rules);

        $eje->update($request->all());

        return redirect()->route('ejes.index')
            ->with('success', 'Eje editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $eje = Eje::find($id)->delete();

        return redirect()->route('ejes.index')
            ->with('success', 'Eje eliminado correctamente');
    }
}
