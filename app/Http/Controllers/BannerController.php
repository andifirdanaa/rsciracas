<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $no = 1;
        $banner = Banner::paginate(10);
        return view("admin.banners.index",[
            'banner' => $banner,
            'no' => $no
        ]);
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        // return redirect('/siswa')-> with('sukses','Data Berhasil Diinput');
        $banner = Banner::all();
        
        return view('admin.banners.create',[
            'banner'=>$banner
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
        $this->validate($request,[
        'image'=> 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);
        $data = $request->all();
        if($request->image){
            $data['image'] = $request->file('image');
            $fileName = time().'.'.$data['image']->getClientOriginalExtension();
            $destinationPath = public_path('images/');
            $data['image']->move($destinationPath , $fileName);
            $data['image'] = $fileName;
        }

        Banner::create($data);

        return redirect()->route('banner.index')->with('success','Banner created successfully.');
        
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
        $data = Banner::findOrFail($id);

        return view('admin.banners.edit', [
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
        if($request->image){
            $item['image'] = $request->file('image');
            $fileName = time().'.'.$item['image']->getClientOriginalExtension();
            $destinationPath = public_path('images/'.$id);
            $item['image']->move($destinationPath , $fileName);
            $item['image'] = $fileName;
        }

        $data = Banner::FindOrFail($id);
        
        $data->update($item);

        return redirect()->route('banner.index')->with('success','Edit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banner::FindOrFail($id);
        $data->delete();

        return redirect()->route('banner.index')->withInfo('Berhasil Di Hapus');
    }
}
