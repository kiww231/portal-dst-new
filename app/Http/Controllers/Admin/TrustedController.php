<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trusted;
use File;

class TrustedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = Trusted::first();
        return view('admin.trusted.form',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'is_active' => 'required',
        ]);
        if($request->is_active == 1){
            $request->validate([
                'title' => 'required',
                'trusted' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }

        $data = Trusted::find($id);
        $file_name = $data->image;
        if($request->image){
            if(File::exists(public_path('storage/trusted/'.$data->image))){
                File::delete(public_path('storage/trusted/'.$data->image));
            }
    
            $file_name = time() . '_trusted.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('storage/trusted'), $file_name);
        }

        $input = $request->all();
        $input['image'] = $file_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/trusted')->with('success','Data Trusted Berhasil diubah!');
        }else{
            return redirect('admin/trusted')->with('error','Data Trusted Gagal diubah!');
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
        //
    }
}
