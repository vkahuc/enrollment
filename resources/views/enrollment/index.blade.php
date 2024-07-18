@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-center">Search Student</h1>
        <div style="margin-left: 10%; margin-right: 10%;">

            <form action="{{ route('enrollment.search') }}" method="GET">
                @csrf
                <div class="form-group p-2">
                    <label for="student_id">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Search</button>

                </div>
            </form>
        </div>
    </div>
@endsection
