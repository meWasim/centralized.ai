<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-absolute top-0 end-0 p-3">
      <!-- Success Toast -->
      @if (session('success'))
        <div class="toast show fade border-0" role="alert" aria-live="assertive" aria-atomic="true" id="successToast" style="background-color: #28a745;" data-bs-delay="3000">
          <div class="toast-body d-flex align-items-center p-4">
            <span class="text-white me-3">
              <i class="fa-solid fa-circle-check fa-2x"></i>
            </span>
            <div>
              <span class="text-white fw-bold d-block">Success</span>
              <small class="text-white">{{ session('success') }}</small>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      @endif

      <!-- Error Toast -->
      @if (session('error'))
        <div class="toast show fade border-0" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast" style="background-color: #dc3545;" data-bs-delay="3000">
          <div class="toast-body d-flex align-items-center p-4">
            <span class="text-white me-3">
              <i class="fa-solid fa-circle-exclamation fa-2x"></i>
            </span>
            <div>
              <span class="text-white fw-bold d-block">Error</span>
              <small class="text-white">{{ session('error') }}</small>
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      @endif
    </div>
  </div>
