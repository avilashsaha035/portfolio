@extends('backend.layouts.app')

@push('title') Edit Skill @endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="mb-0"><i class="fas fa-edit"></i> Edit Skill</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.skill.update', $skill->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $skill->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Color <small class="text-muted">(hex, e.g. #E34F26)</small></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text p-1">
                                <input type="color" id="colorPicker" value="{{ old('color', $skill->color) }}" style="width:30px;height:30px;border:none;cursor:pointer">
                            </span>
                        </div>
                        <input type="text" name="color" id="colorText" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $skill->color) }}" required>
                    </div>
                    @error('color') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                        <option value="technical" {{ old('category', $skill->category) == 'technical' ? 'selected' : '' }}>Technical</option>
                        <option value="tool"      {{ old('category', $skill->category) == 'tool'      ? 'selected' : '' }}>Tool</option>
                        <option value="soft"      {{ old('category', $skill->category) == 'soft'      ? 'selected' : '' }}>Soft Skill</option>
                    </select>
                    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <a href="{{ route('admin.skill.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script>
    const picker = document.getElementById('colorPicker');
    const text   = document.getElementById('colorText');
    picker.addEventListener('input', () => text.value = picker.value);
    text.addEventListener('input',   () => picker.value = text.value);
</script>
@endpush
