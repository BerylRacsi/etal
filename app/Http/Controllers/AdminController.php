<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *  
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('role:ROLE_ADMIN');*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole(['ROLE_ADMIN'])) {
            return view('admin/index');
        }
        //if logged in contributor try to access /admin
        elseif ($request->user()->hasRole(['ROLE_CONTRIBUTOR'])){
            return redirect('contributor');
        }
        //$request->user()->authorizeRoles(['ROLE_ADMIN']);
        
    }
}
