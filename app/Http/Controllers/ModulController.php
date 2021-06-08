<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modul;

class ModulController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $modul = Modul::paginate(10);

        return view('admin.moduls.index', [
        'modul' => $modul,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $modul = Modul::all();
        
        return view('admin.moduls.create',[
            'modul'=>$modul
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
        $data = $request->all();

        Modul::create($data);

        return redirect()->route('modul.index')->with('success','Modul created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('banners.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Modul::findOrFail($id);

        return view('admin.moduls.edit', [
        'data' => $data
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
        $item = $request->all();

        $data = Modul::FindOrFail($id);
        
        $data->update($item);

        return redirect()->route('modul.index')->with('success','Edit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Modul::FindOrFail($id);
        $data->delete();

        return redirect()->route('modul.index')->withInfo('Berhasil Di Hapus');
    }
}
