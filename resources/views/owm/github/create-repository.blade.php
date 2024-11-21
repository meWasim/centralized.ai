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
    <h1>Create a New Repository</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('github.create.repository') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Repository Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="private" id="private" class="form-check-input">
            <label for="private" class="form-check-label">Private Repository</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Repository</button>
    </form>

    <a href="{{ route('github.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>
@endsection
