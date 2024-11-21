<div class="modal fade" id="editHrModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHrModalLabel">Edit HR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('hr.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="hrName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="hrName" name="name" required>
                    </div>

                    <!-- Company Dropdown -->
                    <div class="mb-3">
                        <label for="companyId" class="form-label">Company</label>
                        <select class="form-select" id="companyId" name="company_id" required>
                            <option value="" disabled selected>Select a Company</option>
                            @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="mb-3">
                        <label for="hrPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="hrPhone" name="phone_number" required>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="hrEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="hrEmail" name="email" required>
                    </div>

                    <!-- LinkedIn Field -->
                    <div class="mb-3">
                        <label for="hrLinkedin" class="form-label">LinkedIn</label>
                        <input type="url" class="form-control" id="hrLinkedin" name="linkedin">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save HR</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
