@extends('layout.layout')

@section('content')
    <div class="container mt-lg-5">
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-center">Offers</h1>

        @if (count($offers) > 0)
            <div class="mx-lg-5">

                <table class="table table-striped mx-auto my-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Schedule</th>
                            <th>Room</th>
                            <th>Capacity</th>
                            <th>Program & Year Level</th>
                            <th>Teacher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->subject->code }}</td>
                                <td>{{ $offer->subject->name }}</td>
                                <td>{{ $offer->section }}</td>
                                <td>{{ $offer->schedule }}</td>
                                <td>{{ $offer->room }}</td>
                                <td>{{ $offer->capacity }}</td>
                                <td>{{ $offer->program->name }} {{ $offer->year_level }}</td>
                                <td>
                                    @if ($offer->teacher_id)
                                        <a href="{{ route('offer.assign_teacher', $offer->id) }}">{{ $offer->teacher->first_name }}
                                            {{ $offer->teacher->last_name }}</a>
                                    @else
                                        <a href="{{ route('offer.assign_teacher', $offer->id) }}">Assign</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('offer.edit', $offer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('offer.destroy', $offer->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this offer?')">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">No offers yet.</p>
        @endif

        <div class="d-flex justify-content-center">
            <a href="{{ route('offer.create') }}" class="btn btn-primary">Add Offer</a>
        </div>
    </div>
@endsection
