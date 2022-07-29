<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\ProjectsAttribute;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Projects::all();
        return view('admin.projects.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.form');
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
            'title' => 'required|unique:projects',
            'client' => 'required',
            'category' => 'required',
            'date' => 'required',
            'description' => 'required|min:500',
            'is_active' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $thumbnail_name = time() . '_thumbnail.' . $request->file('thumbnail')->extension();
        $request->file('thumbnail')->move(public_path('storage/projects'), $thumbnail_name);

        $image_name = time() . '_image.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('storage/projects'), $image_name);
        
        $banner_name = time() . '_banner.' . $request->file('banner')->extension();
        $request->file('banner')->move(public_path('storage/projects'), $banner_name);

        $data = $request->all();
        $data['date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->date)));
        $data['thumbnail'] = $thumbnail_name;
        $data['image'] = $image_name;
        $data['banner'] = $banner_name;
        $data['slug'] = Str::slug($request->title);
        $status = Projects::create($data);

        if($status){
            return redirect('admin/projects')->with('success','Data projects Berhasil ditambahkan!');
        }else{
            return redirect('admin/projects')->with('error','Data projects Gagal ditambahkan!');
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
        $data['result'] = Projects::find($id);
        return view('admin.projects.form',$data);
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
            'title' => 'required|unique:projects,id,'.$id,
            'client' => 'required',
            'category' => 'required',
            'date' => 'required',
            'description' => 'required|min:500',
            'is_active' => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Projects::find($id);
        
        $thumbnail_name = $data->thumbnail;
        $image_name = $data->image;
        $banner_name = $data->banner;
        if($request->thumbnail){
            if(File::exists(public_path('storage/projects/'.$data->thumbnail))){
                File::delete(public_path('storage/projects/'.$data->thumbnail));
            }
    
            $thumbnail_name = time() . '_thumbnail.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('storage/projects'), $thumbnail_name);
        }
        if($request->image){
            if(File::exists(public_path('storage/projects/'.$data->image))){
                File::delete(public_path('storage/projects/'.$data->image));
            }
    
            $image_name = time() . '_image.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('storage/projects'), $image_name);
        }
        if($request->banner){
            if(File::exists(public_path('storage/projects/'.$data->banner))){
                File::delete(public_path('storage/projects/'.$data->banner));
            }
    
            $banner_name = time() . '_banner.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('storage/projects'), $banner_name);
        }
        $input = $request->all();
        $input['date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->date)));
        $input['thumbnail'] = $thumbnail_name;
        $input['image'] = $image_name;
        $input['banner'] = $banner_name;
        $input['slug'] = Str::slug($request->title);
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/projects')->with('success','Data projects Berhasil diubah!');
        }else{
            return redirect('admin/projects')->with('error','Data projects Gagal diubah!');
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
        $data = Projects::find($id);

        if(File::exists(public_path('storage/projects/'.$data->thumbnail))){
            File::delete(public_path('storage/projects/'.$data->thumbnail));
        }

        if(File::exists(public_path('storage/projects/'.$data->image))){
            File::delete(public_path('storage/projects/'.$data->image));
        }

        if(File::exists(public_path('storage/projects/'.$data->banner))){
            File::delete(public_path('storage/projects/'.$data->banner));
        }
        
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    public function attribute()
    {
        $data['result'] = ProjectsAttribute::first();
        return view('admin.projects.form-attribute',$data);
    }

    public function attributeUpdate(Request $request, $id)
    {
        $request->validate([
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = ProjectsAttribute::find($id);
        $banner_name = $data->banner;
        if($request->banner){
            if(File::exists(public_path('storage/banner/'.$data->banner))){
                File::delete(public_path('storage/banner/'.$data->banner));
            }
    
            $banner_name = time() . '_projects_attribute.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('storage/banner'), $banner_name);
        }

        $input = $request->all();
        $input['banner'] = $banner_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/projects-attribute')->with('success','Data Attribute projects Berhasil diubah!');
        }else{
            return redirect('admin/projects-attribute')->with('error','Data Attribute projects Gagal diubah!');
        }
    }
}
