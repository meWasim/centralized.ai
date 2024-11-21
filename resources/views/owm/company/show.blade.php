@extends('owm.layout')

@section('breadcrumbs')
    <h1>Company Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Company Management</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div id="invoice" class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4>Details</h4>
                    <a href="{{ route('company.download', $company->id) }}" class="btn btn-light btn-sm">
                        <i class="fa fa-download"></i> Download PDF
                    </a>
                </div>
                <div class="card-body p-5">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold">Company Details</h5>
                            <p class="mb-1"><strong>Name:</strong> {{ $company->name }}</p>
                            <p class="mb-1"><strong>Industry:</strong> {{ $company->industry }}</p>
                            <p class="mb-1"><strong>Email:</strong>
                                <a href="mailto:{{ $company->company_email }}" class="text-decoration-none">
                                    {{ $company->company_email }}
                                </a>
                            </p>
                            <p class="mb-1"><strong>Job Email:</strong>
                                <a href="mailto:{{ $company->company_career_email }}" class="text-decoration-none">
                                    {{ $company->company_career_email }}
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5 class="fw-bold">Address</h5>
                            <p class="mb-1"><strong>Country:</strong> {{ $company->country }}</p>
                            <p class="mb-1"><strong>State:</strong> {{ $company->state }}</p>
                            <p class="mb-1"><strong>Address:</strong> {{ $company->address }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5 class="fw-bold mb-3">Additional Details</h5>
                            <p class="mb-1"><strong>Career Page:</strong>
                                <a href="{{ $company->career_page }}" target="_blank" class="text-decoration-none">
                                    Visit Career Page
                                </a>
                            </p>
                            <p class="mb-1"><strong>Phone:</strong> {{ $company->company_phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
