@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Lost Item Announcements</h2>
        <a href="{{ route('announcements.create') }}" class="btn btn-primary">+ New Announcement</a>
    </div>

    <div class="row">
        @forelse($announcements as $announcement)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm">
                @if($announcement->image)
                    <img src="{{ asset('storage/images/' . $announcement->image) }}" class="card-img-top" alt="Item image">
                @else
                    <img src="{{ asset('images/default-laptop.png') }}" class="card-img-top" alt="Default image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $announcement->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($announcement->description, 100) }}</p>
                </div>
                <div class="card-footer bg-transparent">
                    <small class="text-muted">📅 {{ $announcement->created_at->format('M d, Y') }}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">No announcements found.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
