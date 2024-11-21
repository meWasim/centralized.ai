<div class="modal fade" id="addCompanyModal" tabindex="-1" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('company.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCompanyModalLabel">Add New Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Company Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter company name" required>
                    </div>
                    <div class="mb-3">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" name="industry" id="industry" class="form-control" placeholder="Enter industry" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_email" class="form-label">Company Email</label>
                        <input type="email" name="company_email" id="company_email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Enter country" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter state" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" placeholder="Enter address" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="company_career_email" class="form-label">Career Email</label>
                        <input type="email" name="company_career_email" id="company_career_email" class="form-control" placeholder="Enter career email" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_phone" class="form-label">Phone</label>
                        <input type="text" name="company_phone" id="company_phone" class="form-control" placeholder="Enter phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="career_page" class="form-label">Career Page</label>
                        <input type="url" name="career_page" id="career_page" class="form-control" placeholder="Enter career page URL">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Company</button>
                </div>
            </form>
        </div>
    </div>
</div>
