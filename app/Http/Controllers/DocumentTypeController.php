<?php

namespace App\Http\Controllers;

use App\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docTypes = DocumentType::orderBy('dt_id', 'desc')->get();
        return view('document-type.index', [
            'docTypes' => $docTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'dt_type' => 'required|unique:document_types|min:4|max:255',
        ]);

        DocumentType::create($inputs);
        session()->flash('successfully_message', 'Тип документа '.$inputs['dt_type'].' был успешно добавлен');
        return redirect()->route('document-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('document-type.edit', [
            'docType' => DocumentType::findOrFail($id),
        ]);
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
        $inputs = $request->validate([
            'dt_type' => 'required|min:4|max:255',
        ]);

        $docType = DocumentType::findOrFail($id);
        $docType->update($inputs);

        session()->flash('successfully_message', 'Тип документа '.$inputs['dt_type'].' был успешно изменен');
        return redirect()->route('document-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docType = DocumentType::findOrFail($id);

        $docType->delete();
        
        Session::flash('successfully_message', 'Тип документа '.$docType->dt_type.' был успешно удален');
        return redirect()->route('document-type.index');
    }
}
