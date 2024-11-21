document.addEventListener("DOMContentLoaded", function () {
    const successToastElement = document.getElementById('successToast');
    const errorToastElement = document.getElementById('errorToast');

    if (successToastElement) {
      const successToast = new bootstrap.Toast(successToastElement, { delay: 3000 });
      successToast.show();
    }

    if (errorToastElement) {
      const errorToast = new bootstrap.Toast(errorToastElement, { delay: 3000 });
      errorToast.show();
    }
  });
