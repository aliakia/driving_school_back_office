'use strict';

(function () {
  const select2 = $('.select2'),
    basicPickr = $('.flatpickr-date'),
    selectPicker = $('.selectpicker');

  if (basicPickr.length) {
    basicPickr.each(function () {
      $(this).flatpickr({
        monthSelectorType: 'static',
        dateFormat: 'Y-m-d'
      });
    });
  }

  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent(),
        minimumResultsForSearch: Infinity
      });
    });
  }

  function updatePreview(id, value) {
    const previewElement = document.getElementById('preview-' + id);

    if (!previewElement) {
      return;
    }

    let displayValue;

    switch (id) {
      case 'is_active':
        displayValue = value == 1 ? 'Active' : 'Inactive';
        break;
      case 'is_with_pos':
        displayValue = value == 1 ? 'With POS' : 'Without POS';
        break;
      case 'is_live':
        displayValue = value == 1 ? 'Live' : 'Not Live';
        break;
      default:
        displayValue = value;
        break;
    }

    previewElement.textContent = displayValue;
  }

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

  const wizardValidation = document.querySelector('#wizard-validation');
  if (typeof wizardValidation !== undefined && wizardValidation !== null) {
    const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
    const wizardValidationFormStep1 = wizardValidationForm.querySelector('#ds-details-validation');
    const wizardValidationFormStep2 = wizardValidationForm.querySelector('#fees-validation');
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#it-validation');
    const wizardValidationFormStep4 = wizardValidationForm.querySelector('#images-validation');
    const wizardValidationFormStep5 = wizardValidationForm.querySelector('#settings-validation');
    const wizardValidationFormStep6 = wizardValidationForm.querySelector('#review-submit');
    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardValidation, {
      linear: true
    });

    // DS Details Validation
    const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
      fields: {
        ds_name: {
          validators: {
            notEmpty: {
              message: 'The Driving School name is required'
            },
            stringLength: {
              min: 3,
              max: 30,
              message: 'The Driving School name must be more than 3 and less than 30 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9 ]+$/,
              message: 'The name can only consist of alphabetical, number and space'
            }
          }
        },
        ds_contact_no: {
          validators: {
            notEmpty: {
              message: 'The Contact Number is required'
            },
            regexp: {
              regexp: /^[0-9\- ]+$/,
              message: 'Invalid Format'
            }
          }
        },
        business_type: {
          validators: {
            notEmpty: {
              message: 'The Business Type is required'
            }
          }
        },
        ds_code: {
          validators: {
            notEmpty: {
              message: 'The Driving School Code is required'
            }
          }
        },
        dti_accreditation_no: {
          validators: {
            notEmpty: {
              message: 'The DTI Accreditation Number is required'
            }
          }
        },
        lto_accreditation_no: {
          validators: {
            notEmpty: {
              message: 'The LTO Accreditation Number is required'
            }
          }
        },
        town_city: {
          validators: {
            notEmpty: {
              message: 'The Town/City is required'
            }
          }
        },
        province: {
          validators: {
            notEmpty: {
              message: 'The Province is required'
            }
          }
        },
        region: {
          validators: {
            notEmpty: {
              message: 'The Region is required'
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
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          if (e.element.parentElement.classList.contains('input-group')) {
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    }).on('core.form.valid', function () {
      validationStepper.next();
    });

    // Fees Info Validation
    const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
      fields: {
        ds_fee_theoretical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        ds_fee_practical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        ds_fee_dep_cde: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        ds_fee_dep_drc: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        lto_fee_theoretical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        lto_fee_practical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        lto_fee_dep_cde: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        lto_fee_dep_drc: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        cdbs_fee_theoretical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        cdbs_fee_practical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        cdbs_fee_dep_cde: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        cdbs_fee_dep_drc: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        it_fee_theoretical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        it_fee_practical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        it_fee_dep_cde: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        it_fee_dep_drc: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        others_fee_theoretical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        others_fee_practical: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        others_fee_dep_cde: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        others_fee_dep_drc: {
          validators: {
            notEmpty: {
              message: 'This field is required'
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
      validationStepper.next();
    });

    // IT
    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
      fields: {
        is_active: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        server_location: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        is_live: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        is_with_pos: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        date_it_started: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        date_it_renewal: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        date_it_authorization_renewal: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        date_it_accredited: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        date_it_accreditation_renewal: {
          validators: {
            notEmpty: {
              message: 'This field is required'
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
      validationStepper.next();
    });

    //Images
    const FormValidation4 = FormValidation.formValidation(wizardValidationFormStep4, {
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
      validationStepper.next();
    });

    //Settings Validation
    const FormValidation5 = FormValidation.formValidation(wizardValidationFormStep5, {
      fields: {
        mc_daily_upload_limit: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        lv_daily_upload_limit: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        weekly_upload_limit: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        seating_capacity: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        number_unique_classes_per_days_per_tdc: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        number_unique_classes_per_days_per_dep: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        number_prescribed_days_per_instruction: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        accredited_classroom_count: {
          validators: {
            notEmpty: {
              message: 'This field is required'
            }
          }
        },
        percentage_allowable_seating_capacity: {
          validators: {
            notEmpty: {
              message: 'This field is required'
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
      validationStepper.next();
    });

    const FormValidation6 = FormValidation.formValidation(wizardValidationFormStep6, {
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
          case 3:
            FormValidation4.validate();
            break;
          case 4:
            FormValidation5.validate();
            break;
          case 5:
            FormValidation6.validate();
            break;

          default:
            break;
        }
      });
    });

    wizardValidationPrev.forEach(item => {
      item.addEventListener('click', event => {
        validationStepper.previous();
      });
    });
  }
})();
