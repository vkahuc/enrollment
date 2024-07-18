@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Edit Subject</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group p-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $subject->code }}"
                        required>
                </div>
                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}"
                        required>
                </div>
                <div class="form-group p-2">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $subject->description }}" required>
                </div>
                <div class="form-group p-2">
                    <label for="credits">Credits</label>
                    <input type="text" class="form-control" id="credits" name="credits" value="{{ $subject->credits }}"
                        required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
