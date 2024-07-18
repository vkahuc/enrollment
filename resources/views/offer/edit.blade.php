@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Edit Subject Offer</h1>
        <div style="margin-left: 10%; margin-right: 10%;">
            <form action="{{ route('offer.update', $offer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group p-2">
                    <label for="subject_id">Subject</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $subject->id == $offer->subject_id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="section">Section</label>
                    <input type="text" class="form-control" id="section" name="section" value="{{ $offer->section }}">
                </div>
                <div class="form-group p-2">
                    <label for="schedule">Schedule</label>
                    <input type="text" class="form-control" id="schedule" name="schedule"
                        value="{{ $offer->schedule }}">
                </div>
                <div class="form-group p-2">
                    <label for="room">Room</label>
                    <input type="text" class="form-control" id="room" name="room" value="{{ $offer->room }}">
                </div>
                <div class="form-group p-2">
                    <label for="capacity">Capacity</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $offer->capacity }}"
                        required>
                </div>

                <div class="form-group p-2">
                    <label for="program_id">Program</label>
                    <select class="form-control" id="program_id" name="program_id" required>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}" {{ $program->id == $offer->program_id ? 'selected' : '' }}>
                                {{ $program->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2">
                    <label for="year_level">Year Level</label>
                    <input type="text" class="form-control" id="year_level" name="year_level"
                        value="{{ $offer->year_level }}" required>
                </div>

                <div class="d-flex justify-content-between mt-3 mb-lg-5">
                    <a href="{{ route('offer.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Offer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
