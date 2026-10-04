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
                    <a href="{{ route('admin.project.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Create</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="text-muted small"><i class="fas fa-grip-vertical"></i> Drag rows to reorder projects.</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:40px"></th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Live Link</th>
                        <th>Repo Link</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="sortable-projects">
                    @foreach($projects as $project)
                        <tr data-id="{{ $project->id }}">
                            <td class="text-center text-muted drag-handle" style="cursor:grab">
                                <i class="fas fa-grip-vertical"></i>
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$project->image) }}" width="80" class="rounded">
                            </td>
                            <td>
                                <a href="{{ $project->live_link }}" target="_blank">{{ $project->live_link }}</a>
                            </td>
                            <td>
                                <a href="{{ $project->repo_link }}" target="_blank">{{ $project->repo_link }}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.3/Sortable.min.js"></script>

    <script>
        // Drag-and-drop reordering
        Sortable.create(document.getElementById('sortable-projects'), {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function () {
                const ids = $('#sortable-projects tr').map(function () {
                    return $(this).data('id');
                }).get();

                $.ajax({
                    url: '{{ route('admin.project.reorder') }}',
                    method: 'POST',
                    contentType: 'application/json',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: JSON.stringify({ ids })
                });
            }
        });

        // Delete confirmation
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
                if (result.isConfirmed) form.submit();
            });
        });
    </script>
@endpush
