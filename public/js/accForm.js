/**
 *  Form Wizard
 */

'use strict';

(function () {
  function updatePreview(id, value) {
    const previewElement = document.getElementById('preview-' + id);

    if (!previewElement) {
      return;
    }

    let displayValue;
    function getDisplayValue(ds_code) {
      return dsMapping[ds_code] || ds_code; // Returns the name if exists, otherwise returns the code
    }

    switch (id) {
      case 'is_active':
        displayValue = value == 1 ? 'Active' : 'Inactive';
        break;
      case 'gender':
        displayValue = value == 'FEMALE' ? 'Female' : 'Male';
        break;
      case 'user_type':
        if (value == 'encoder') {
          displayValue = 'Encoder';
        }
        if (value == 'tech_support') {
          displayValue = 'Tech Support';
        }
        if (value == 'administration') {
          displayValue = 'Administration';
        }
        if (value == 'instructor') {
          displayValue = 'Instructor';
        }

        break;
      case 'ds_code':
        displayValue = getDisplayValue(value);
        break;
      default:
        displayValue = value;
        break;
    }

    previewElement.textContent = displayValue;
  }
  console.log(dsMapping);
  const inputs = document.querySelectorAll('#wizard-validation-form input');
  const selects = document.querySelectorAll('#wizard-validation-form select');
  const textarea = document.querySelectorAll('#wizard-validation-form textarea');

  window.addEventListener('change', () => {
    inputs.forEach(input => {
      updatePreview(input.id, input.value);
    });
  });
  window.addEventListener('change', () => {
    textarea.forEach(textarea => {
      updatePreview(textarea.id, textarea.value);
    });
  });

  window.addEventListener('click', () => {
    selects.forEach(select => {
      updatePreview(select.id, select.value);
    });
  });

  $('#open_bio').on('click', function () {
    $('#hand_modal').modal({
      backdrop: 'static',
      keyboard: false,
      backdrop: false
    });
    $('#hand_modal').modal('show');
  });

  $('.fingers').on('click', function () {
    localStorage.setItem('fp', this.value);
    // var frameSrc =
    //   '<iframe src="../vuexy/biometrics/content.html" style="zoom:1.0" frameborder="0" height="400" width="100%" id="frame1"></iframe>';
    // $('#bio_modal_body').html(frameSrc);
    // $('#biometrics_modal').modal({
    //   backdrop: 'static',
    //   keyboard: false,
    //   backdrop: false
    // });
    // // $('#biometrics_modal').modal({ show: true });
    // $('#biometrics_modal').modal('show');
    var fp = localStorage.getItem('fp');
    $.ajax({
      type: 'GET',
      crossDomain: true,
      url: 'http://localhost:5000/Enroll_Biometrics',
      success: function (result) {
        if (fp == '' || fp == null) {
          $('#scan_success').html('Error Scanning');
        } else if (fp == '1') {
          localStorage.setItem('fp_idl1', result);
          console.log(result);
        } else if (fp == '2') {
          localStorage.setItem('fp_idl2', result);
        } else if (fp == '3') {
          localStorage.setItem('fp_idl3', result);
        } else if (fp == '4') {
          localStorage.setItem('fp_idl4', result);
        } else if (fp == '5') {
          localStorage.setItem('fp_idl5', result);
        } else if (fp == '6') {
          localStorage.setItem('fp_idr1', result);
        } else if (fp == '7') {
          localStorage.setItem('fp_idr2', result);
        } else if (fp == '8') {
          localStorage.setItem('fp_idr3', result);
        } else if (fp == '9') {
          localStorage.setItem('fp_idr4', result);
        } else if (fp == '10') {
          localStorage.setItem('fp_idr10', result);
        }
      }
    });
  });

  $('#close_fp').on('click', function () {
    localStorage.clear();
    $('#hand_modal').modal('hide');
  });

  $('#save_bio').on('click', function () {
    $('#biometrics_modal').modal('hide');
    var frameSrc = '';
    $('#bio_modal_body').html(frameSrc);
  });

  $('#save_fp').on('click', function () {
    var fingerprintData = {
      fp_idl1: localStorage.getItem('fp_idl1'),
      fp_idl2: localStorage.getItem('fp_idl2'),
      fp_idl3: localStorage.getItem('fp_idl3'),
      fp_idl4: localStorage.getItem('fp_idl4'),
      fp_idl5: localStorage.getItem('fp_idl5'),
      fp_idr1: localStorage.getItem('fp_idr1'),
      fp_idr2: localStorage.getItem('fp_idr2'),
      fp_idr3: localStorage.getItem('fp_idr3'),
      fp_idr4: localStorage.getItem('fp_idr4'),
      fp_idr5: localStorage.getItem('fp_idr5')
    };

    $.each(fingerprintData, function (id, value) {
      if (value !== null && value !== '') {
        $('#' + id).val(value);
      }
    });

    console.log(fingerprintData);

    $('#hand_modal').modal('hide');
  });

  $('#select').on('click', function () {
    if (navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices
        .getUserMedia({ video: true })
        .then(function (stream) {
          video.srcObject = stream;
        })
        .catch(function (err0r) {
          alert('Something went wrong!');
        });
    }
    $('#camera').modal({
      backdrop: 'static',
      keyboard: false,
      backdrop: false
    });
    $('#camera').modal('show');
    // Webcam.set({
    //     width: 640,
    //     height: 480,
    //     align:'center',
    //     image_format: 'jpeg',
    //     jpeg_quality: 100
    // });
    // Webcam.attach('#video');
  });
  $('#close_cam').on('click', function () {});

  $('#capture').on('click', function () {
    capture();
  });
  $('#saveImg').on('click', function () {
    save();
    $('#camera').modal('hide');
  });

  function capture() {
    // var canvas = $('#canvas');
    // Webcam.snap( function(data_uri) {
    //     canvas.attr('src', data_uri);
    //     $('#canvas').removeClass('hidden');
    //     $('#saveImg').removeClass('hidden');
    // });
    var canvas = document.getElementById('canvas');
    var video = document.getElementById('video');
    canvas.width = 640;
    canvas.height = 480;
    canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
    $('#canvas').removeClass('hidden');
    $('#saveImg').removeClass('hidden');
  }
  function save() {
    // var base_64 = $('#canvas').attr('src');
    // $('#picture_1').attr('src', base_64);
    // $('#base_64').val(base_64);
    // $('#canvas').addClass('hidden');
    // $('#saveImg').addClass('hidden');
    document.getElementById('picture_1').src = canvas.toDataURL();
    $('#pic_id1').val(canvas.toDataURL());
    $('#canvas').addClass('hidden');
    $('#saveImg').addClass('hidden');
  }

  const select2 = $('.select2'),
    basicPickr = $('.flatpickr-date');

  if (basicPickr.length) {
    basicPickr.each(function () {
      $(this).flatpickr({
        dateFormat: 'Y-m-d'
      });
    });
  }

  if (select2.length) {
    select2.each(function () {
      $(this)
        .wrap('<div class="position-relative"></div>')
        .select2({
          placeholder: 'Select value',
          dropdownParent: $(this).parent(),
          minimumResultsForSearch: Infinity
        });
    });
  }

  const wizardValidation = document.querySelector('#wizard-validation');
  if (typeof wizardValidation !== undefined && wizardValidation !== null) {
    const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
    const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
    const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info-validation');
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#review-submit');

    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));
    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));

    const validationStepper = new Stepper(wizardValidation, {
      linear: true
    });

    // Account details
    const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
      fields: {
        // recno: {
        //   validators: {
        //     notEmpty: {
        //       message: 'This field is required'
        //     },
        //   }
        // },
        user_id: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        employee_id: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        // ds_code: {
        //   validators: {
        //     notEmpty: {
        //       message: 'This field is required'
        //     }
        //   }
        // },
        certificate_tesda_expiration: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        certificate_tesda_expiration: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        user_expiration: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        user_type: {
          validators: {
            notEmpty: {
              message: 'The user type is required'
            }
          }
        },
        is_active: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        password: {
          validators: {
            stringLength: {
              min: 5,
              message: 'The password must be more than 5 characters long'
            }
          }
        },

        formValidationConfirmPass: {
          validators: {
            identical: {
              compare: function () {
                return wizardValidationFormStep1.querySelector('[name="password"]').value;
              },
              message: 'The password and its confirm are not the same'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          //* Move the error message out of the `input-group` element
          if (e.element.parentElement.classList.contains('input-group')) {
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    }).on('core.form.valid', function () {
      validationStepper.next();
    });

    // Personal info
    const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
      fields: {
        first_name: {
          validators: {
            notEmpty: {
              message: 'The first name is required'
            }
          }
        },
        middle_name: {
          validators: {
            notEmpty: {
              message: 'The middle name is required'
            }
          }
        },
        last_name: {
          validators: {
            notEmpty: {
              message: 'The last name is required'
            }
          }
        },
        gender: {
          validators: {
            notEmpty: {
              message: 'The gender is required'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      validationStepper.next();
    });

    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
      fields: {
        checkBox: {
          validators: {
            notEmpty: {
              message: 'Check the box if all info is correct. Go back if not.'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      window.location.href = homeUrl;
    });

    wizardValidationNext.forEach(item => {
      item.addEventListener('click', event => {
        // When click the Next button, we will validate the current step
        switch (validationStepper._currentIndex) {
          case 0:
            FormValidation1.validate();
            break;

          case 1:
            FormValidation2.validate();
            break;

          case 2:
            FormValidation3.validate();
            break;

          default:
            break;
        }
      });
    });

    wizardValidationPrev.forEach(item => {
      item.addEventListener('click', event => {
        switch (validationStepper._currentIndex) {
          case 2:
            validationStepper.previous();
            break;

          case 1:
            validationStepper.previous();
            break;

          case 0:

          default:
            break;
        }
      });
    });
  }
})();
