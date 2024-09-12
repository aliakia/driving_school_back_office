document.addEventListener('DOMContentLoaded', function () {
  const loginButton = document.getElementById('login');
  toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: '3000',
    extendedTimeOut: '2000',
    onShown: function () {
      $('.toast').find('.toast-message').append('<div class="loader"></div>');
    }
  };

  loginButton.addEventListener('click', function (e) {
    e.preventDefault();

    const userId = document.getElementById('user_id').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!userId || !password) {
      toastr.error('Please fill in all required fields.', 'Validation Error');
      return;
    }

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'POST',
      url: loginUrl,
      data: {
        user_id: userId,
        password: password
      },
      success: function (response) {
        if (response.status === 'success') {
          $('#loader').removeClass('hidden', function () {
            $('#loader').fadeIn(500);
          });
          toastr.success(response.message, 'Success');
          window.location.href = homeUrl;
        } else {
          $('#loader').removeClass('hidden', function () {
            $('#loader').fadeIn(500);
          });
          toastr.error(response.message || 'An error occurred.', 'Error');
        }
      },
      error: function (xhr) {
        $('#loader').removeClass('hidden', function () {
          $('#loader').fadeIn(500);
        });
        let errorMessage = 'An unknown error occurred.';
        if (xhr.status === 422) {
          try {
            const response = xhr.responseJSON;
            errorMessage = response.message || 'Validation Error occurred.';
          } catch (e) {
            errorMessage = 'Validation Error occurred.';
          }
        } else if (xhr.status === 403) {
          errorMessage = 'Access Forbidden. Please check your credentials or account status.';
        } else if (xhr.status === 500) {
          errorMessage = 'There was a problem connecting to the server.';
        } else if (xhr.status === 0) {
          errorMessage = 'Not Connected. Please verify your network connection.';
        } else {
          errorMessage = xhr.status + ': ' + xhr.statusText;
        }

        toastr.error(errorMessage, 'Error');
      }
    });
  });
});
