@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-center">Edit Program</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="{{ route('program.update', $program->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group p-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $program->code }}"
                        required>
                </div>
                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $program->name }}"
                        required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
