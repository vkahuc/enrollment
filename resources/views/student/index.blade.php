@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-center">Students</h1>

        @if (count($students) > 0)
            <div class="mx-lg-5">

                <table class="table table-striped mx-auto my-3"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Birthday</th>
                            <th>Program & Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->sex }}</td>
                                <td>{{ $student->birthday }}</td>
                                <td>{{ $student->program->name }} {{ $student->year_level }}</td>
                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No students yet.</p>
        @endif
        <div class="d-flex justify-content-center">
            <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
        </div>
    </div>
    </div>
@endsection
