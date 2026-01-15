@extends('backend.layouts.app')

@push('title')
    My Projects
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0"><i class="fas fa-cogs"></i> My Projects</h3>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.project.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Create</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="projectsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Title</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Live Link</th>
                        <th class="text-center">Repo Link</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td class="text-center">{{ $project->title }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/'.$project->image) }}" width="80" class="rounded">
                            </td>
                            <td class="text-center">
                                <a href="{{ $project->live_link }}" target="_blank" class="">{{ $project->live_link }}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ $project->repo_link }}" target="_blank" class="">{{ $project->repo_link }}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-success mr-2"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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
                text: 'You want to delete this project?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

    <!-- jquery Table init -->
    <script>
        $(document).ready(function () {
            $('#projectsTable').DataTable({
                pageLength: 10,
                ordering: true,
                responsive: true,
                language: {
                    emptyTable: "Nothing found",
                    zeroRecords: "No matching projects found"
                },
                columnDefs: [
                    { orderable: false, targets: [1, 2, 3, 4] }
                ]
            });
        });
    </script>
@endpush
