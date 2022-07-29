<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Team::all();
        return view('admin.team.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.form');
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
            'name' => 'required',
            'position' => 'required',
            'is_active' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file_name = time() . '_team.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('storage/team'), $file_name);

        $data = $request->all();
        $data['image'] = $file_name;
        $status = Team::create($data);

        if($status){
            return redirect('admin/team')->with('success','Data Team Berhasil ditambahkan!');
        }else{
            return redirect('admin/team')->with('error','Data Team Gagal ditambahkan!');
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
        $data['result'] = Team::find($id);
        return view('admin.team.form',$data);
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
            'name' => 'required',
            'position' => 'required',
            'is_active' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Team::find($id);
        $file_name = $data->image;
        if($request->image){
            if(File::exists(public_path('storage/team/'.$data->image))){
                File::delete(public_path('storage/team/'.$data->image));
            }
    
            $file_name = time() . '_team.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('storage/team'), $file_name);
        }

        $input = $request->all();
        $input['image'] = $file_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/team')->with('success','Data Team Berhasil diubah!');
        }else{
            return redirect('admin/team')->with('error','Data Team Gagal diubah!');
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
        $data = Team::find($id);

        if(File::exists(public_path('storage/team/'.$data->image))){
            File::delete(public_path('storage/team/'.$data->image));
        }
        
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
