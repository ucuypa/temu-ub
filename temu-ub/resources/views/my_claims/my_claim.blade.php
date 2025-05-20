@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Claims</h2>

    @if ($claims->isEmpty())
        <div class="alert alert-info">
            You have not submitted any claims yet.
        </div>
    @else
        @foreach ($claims as $claim)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $claim->item->name }}</h5>
                <p class="card-text">Claim Status: 
                    <span class="badge 
                        {{ $claim->status === 'approved' ? 'bg-success' : 
                           ($claim->status === 'pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                        {{ ucfirst($claim->status) }}
                    </span>
                </p>
                <p class="card-text text-muted">Submitted: {{ $claim->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection
