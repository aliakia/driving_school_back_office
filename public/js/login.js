$(document).ready(function () {
  localStorage.clear();
  async function sendFingerprintData() {
    let fingerprintData = captureFingerprint();

    // Send to Laravel server
    const response = await fetch('"http://localhost:5000/Verify_Biometrics"', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
        fingerprint: fingerprintData
      })
    });

    const result = await response.json();
    console.log(result);
  }

  //   var loginForm = $('#login_form');
  //   var hideSearch = $('.hide-search'),
  //     isRtl = $('html').attr('data-textdirection') === 'rtl';

  //   hideSearch.select2({
  //     minimumResultsForSearch: Infinity
  //   });

  //   callWinApp();

  //   function callWinApp() {
  //     $.ajax({
  //       type: 'GET',
  //       async: true,
  //       crossDomain: true,
  //       url: "http://localhost:5000/Verify_Biometrics",
  //       success: function (result) {
  //         console.log(result);
  //         if (result != "") {
  //           verify(result);
  //         } else {
  //           toastr['warning']('Please Scan the finger print of the instructor', 'Biometrics Required', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //         }
  //       }
  //     });
  //   }

  //   function verify(userBio) {
  //     let _dsCode = $('#ds_code').val();
  //     $("#loader").removeClass("hidden", function () {
  //       $("#loader").fadeIn(500);
  //     });
  //     $.ajax({
  //       headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       },
  //       method: "POST",
  //       url: _dsCode + "/login_bio",
  //       data: {
  //         user_bio: userBio
  //       },
  //       success: function (data) {
  //         $("#loader").addClass("hidden", function () {
  //           $("#loader").fadeOut(500);
  //         });
  //         // console.log(data);
  //         if (data.status == "1") {
  //           Swal.fire({
  //             title: "Login Successful!",
  //             text: data.message,
  //             icon: "success",
  //             customClass: {
  //               confirmButton: 'btn btn-primary'
  //             },
  //             buttonsStyling: false,
  //             allowOutsideClick: () => {
  //               this.wasOutsideClick = true;
  //             }
  //           }).then((result) => {
  //             if (result.isConfirmed) {
  //               $("#loader").removeClass("hidden", function () {
  //                 $("#loader").fadeIn(500);
  //               });
  //               window.location.href = window.location.href + "/login_bio_redirect";
  //             }
  //           });
  //         } else {
  //           toastr['error'](data.message, 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //           callWinApp();
  //         }
  //       },
  //       error: function (xhr, status, error) {
  //         var errorMessage = xhr.status + ': ' + xhr.statusText;
  //         $("#loader").addClass("hidden", function () {
  //           $("#loader").fadeOut(500);
  //         });
  //         if (xhr.status == 500) {
  //           toastr['error']('There was a problem connecting to the server.', 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //         }
  //         else if (xhr.status == 0) {
  //           toastr['error']('Not Connected. Please verify your network connection.', 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });

  //         } else {
  //           toastr['error'](errorMessage, 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //         }
  //       }
  //     });
  //   }

  //   $('#btn_login').on('click', function () {
  //     loginNow()
  //   });

  //   $('.form-control').keypress(function (e) {
  //     if (e.which == 13) {
  //       loginNow()
  //     }
  //   });

  //   $('#login_bio').on('click', function () {
  //     var frameSrc = '<iframe src="biometrics/content2.html" style="zoom:1.0" frameborder="0" height="400" width="100%" id="frame1"></iframe>';
  //     $('#bio_modal_body').html(frameSrc);
  //     $('#biometrics_modal').modal({
  //       backdrop: 'static',
  //       keyboard: false,
  //       backdrop: false
  //     });
  //     $("#biometrics_modal").modal({ show: true });
  //   });

  //   $('#verify').on('click', function () {
  //     //    verify();
  //     var pngFile = localStorage.getItem("imageSrc");

  //     if (pngFile != null) {
  //       loginBio(pngFile);
  //       $("#biometrics_modal").modal('hide');
  //       var frameSrc = "";
  //       $('#bio_modal_body').html(frameSrc);
  //     } else {
  //       toastr['warning']('Please Scan your finger print', 'Biometrics Required', {
  //         closeButton: true,
  //         tapToDismiss: false,
  //         rtl: isRtl
  //       });
  //     }
  //   });

  //   function loginBio(biometrics) {
  //     var ds_code = $('#ds_code').val();
  //     $("#loader").removeClass("hidden", function () {
  //       $("#loader").fadeIn(500);
  //     });
  //     $.ajax({
  //       headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       },
  //       method: "POST",
  //       url: ds_code + "/login_bio",
  //       data: {
  //         user_id: 'admin',
  //         password: '12345',
  //       },
  //       success: function (data) {
  //         $("#loader").addClass("hidden", function () {
  //           $("#loader").fadeOut(500);
  //         });
  //         // console.log(data);
  //         if (data.status == "1") {
  //           window.location.href = ds_code + "/dashboard_page";
  //           // toastr['success'](data.message, 'Success', {
  //           //     closeButton: true,
  //           //     tapToDismiss: false,
  //           //     rtl: isRtl
  //           // });
  //         } else {
  //           toastr['error'](data.message, 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //         }
  //       },
  //       error: function (xhr, status, error) {
  //         var errorMessage = xhr.status + ': ' + xhr.statusText;
  //         $("#loader").addClass("hidden", function () {
  //           $("#loader").fadeOut(500);
  //         });
  //         if (xhr.status == 500) {
  //           toastr['error']('There was a problem connecting to the server.', 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //         }
  //         else if (xhr.status == 0) {
  //           toastr['error']('Not Connected. Please verify your network connection.', 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });

  //         } else {
  //           toastr['error'](errorMessage, 'Error', {
  //             closeButton: true,
  //             tapToDismiss: false,
  //             rtl: isRtl
  //           });
  //         }
  //       }
  //     });
  //   }

  //   function loginNow() {
  //     loginForm.validate({
  //       rules: {
  //         user_id: {
  //           required: true
  //         },
  //         password: {
  //           required: true,
  //           minlength: 5
  //         }
  //       }
  //     });
  //     if (loginForm.valid()) {
  //       $("#loader").removeClass("hidden", function () {
  //         $("#loader").fadeIn(500);
  //       });
  //       loginForm.submit();
  //     }
  //   }

  //   function htmlEntities(str) {
  //     if (str == null) {
  //       return "";
  //     }
  //     else {
  //       return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  //     }
  //   }
});
