@extends('layouts.dashboard')

@section('content')
    <div class="iq-card-header d-flex justify-content-between align-items-center">
        <div class="iq-header-title">
            <h4 class="card-title">Employee List</h4>
        </div>
        @if (Auth::user()->role == 'admin')
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal">
                <i class="las la-plus"></i>Add Employees
            </button>
        @endif
    </div>

    <table id="employees-table" class="table table-hover table-striped">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Address</th>
                <th scope="col" class="text-center">Contact</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Role</th>
                @if (Auth::user()->role == 'admin')
                    <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $pegawai)
                <tr>
                    <td class="text-center">{{ $pegawai->id }}</td>
                    <td class="text-left">{{ $pegawai->name }}</td>
                    <td class="text-left">{{ $pegawai->address }}</td>
                    <td class="text-left">{{ $pegawai->phone_number }}</td>
                    <td class="text-left">{{ $pegawai->email }}</td>
                    <td>
                        @if ($pegawai->role == 'admin')
                            <span class="badge badge-primary">
                                <i class="ri-user-star-fill"></i>
                                Admin
                            </span>
                        @else
                            <span class="badge badge-secondary">
                                <i class="ri-user-fill"></i>
                                User
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="flex align-items-center list-user-action">
                            <a onclick="openEditModal('{{ $pegawai->id }}')" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Edit" href="#">
                                <i class="ri-pencil-line"></i>
                            </a>

                            <a onclick="deleteUser('{{ $pegawai->id }}')" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Delete" href="#">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Employees</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="form-group">
                            <label for="addName" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="addName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="addAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="addAddress" rows="3" name="address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="addPhoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="addPhoneNumber" name="phone_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="addEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="addEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="addRole">Role</label>
                            <select class="form-control" id="addRole" name="role">
                                <option value="admin">Admin</option>
                                <option value="user" selected>User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="addPassword" name="password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="createUser()" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Employee Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="editName" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="editAddress" rows="3" name="address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editPhoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="editPhoneNumber" name="phone_number"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="editRole">Role</label>
                            <select class="form-control" id="editRole" name="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editPassword" name="password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editUser()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Ensure function is defined in the global scope
        $('#addModal').on('show.bs.modal', function(e) {
            $('#addForm').trigger('reset');
            $('#addForm input').removeClass('is-invalid');
            $('#addForm .invalid-feedback').remove();
        })

        $('#addModal').on('show.bs.modal', function(e) {
            $('#editForm input').removeClass('is-invalid');
            $('#editForm .invalid-feedback').remove();
        })

        function createUser() {
            // Reset form and error states

            const url = "{{ route('api.employee.store') }}";

            let data = {
                name: $('#addName').val(),
                address: $('#addAddress').val(),
                phone_number: $('#addPhoneNumber').val(),
                email: $('#addEmail').val(),
                role: $('#addRole').val(),
                password: $('#addPassword').val(),
            };

            $.post(url, data)
                .done((response) => {
                    toastr.success(response.message, 'Success');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail((error) => {
                    let response = error.responseJSON;
                    toastr.error(response.message, 'Error');
                    if (response.errors) {
                        for (const error in response.errors) {
                            let input = $(`#addForm input[name="${error}"]`);
                            input.addClass('is-invalid');
                            let feedbackElement = `<div class="invalid-feedback"><ul class="list-unstyled">`;
                            response.errors[error].forEach((message) => {
                                feedbackElement += `<li>${message}</li>`;
                            });
                            feedbackElement += `</ul></div>`;
                            input.after(feedbackElement);
                        }
                    }
                });
        }

        function editUser() {
            let url = "{{ route('api.employee.update', ':userId') }}";
            url = url.replace(':userId', userId);

            let data = {
                name: $('#editName').val(),
                address: $('#editAddress').val(),
                phone_number: $('#editPhoneNumber').val(),
                email: $('#editEmail').val(),
                role: $('#editRole').val(),
                password: $('#editPassword').val(),
                _method: 'PUT'
            };

            $.post(url, data)
                .done((response) => {
                    toastr.success(response.message, 'Success');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail((error) => {
                    let response = error.responseJSON;
                    toastr.error(response.message, 'Error');
                    if (response.errors) {
                        for (const error in response.errors) {
                            let input = $(`#editForm input[name="${error}"]`);
                            input.addClass('is-invalid');
                            let feedbackElement = `<div class="invalid-feedback"><ul class="list-unstyled">`;
                            response.errors[error].forEach((message) => {
                                feedbackElement += `<li>${message}</li>`;
                            });
                            feedbackElement += `</ul></div>`;
                            input.after(feedbackElement);
                        }
                    }
                });
        }

        function deleteUser(userId) {
            Swal.fire({
                title: 'Confirm Delete',
                text: 'The user will be deleted, you cannot restore it again!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes!',
                cancelButtonText: 'Close',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('api.employee.destroy', ':userId') }}";
                    url = url.replace(':userId', userId);

                    $.post(url, {
                        _method: 'DELETE'
                    }).done((response) => {
                        toastr.success('User has been deleted', 'Success');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }).fail((error) => {
                        toastr.error('Failed to delete user', 'Error');
                    });
                }
            });
        }

        function openEditModal(id) {
            userId = id;
            let url = "{{ route('api.employee.show', ':userId') }}";
            url = url.replace(':userId', userId);

            $.get(url).done((response) => {
                $('#editName').val(response.data.name);
                $('#editAddress').val(response.data
                    .address); // Corrected from response.data.role to response.data.address
                $('#editPhoneNumber').val(response.data.phone_number);
                $('#editEmail').val(response.data.email);
                $('#editRole').val(response.data.role);
                $('#editModal').modal('show');
            }).fail((error) => {
                toastr.error('Failed to retrieve user data', 'Error');
            });
        }

        // Initialize DataTables
        $(document).ready(function() {
            new DataTable('#employees-table');
        });
    </script>
@endpush
