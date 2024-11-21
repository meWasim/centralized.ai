@extends('owm.layout')

@section('breadcrumbs')
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">HR Management</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="container">
    <h1>Your GitHub Repositories</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($repositories && count($repositories) > 0)
        <ul class="list-group">
            @foreach ($repositories as $repo)
                <li class="list-group-item">
                    <strong>{{ $repo['name'] }}</strong><br>
                    {{ $repo['description'] ?? 'No description available' }}
                    <br>
                    <a href="{{ $repo['html_url'] }}" target="_blank">View on GitHub</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No repositories found.</p>
    @endif

    <a href="{{ route('github.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>
@endsection
