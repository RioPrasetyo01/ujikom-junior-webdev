@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="ri-user-fill mr-2"></i>
            <span>User Logged In</span>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->phone_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
