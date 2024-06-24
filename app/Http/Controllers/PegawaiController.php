<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data['title'] = 'Employees';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
        $data['breadcrumbs'] []=[
            'title'=>'Employees',
            'url'=>'employees.index'
        ];

        $users = User::orderBy('name','asc')->get();

        $data['employees'] = $users;

        return view('pages.employees.index',$data);
    }

    public function details()
    {
        $data['title'] = 'Employees';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
        $data['breadcrumbs'] []=[
            'title'=>'Employee Details',
            'url'=>'employees.details'
        ];

        $users = User::orderBy('name','asc')->get();

        $data['employees'] = $users;

        return view('pages.employees.details',$data);
    }

    public function index_dashboard()
    {
        $user = Auth::user();

        return view('pages.dashboard', compact('user'));
    }
}
