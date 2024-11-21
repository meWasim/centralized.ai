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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title">HR Management</h5>
                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHrModal">
                            <i class="fa fa-plus"></i> Add New
                        </button>

                    </div>

                    <!-- Table -->
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>LinkedIn</th>
                                <th>Response</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hrs as $hr)
                                <tr>
                                    <td>{{ $hr->name }}</td>
                                    <td>{{ $hr->company->name ?? 'unknown' }}</td>
                                    <td>{{ $hr->phone_number }}</td>
                                    <td>
                                        <a href="mailto:{{ $hr->email }}" class="text-decoration-none">
                                            {{ $hr->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ $hr->linkedin }}" target="_blank" class="text-decoration-none">
                                            LinkedIn Profile
                                        </a>
                                    </td>
                                    <td>{{ $hr->response ?? 'Not Asked' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- View Action -->
                                            <a href="{{ route('hr.show', $hr->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <!-- Edit Action -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <!-- Edit Button -->




                                            <!-- Delete Action -->


                                            <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                onclick="confirmDelete({{ $hr->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Hidden Form -->
                                            <form id="delete-form-{{ $hr->id }}"
                                                action="{{ route('hr.destroy', $hr->id) }}" method="POST"
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
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </div>


    @include('owm.hr.create')

    <!-- Vertically centered Modal -->

    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Vertically Centered</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div><!-- End Vertically centered Modal-->

@endsection
