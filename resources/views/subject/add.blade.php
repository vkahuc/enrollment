@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        <h1 class="text-center">Add Subject</h1>
        <div style="margin-left: 10%;margin-right:10%;">
            <form action="{{ route('subject.store') }}" method="POST">
                @csrf

                <div class="form-group p-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group p-2">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <div class="form-group p-2">
                    <label for="credits">Credits</label>
                    <input type="text" class="form-control" id="credits" name="credits" required>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-lg-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
