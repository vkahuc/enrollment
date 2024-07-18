@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Add Subject Offer</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="{{ route('offer.store') }}" method="POST">
                @csrf

                <div class="form-group p-2">
                    <label for="subject_id">Subject</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->code }}: {{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="section">Section</label>
                    <input type="text" class="form-control" id="section" name="section" required>
                </div>
                <div class="form-group p-2">
                    <label for="schedule">Schedule</label>
                    <input type="text" class="form-control" id="schedule" name="schedule" required>
                </div>
                <div class="form-group p-2">
                    <label for="room">Room</label>
                    <input type="text" class="form-control" id="room" name="room" required>
                </div>
                <div class="form-group p-2">
                    <label for="capacity">Capacity</label>
                    <input type="number" value='40' class="form-control" id="capacity" name="capacity" required>
                </div>

                <div class="form-group p-2">
                    <label for="program_id">Program</label>
                    <select class="form-control" id="program_id" name="program_id" required>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="year_level">Year Level</label>
                    <input type="text" class="form-control" id="year_level" name="year_level" required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
            @if (isset($offer))
                <form action="{{ route('offer.assign_teacher') }}" method="POST">
                    @csrf
                    <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                    <div class="form-group">
                        <label for="teacher_id">Select Teacher</label>
                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Assign Teacher</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
