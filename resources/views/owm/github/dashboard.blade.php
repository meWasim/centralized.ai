@extends('owm.layout')

@section('breadcrumbs')
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">GitHub Management</li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="row">
        <div class="col-12 ">
            @if (!$githubData)
                <!-- Card to Connect GitHub -->
                <div class="card  col-lg-12">
                    <div class="card-body text-center">
                        <h5 class="card-title">GitHub Integration</h5>
                        <p>You have not connected a GitHub account yet. Connect to manage repositories and view details.</p>
                        <a href="{{ route('github.connect') }}" class="btn btn-primary">Connect GitHub</a>
                    </div>
                </div>
            @else
                <!-- Left Card: GitHub User Info -->
                <div class="card  col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">GitHub User Details</h5>
                        <p><strong>GitHub Username:</strong> {{ $githubData->github_username }}</p>
                        <img src="{{ $githubData->avatar_url }}" alt="Avatar"
                             class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                        <p><strong>Email:</strong> {{ $githubData->email ?? 'N/A' }}</p>
                        <a href="{{ route('github.disconnect.form') }}" class="btn btn-danger w-100">Disconnect GitHub</a>
                    </div>
                </div>

                <!-- Right Card: GitHub Repositories -->
                <div class="card col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Repositories</h5>
                        <a href="{{ route('github.create-repository.form') }}" class="btn btn-success mb-3">
                            <i class="bi bi-plus-circle"></i> Create Repository
                        </a>
                        @if (!empty($repositories) && count($repositories) > 0)
                            <div style="max-height: 300px; overflow-y: auto;">
                                <ul class="list-group">
                                    @foreach ($repositories as $repository)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $repository['name'] }}</strong>
                                                <p class="text-muted mb-0">
                                                    {{ $repository['description'] ?? 'No description provided.' }}
                                                </p>
                                            </div>
                                            <a href="{{ $repository['html_url'] }}" target="_blank"
                                               class="btn btn-primary btn-sm">View</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p>No repositories found.</p>
                        @endif
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection
