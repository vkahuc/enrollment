@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8" style="width: 60%; margin: 0 auto;">
                <div class="text-center">
                    <p class=""><strong> {{ $student->first_name }} {{ $student->last_name }}</strong>
                        ({{ $student->program->name }} {{ $student->year_level }})</p>
                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h2 class="text-center">Enrollment Records</h2>
                @if (count($enrollments) > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>Schedule</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                                <tr>
                                    <td>{{ $enrollment->subject->name }}</td>
                                    <td>{{ $enrollment->section }}</td>
                                    <td>{{ $enrollment->schedule }}</td>
                                    <td>{{ $enrollment->room }}</td>
                                    <td>
                                        <form
                                            action="{{ route('enrollment.unenroll', ['studentId' => $student->id, 'offerId' => $enrollment->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Unenroll</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No enrollments yet.</p>
                @endif
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h2 class="text-center">Available Enrollments for {{ $student->program->name }} {{ $student->year_level }}
                </h2>
                @if (count($availableEnrollments) > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>Teacher</th>
                                <th>Schedule</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($availableEnrollments as $enrollment)
                                <tr>
                                    <td>{{ $enrollment->subject->code }}</td>
                                    <td>{{ $enrollment->section }}</td>
                                    </td>
                                    <td>
                                        @if ($enrollment->teacher)
                                            {{ $enrollment->teacher->first_name }} {{ $enrollment->teacher->last_name }}
                                        @else
                                            Unassigned yet
                                        @endif
                                    </td>
                                    <td>{{ $enrollment->schedule }}</td>
                                    <td>{{ $enrollment->room }}</td>
                                    <td>
                                        <form
                                            action="{{ route('enrollment.enroll', ['student_id' => $student->id, 'offer_id' => $enrollment->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary">Enroll</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No available enrollments for the student's program and year level.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
