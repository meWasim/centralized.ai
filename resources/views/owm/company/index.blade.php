@extends('owm.layout')

@section('breadcrumbs')
    <h1 class="mb-3">Management</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item active">Company Management</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-3 mb-md-0">Company's List</h5>
                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addCompanyModal">
                            <i class="fa fa-plus"></i> Add New
                        </button>
                    </div>

                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Industry</th>
                                    <th>Email</th>
                                    <th>Job Email</th>
                                    <th>Career Page</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->industry }}</td>
                                        <td>
                                            <a href="mailto:{{ $company->company_email }}" class="text-decoration-none">
                                                {{ $company->company_email }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $company->company_career_email }}"
                                                class="text-decoration-none">
                                                {{ $company->company_career_email }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ $company->career_page }}" target="_blank"
                                                class="text-decoration-none">
                                                Career page
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- View Button -->
                                                <a href="{{ route('company.show', $company->id) }}"
                                                    class="btn btn-success btn-sm" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <!-- Edit Button -->


                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-id="{{ $company->id }}" data-name="{{ $company->name }}"
                                                    data-industry="{{ $company->industry }}"
                                                    data-company_email="{{ $company->company_email }}"
                                                    data-job_email="{{ $company->company_career_email }}"
                                                    data-phone="{{ $company->company_phone }}"
                                                    data-country="{{ $company->country }}"
                                                    data-state="{{ $company->state }}"
                                                    data-address="{{ $company->address }}"
                                                    data-career_page="{{ $company->career_page }}" data-bs-toggle="modal"
                                                    data-bs-target="#editCompanyModal">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Edit Button -->


                                                <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="confirmDelete({{ $company->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <!-- Hidden Form -->
                                                <form id="delete-form-{{ $company->id }}"
                                                    action="{{ route('company.destroy', $company->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>

    @include('owm.company.create')
    @include('owm.company.edit')

@endsection
