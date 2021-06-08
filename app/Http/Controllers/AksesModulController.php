<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AksesModul;
use App\Modul;
use App\UserRole;

class AksesModulController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $akses = AksesModul::paginate(10);
        $role = UserRole::all();

        return view('admin.akses_moduls.index', [
        'akses' => $akses,
        'role'=> $role,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$akses = AksesModul::all();
        $modul = Modul::all();
        $user_role = UserRole::all();
        
        return view('admin.akses_moduls.create',[
            'modul'=>$modul,
            'user_role'=>$user_role,
            'akses'=>$akses,
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

        AksesModul::create($data);

        return redirect()->route('akses.index')->with('success','Akses Modul created successfully.');
        
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
