<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('admin.admin_profile');
    }
}
