<!-- Edit Company Modal -->
<div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="editCompanyForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCompanyModalLabel">Edit Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editCompanyName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editCompanyName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editIndustry" class="form-label">Industry</label>
                        <input type="text" class="form-control" id="editIndustry" name="industry" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCompanyEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editCompanyEmail" name="company_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJobEmail" class="form-label">Job Email</label>
                        <input type="email" class="form-control" id="editJobEmail" name="company_career_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCompanyPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="editCompanyPhone" name="company_phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCountry" class="form-label">Country</label>
                        <input type="text" class="form-control" id="editCountry" name="country" required>
                    </div>
                    <div class="mb-3">
                        <label for="editState" class="form-label">State</label>
                        <input type="text" class="form-control" id="editState" name="state" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="editAddress" name="address" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editCareerPage" class="form-label">Career Page</label>
                        <input type="url" class="form-control" id="editCareerPage" name="career_page">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editCompanyModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;

        // Extract data from data-* attributes
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const industry = button.getAttribute('data-industry');
        const companyEmail = button.getAttribute('data-company_email');
        const jobEmail = button.getAttribute('data-job_email');
        const phone = button.getAttribute('data-phone');
        const country = button.getAttribute('data-country');
        const state = button.getAttribute('data-state');
        const address = button.getAttribute('data-address');
        const careerPage = button.getAttribute('data-career_page');

        // Update the modal's form inputs
        const form = editModal.querySelector('form');
        form.action = `/company/${id}`;
        form.querySelector('#editCompanyName').value = name;
        form.querySelector('#editIndustry').value = industry;
        form.querySelector('#editCompanyEmail').value = companyEmail;
        form.querySelector('#editJobEmail').value = jobEmail;
        form.querySelector('#editCompanyPhone').value = phone;
        form.querySelector('#editCountry').value = country;
        form.querySelector('#editState').value = state;
        form.querySelector('#editAddress').value = address;
        form.querySelector('#editCareerPage').value = careerPage;
    });
});

</script>
