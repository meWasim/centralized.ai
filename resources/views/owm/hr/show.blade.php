@extends('owm.layout')

@section('breadcrumbs')
    <h1>Company Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Hr Management</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div id="hr-details" class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4>HR Details</h4>
                    <a href="{{ route('hr.download', $hr->id) }}" class="btn btn-light btn-sm">
                        <i class="fa fa-download"></i> Download PDF
                    </a>
                </div>
                <div class="card-body p-5">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold">Personal Details</h5>
                            <p class="mb-1"><strong>Name:</strong> {{ $hr->name }}</p>
                            <p class="mb-1"><strong>Email:</strong>
                                <a href="mailto:{{ $hr->email }}" class="text-decoration-none">
                                    {{ $hr->email }}
                                </a>
                            </p>
                            <p class="mb-1"><strong>Phone Number:</strong> {{ $hr->phone_number }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5 class="fw-bold">Company Information</h5>
                            <p class="mb-1"><strong>Company:</strong> {{ $hr->company->name??'Unknown' }}</p>
                            <p class="mb-1"><strong>Industry:</strong> {{ $hr->company->industry??'unknown' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="fw-bold mb-3">Additional Details</h5>
                            <p class="mb-1"><strong>LinkedIn Profile:</strong>
                                <a href="{{ $hr->linkedin }}" target="_blank" class="text-decoration-none">
                                    View Profile
                                </a>
                            </p>
                            <p class="mb-1"><strong>Response:</strong>
                                {{ $hr->response ? 'Positive' : 'Negative' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
