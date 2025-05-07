@extends('layouts.app') {{-- assuming you have a layout already --}}

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Found Items</h2>
        <form class="d-flex" action="{{ route('lost-items.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search">
            <button class="btn btn-secondary ms-2" type="submit">🔍</button>
        </form>
    </div>

    <div class="row">
        @foreach($lostItems as $item)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm">
                @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="Item image">
                @else
                    <img src="{{ asset('images/default-laptop.png') }}" class="card-img-top" alt="Default image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->item_name }}</h5>
                    <p class="card-text">
                        <small class="text-muted">
                            📍 {{ $item->location_found }}<br>
                            <span class="{{ $item->status === 'retrieved' ? 'text-success' : 'text-danger' }}">
                                {{ $item->status === 'retrieved' ? 'Retrieved' : 'Not Retrieved' }}
                            </span>
                        </small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
