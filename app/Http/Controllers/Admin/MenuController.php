<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Menu::all();
        return view('admin.menu.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['parent'] = Menu::where('parent',0)->get();
        return view('admin.menu.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'path' => 'required',
            'parent' => 'required',
            'is_active' => 'required',
        ]);

        $data = $request->all();
        $status = Menu::create($data);

        if($status){
            return redirect('admin/menu')->with('success','Data Menu Berhasil ditambahkan!');
        }else{
            return redirect('admin/menu')->with('error','Data Menu Gagal ditambahkan!');
        }
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
        $data['result'] = Menu::find($id);
        $data['parent'] = Menu::where('parent',0)->get();
        return view('admin.menu.form',$data);
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
        $request->validate([
            'title' => 'required',
            'path' => 'required',
            'parent' => 'required',
            'is_active' => 'required',
        ]);

        $data = Menu::find($id);
        $input = $request->all();
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/menu')->with('success','Data Menu Berhasil diubah!');
        }else{
            return redirect('admin/menu')->with('error','Data Menu Gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::find($id);
        $status = $data->delete();
        
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
