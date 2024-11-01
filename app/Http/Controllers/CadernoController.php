<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCadernoRequest;
use App\Http\Requests\UpdateCadernoRequest;
use App\Models\Caderno;

class CadernoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Carregue os dados dos banco
        //select * from cadernos
        $cadernos = Caderno::paginate(25);
        // Fazer o response pro usuario
        return view('admin.cadernos.index', compact('cadernos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Retornar a pagina de criação
        return view('admin.cadernos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCadernoRequest $request)
    {
        Caderno::create($request->all());

        return redirect()->away('/admin/cadernos')
            ->with('success', 'Caderno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $caderno = Caderno::find($id);
        return view('admin.cadernos.show', compact('caderno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $caderno = Caderno::find($id);
        return view('admin.cadernos.edit', compact('caderno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCadernoRequest $request, $id)
    {
        //
        $caderno = Caderno::find($id);
        $caderno->update($request->all());
        return redirect()->away('/admin/cadernos')
            ->with('success', 'Caderno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $caderno = Caderno::find($id);
        if ($caderno->noticias()->count() > 0) {
            return redirect()->away('/admin/cadernos')
                ->with('error', 'Caderno possui dependentes!');
        } 
            $caderno->delete();
            return redirect()->away('/admin/cadernos')
                ->with('success', 'Caderno removido com sucesso!');
        }
    }

