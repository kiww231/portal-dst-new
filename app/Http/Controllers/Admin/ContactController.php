<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = Contact::first();
        return view('admin.contact.form',$data);
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
        //
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
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Contact::find($id);
        $file_name = $data->banner;
        if($request->banner){
            if(File::exists(public_path('uploads/banner/'.$data->banner))){
                File::delete(public_path('uploads/banner/'.$data->banner));
            }
    
            $file_name = time() . '_contact.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/banner'), $file_name);
        }

        $input = $request->all();
        $input['banner'] = $file_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/contact')->with('success','Data Contact Berhasil diubah!');
        }else{
            return redirect('admin/contact')->with('error','Data Contact Gagal diubah!');
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
