@extends('backend.layouts.app')

@push('title')
    Edit Project
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3><i class="fas fa-edit"></i> Edit Project</h3>
        </div>

        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label for="project_type" class="form-label">Project Type</label>
                        <input type="text" name="project_type" id="project_type" class="form-control" placeholder="e.g. Full-Stack / E-commerce / AI/ML /..." value="{{ old('project_type', $project->project_type) }}" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Project Thumbnail</label>

                    <div class="border rounded p-3">
                        <input type="file"name="image"id="image"class="form-control mb-2"accept="image/*">

                        <div class="d-flex align-items-center gap-3">
                            <img id="imagePreview" src="{{ $project->image ? asset('storage/'.$project->image) : '' }}" class="rounded"
                                 style="width:120px; height:120px; object-fit:cover; {{ $project->image ? '' : 'display:none;' }}">

                            <button type="button" id="removeImage" class="btn btn-sm btn-danger" style="{{ $project->image ? '' : 'display:none;' }}">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6 mb-3">
                        <label for="repo_link" class="form-label">Repository Link</label>
                        <input type="url"name="repo_link"id="repo_link"class="form-control"value="{{ old('repo_link', $project->repo_link) }}">
                    </div>

                    <div class="form-group col-6 mb-3">
                        <label for="live_link" class="form-label">Live Link</label>
                        <input type="url"name="live_link"id="live_link"class="form-control"value="{{ old('live_link', $project->live_link) }}">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-end">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {

            // summernote
            $('#description').summernote({
                height: 200,
                placeholder: 'Write description here...'
            });

            // image preview
            $('#image').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                        $('#removeImage').show();
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#removeImage').on('click', function () {
                $('#image').val('');
                $('#imagePreview').attr('src', '').hide();
                $(this).hide();
            });
        });
    </script>
@endpush
