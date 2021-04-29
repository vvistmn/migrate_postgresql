<?php

namespace App\Http\Controllers;

use App\Attr;
use Illuminate\Http\Request;


class AttrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attrs = Attr::orderBy('attr_id', 'desc')->get();
        return view('attrs.index', [
            'attrs' => $attrs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attrs = Attr::pluck('attr_name', 'attr_id');
        return view('attrs.create', [
            'attrs' => $attrs,
        ]);
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
            'attr_name' => 'required|unique:attrs|min:4|max:255',
            'attr_code' => 'required|unique:attrs|min:4|max:255',
            'attr_descr' => 'required',
            'attr_value_type' => 'required|min:4|max:255',
            'attr_is_etalon' => '',
            'parent_attr_id' => '',
            'etalon_attr_id' => '',
        ]);

        Attr::create($inputs);

        $request->session()->flash('successfully_message', 'Тип дополнительного атрибута ЭД '.$inputs['attr_name'].' был успешно добавлен');
        return redirect()->route('attrs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attrs = Attr::pluck('attr_name', 'attr_id');
        return view('attrs.edit', [
            'attrs' => $attrs,
            'attr' => Attr::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attrs = Attr::pluck('attr_name', 'attr_id');
        return view('attrs.edit', [
            'attrs' => $attrs,
            'attr' => Attr::findOrFail($id),
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
            'attr_name' => 'required|min:4|max:255',
            'attr_code' => 'required|min:4|max:255',
            'attr_descr' => 'required',
            'attr_value_type' => 'required|min:4|max:255',
            'attr_is_etalon' => '',
            'parent_attr_id' => '',
            'etalon_attr_id' => '',
        ]);

        if (empty($inputs['attr_is_etalon'])) {
            $inputs['attr_is_etalon'] = false;
        }

        $attr = Attr::findOrFail($id);
        $attr->update($inputs);

        $request->session()->flash('successfully_message', 'Тип дополнительного атрибута ЭД '.$inputs['attr_name'].' был успешно добавлен');
        return redirect()->route('attrs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $attr = Attr::findOrFail($id);
        $attrs = Attr::where('parent_attr_id', $attr->attr_id)->orWhere('etalon_attr_id', $attr->attr_id)->get();

        foreach ($attrs as $key => $val) {
            if($val->parent_attr_id == $attr->attr_id) {
                $val->parent_attr_id = null;
                $val->save();
            }

            if($val->etalon_attr_id == $attr->attr_id) {
                $val->etalon_attr_id = null;
                $val->save();
            }
        }

        $attr->delete();
        
        $request->session()->flash('successfully_message', 'Тип документа '.$attr->attr_name.' был успешно удален');
        return redirect()->route('attrs.index');
    }
}
