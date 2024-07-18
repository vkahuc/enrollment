@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Edit Student</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group p-2">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $student->first_name }}" required>
                </div>
                <div class="form-group p-2">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $student->last_name }}" required>
                </div>
                <div class="form-group p-2">
                    <label for="sex">Sex</label>
                    <select class="form-control" id="sex" name="sex" required>
                        <option value="male" {{ $student->sex == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $student->sex == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="form-group p-2">
                    <label for="birthday">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday"
                        value="{{ $student->birthday }}" required>
                </div>

                <div class="form-group p-2">
                    <label for="program_id" class="form-label">Program</label>
                    <select class="form-select" id="program_id" name="program_id" required>
                        <option value="">Select Program</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}"
                                {{ $student->program_id == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a program.
                    </div>
                </div>

                <div class="form-group p-2">
                    <label for="year_level" class="form-label">Year Level</label>
                    <input type="number" class="form-control" id="year_level" name="year_level" min="1"
                        max="4" value="{{ $student->year_level }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid year level (1-4).
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
