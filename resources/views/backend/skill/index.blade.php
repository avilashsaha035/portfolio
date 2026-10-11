@extends('backend.layouts.app')

@push('title') Skills @endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0"><i class="fas fa-code"></i> Skills</h3>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.skill.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Add Skill</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <p class="text-muted small"><i class="fas fa-grip-vertical"></i> Drag rows to reorder.</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:40px"></th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="sortable-skills">
                    @foreach($skills as $skill)
                        <tr data-id="{{ $skill->id }}">
                            <td class="text-center text-muted drag-handle" style="cursor:grab"><i class="fas fa-grip-vertical"></i></td>
                            <td>
                                <span class="badge" style="background-color:{{ $skill->color }}">{{ $skill->name }}</span>
                            </td>
                            <td>{{ $skill->color }}</td>
                            <td>{{ ucfirst($skill->category) }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.skill.edit', $skill->id) }}" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.skill.destroy', $skill->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf @method('DELETE')
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
        Sortable.create(document.getElementById('sortable-skills'), {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function () {
                const ids = $('#sortable-skills tr').map(function () { return $(this).data('id'); }).get();
                $.ajax({
                    url: '{{ route('admin.skill.reorder') }}',
                    method: 'POST',
                    contentType: 'application/json',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: JSON.stringify({ ids })
                });
            }
        });

        $(document).on('submit', '.delete-form', function (e) {
            e.preventDefault();
            let form = this;
            Swal.fire({
                title: 'Are you sure?', text: 'This skill will be deleted.',
                icon: 'warning', showCancelButton: true,
                confirmButtonColor: '#d33', cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => { if (result.isConfirmed) form.submit(); });
        });
    </script>
@endpush
