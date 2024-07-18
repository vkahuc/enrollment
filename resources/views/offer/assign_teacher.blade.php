@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Assign Teacher to Offer</h1>
        <div style="margin-left: 10%; margin-right: 10%;">

            <form action="{{ route('offer.store_teacher_assignment') }}" method="POST">
                @csrf
                <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                <div class="form-group p-2">
                    <label for="teacher_id">Assign a Teacher</label>
                    <select class="form-control" id="teacher_id" name="teacher_id" required>
                        <option value="">Select</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $offer->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->first_name }} {{ $teacher->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-lg-5">
                    <a href="{{ route('offer.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Assign Teacher</button>
                </div>
            </form>
        </div>
    </div>
@endsection
