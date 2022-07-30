<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attributes;
use File;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = Attributes::first();
        return view('admin.attributes.form',$data);
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
     * Store a newly created resource in uploads.
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
        
    }

    /**
     * Update the specified resource in uploads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'copyright' => 'required',
            'favicon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'logo_white' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Attributes::find($id);
        $favicon_name = $data->favicon;
        $logo_name = $data->logo;
        $logo_white_name = $data->logo_white;
        if($request->favicon){
            if(File::exists(public_path('uploads/attributes/'.$data->favicon))){
                File::delete(public_path('uploads/attributes/'.$data->favicon));
            }
    
            $favicon_name = time() . '_favicon.' . $request->file('favicon')->extension();
            $request->file('favicon')->move(public_path('uploads/attributes'), $favicon_name);
        }

        if($request->logo){
            if(File::exists(public_path('uploads/attributes/'.$data->logo))){
                File::delete(public_path('uploads/attributes/'.$data->logo));
            }
    
            $logo_name = time() . '_logo.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/attributes'), $logo_name);
        }
        
        if($request->logo_white){
            if(File::exists(public_path('uploads/attributes/'.$data->logo_white))){
                File::delete(public_path('uploads/attributes/'.$data->logo_white));
            }
    
            $logo_white_name = time() . '_logo_white.' . $request->file('logo_white')->extension();
            $request->file('logo_white')->move(public_path('uploads/attributes'), $logo_white_name);
        }

        $input = $request->all();
        $input['favicon'] = $favicon_name;
        $input['logo'] = $logo_name;
        $input['logo_white'] = $logo_white_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/attributes')->with('success','Data Attributes Berhasil diubah!');
        }else{
            return redirect('admin/attributes')->with('error','Data Attributes Gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from uploads.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
