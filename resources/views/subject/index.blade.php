@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Subjects</h1>

        @if (count($subjects) > 0)
            <div class="mx-lg-5">
                <table class="table table-striped mx-auto my-3"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Credits</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->code }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->description }}</td>
                                <td>{{ $subject->credits }}</td>
                                <td>
                                    <a href="{{ route('subject.edit', $subject->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No subjects yet.</p>
        @endif
        <div class="d-flex justify-content-center">
            <a href="{{ route('subject.create') }}" class="btn btn-primary">Add subject</a>
        </div>
    </div>
    </div>
@endsection
