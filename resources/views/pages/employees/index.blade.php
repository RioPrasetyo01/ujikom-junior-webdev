@extends('layouts.dashboard')

@section('content')
    <div class="iq-card-header d-flex justify-content-between align-items-center">
        <div class="iq-header-title">
            <h4 class="card-title">Employee List</h4>
        </div>
    </div>

    <table id="employees-table" class="table table-hover table-striped">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Contact</th>
                <th scope="col" class="text-center">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $pegawai)
                <tr>
                    <td class="text-center">{{ $pegawai->id }}</td>
                    <td class="text-left">{{ $pegawai->name }}</td>
                    <td class="text-left">{{ $pegawai->phone_number }}</td>
                    <td class="text-left">{{ $pegawai->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
