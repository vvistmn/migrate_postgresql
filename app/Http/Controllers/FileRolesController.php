<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileRole;
use Illuminate\Support\Facades\Session;

class FileRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.roles.index', [
            'fileRoles' => FileRole::orderBy('fr_id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.roles.create');
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
            'fr_name' => 'required|unique:file_roles|min:4|max:255',
        ]);

        FileRole::create($inputs);
        session()->flash('successfully_message', 'Роль '.$inputs['fr_name'].' была успешно добавлена');
        return redirect()->route('roles.index');
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
        return view('files.roles.edit', [
            'fileRole' => FileRole::findOrFail($id),
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
            'fr_name' => 'required|min:4|max:255',
        ]);

        $fileRole = FileRole::findOrFail($id);
        $fileRole->update($inputs);

        session()->flash('successfully_message', 'Роль '.$inputs['fr_name'].' была успешно изменена');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileRole = FileRole::findOrFail($id);

        $fileRole->delete();
        
        Session::flash('successfully_message', 'Роль '.$fileRole->fr_name.' была успешно удалена');
        return redirect()->route('roles.index');
    }
}
