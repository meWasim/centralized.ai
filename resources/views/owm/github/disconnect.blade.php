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
    <h1>Disconnect GitHub Account</h1>

    <p>Are you sure you want to disconnect your GitHub account?</p>
    <form method="POST" action="{{ route('github.disconnect') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Yes, Disconnect</button>
        <a href="{{ route('github.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
