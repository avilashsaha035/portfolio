@extends('backend.layouts.app')

@push('title')
    About Me
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3>About Me</h3>
        </div>

        <form action="{{ route('admin.store.aboutMe') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $aboutMe->title ?? '') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="">{{ old('description', $aboutMe->description ?? '') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Profile Image</label>

                    <div class="border rounded p-3">
                        <input type="file" name="image" id="image" class="form-control mb-2" accept="image/*">

                        <div class="d-flex align-items-center">
                            <img id="imagePreview" src="{{ !empty($aboutMe->image) ? asset('storage/'.$aboutMe->image) : '' }}" class="rounded"
                                style="width:120px; height:120px; object-fit:cover; border:1px solid black; display: {{ !empty($aboutMe->image) ? 'block' : 'none' }};">

                            <button type="button" id="removeImage" class="btn btn-sm btn-danger ml-1" style="display: {{ !empty($aboutMe->image) ? 'inline-block' : 'none' }};">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="link" class="form-label">CV Link</label>
                    <input type="url" name="link" id="link" class="form-control"
                        value="{{ old('link', $aboutMe->cv_link ?? '') }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-end"><i class="fas fa-save"></i> Save</button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                height: 200,
                placeholder: 'Write description here...',
            });
        });
    </script>

    <script>
        $(document).ready(function () {
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
