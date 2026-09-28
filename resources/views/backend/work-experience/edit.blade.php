@extends('backend.layouts.app')

@push('title')
    Edit Work Experience
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3><i class="fas fa-edit"></i> Edit Work Experience</h3>
        </div>

        <form action="{{ route('admin.work-experience.update', $experience->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                {{-- Row 1: Role & Company --}}
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="role" class="form-label">Job Title / Role <span class="text-danger">*</span></label>
                        <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror"
                               value="{{ old('role', $experience->role) }}" required>
                        @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="company" class="form-label">Company <span class="text-danger">*</span></label>
                        <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror"
                               value="{{ old('company', $experience->company) }}" required>
                        @error('company') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Row 2: Employment Type & Workplace Type --}}
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label for="employment_type" class="form-label">Employment Type</label>
                        <select name="employment_type" id="employment_type" class="form-control">
                            @foreach (['Full-time', 'Part-time', 'Contract', 'Freelance', 'Internship'] as $type)
                                <option value="{{ $type }}" {{ old('employment_type', $experience->employment_type) === $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="workplace_type" class="form-label">Workplace Type</label>
                        <select name="workplace_type" id="workplace_type" class="form-control">
                            @foreach (['On-site', 'Remote', 'Hybrid'] as $type)
                                <option value="{{ $type }}" {{ old('workplace_type', $experience->workplace_type) === $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control"
                               value="{{ old('location', $experience->location) }}">
                    </div>
                </div>

                {{-- Row 3: Start & End Date --}}
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="text" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror"
                               value="{{ old('start_date', $experience->start_date) }}" required>
                        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="end_date" class="form-label">End Date <small class="text-muted">(leave blank = Present)</small></label>
                        <input type="text" name="end_date" id="end_date" class="form-control"
                               value="{{ old('end_date', $experience->end_date) }}">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="sort_order" class="form-label">Sort Order <small class="text-muted">(0 = top)</small></label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control"
                               value="{{ old('sort_order', $experience->sort_order) }}" min="0">
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Role Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $experience->description) }}</textarea>
                </div>

                {{-- Achievements --}}
                <div class="form-group mb-3">
                    <label for="achievements" class="form-label">Key Achievements <small class="text-muted">(one per line)</small></label>
                    <textarea name="achievements" id="achievements" class="form-control" rows="5">{{ old('achievements', implode("\n", $experience->achievements ?? [])) }}</textarea>
                </div>

                {{-- Tech Stack --}}
                <div class="form-group mb-3">
                    <label for="tech_stack" class="form-label">Tech Stack <small class="text-muted">(comma-separated)</small></label>
                    <input type="text" name="tech_stack" id="tech_stack" class="form-control"
                           value="{{ old('tech_stack', implode(', ', $experience->tech_stack ?? [])) }}">
                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route('admin.work-experience.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success float-end">
                    <i class="fas fa-save"></i> Update Experience
                </button>
            </div>
        </form>
    </div>
@endsection
