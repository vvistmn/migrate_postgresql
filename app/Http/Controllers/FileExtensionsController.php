<?php

namespace App\Http\Controllers;

use App\FileExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FileExtensionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.extensions.index', [
            'fileExtensions' => FileExtension::orderBy('fe_id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.extensions.create');
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
            'fe_name' => 'required|unique:file_extensions|min:4|max:255',
        ]);

        FileExtension::create($inputs);
        session()->flash('successfully_message', 'Тип '.$inputs['fe_name'].' был успешно добавлен');
        return redirect()->route('extensions.index');
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
        return view('files.extensions.edit', [
            'fileExtension' => FileExtension::findOrFail($id),
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
            'fe_name' => 'required|min:4|max:255',
        ]);

        $fileRole = FileExtension::findOrFail($id);
        $fileRole->update($inputs);

        session()->flash('successfully_message', 'Тип '.$inputs['fe_name'].' был успешно изменен');
        return redirect()->route('extensions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileExtension = FileExtension::findOrFail($id);

        $fileExtension->delete();
        
        Session::flash('successfully_message', 'Тип '.$fileExtension->fe_name.' был успешно удален');
        return redirect()->route('extensions.index');
    }
}
