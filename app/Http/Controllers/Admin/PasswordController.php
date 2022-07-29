<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    public function reset($id)
    {
        $data = User::find($id);
        $data->password = Hash::make('rahasia');
        $status = $data->save();

        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
