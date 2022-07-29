<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['career'] = Career::where('slug',$id)->first();
        return view('recruitment',$data);
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
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'application_letter' => 'required|mimes:pdf|max:2048',
            'cv' => 'required|mimes:pdf|max:2048',
            'attachment1' => 'required|mimes:pdf|max:2048',
            'attachment2' => 'mimes:pdf|max:2048',
        ]);
        
        $name_string = str_replace(' ', '', $request->name);
        $name_lower = strtolower($name_string);
        
        $app_letter_name = time() . '_app_letter_' . $name_lower . '.' . $request->file('application_letter')->extension();
        $request->file('application_letter')->move(public_path('storage/recruiment'), $app_letter_name);

        $cv_name = time() . '_cv_' . $name_lower . '.' . $request->file('cv')->extension();
        $request->file('cv')->move(public_path('storage/recruiment'), $cv_name);

        $att1_name = time() . '_att1_' . $name_lower . '.' . $request->file('attachment1')->extension();
        $request->file('attachment1')->move(public_path('storage/recruiment'), $att1_name);

        $att2_name = null;
        if ($request->attachment2) {
            $att2_name = time() . '_att2_' . $name_lower . '.' . $request->file('attachment2')->extension();
            $request->file('attachment2')->move(public_path('storage/recruiment'), $att2_name);
        }

        $data = $request->all();
        $data['application_letter'] = $app_letter_name;
        $data['date_of_birth'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->date_of_birth)));
        $data['date'] = date('Y-m-d');
        $data['cv'] = $cv_name;
        $data['attachment1'] = $att1_name;
        $data['attachment2'] = $att2_name;
        $status = Recruitment::create($data);

        if($status){
            return redirect('recruitment')->with('success','Data Lamaran Anda Berhasil dikirim!');
        }else{
            return redirect('recruitment')->with('error','Data Lamaran Anda Gagal dikirim!');
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
        //
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
