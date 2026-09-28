@extends('backend.layouts.app')

@push('title')
    Work Experience
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0"><i class="fas fa-briefcase"></i> Work Experience</h3>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.work-experience.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus-square"></i> Add New
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="experienceTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th>Period</th>
                        <th>Order</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiences as $exp)
                        <tr>
                            <td>
                                {{ $exp->role }}
                                @if ($exp->is_current)
                                    <span class="badge badge-success ml-1">Current</span>
                                @endif
                            </td>
                            <td>{{ $exp->company }}</td>
                            <td>{{ $exp->employment_type }} · {{ $exp->workplace_type }}</td>
                            <td>{{ $exp->period }}</td>
                            <td>{{ $exp->sort_order }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.work-experience.edit', $exp->id) }}" class="btn btn-success btn-sm mr-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.work-experience.destroy', $exp->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on('submit', '.delete-form', function (e) {
            e.preventDefault();
            let form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: 'This work experience entry will be permanently deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it',
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });

        $(document).ready(function () {
            $('#experienceTable').DataTable({
                pageLength: 10,
                ordering: true,
                responsive: true,
                language: {
                    emptyTable: "No work experience entries found",
                    zeroRecords: "No matching records found"
                },
                columnDefs: [{ orderable: false, targets: [5] }]
            });
        });
    </script>
@endpush
