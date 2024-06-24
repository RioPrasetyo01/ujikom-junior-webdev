<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function webIndex(){
        $data['title'] = 'Users';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
        $data['breadcrumbs'] []=[
            'title'=>'Users',
            'url'=>'users.index'
        ];

        $users = User::orderBy('name')->get();
        $data['users'] = $users;

        return view('pages.users.index',$data);
    }

    public function index()
    {
        $users = User::orderBy('id','asc')->get();
        return response()->json([
            'message' => 'Berhasil menampilkan data user',
            'data' => $users
        ] ,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'phone_number'  => [
                'nullable',
            ],
            'address'  => [
                'nullable',
            ],
            'avatar'  => [
                'nullable',
            ],
            'role'  => [
                'required',
                'in:admin,user'
            ],
        ]);

        $user = User::create($validated);

        return response()->json([
            'message' => 'Berhasil menambahkan user baru',
            'data' => $user
        ] , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'message' => 'Berhasil menampilkan detail user',
            'data' => $user
        ] , 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $id
            ],
            'password' => [
                'nullable',
                'min:8'
            ],
            'phone_number'  => [
                'nullable',
            ],
            'address'  => [
                'nullable',
            ],
            'avatar'  => [
                'nullable',
            ],
            'role'  => [
                'required',
                'in:admin,user'
            ],
        ]);

        //jika ada password baru, maka update password
        if ($request->filled('password')){
            $validated['password'] = bcrypt($validated['password']);
        }else{
            unset($validated['password']);
        }

        $user = User::find($id);
        $user->update($validated);

        return response()->json([
            'message' => 'Berhasil mengupdate data user',
            'data' => $user
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'message' => 'Berhasil menghapus data user',
            'data' => $user
        ] , 200);
    }
}
