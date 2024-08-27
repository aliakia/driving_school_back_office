'use strict';

(function () {
  // Initialize select2 and flatpickr
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
        dropdownParent: $this.parent()
      });
    });
  }

  // Wizard Validation
  // --------------------------------------------------------------------
  const wizardValidation = document.querySelector('#wizard-validation');
  if (typeof wizardValidation !== undefined && wizardValidation !== null) {
    // Wizard form
    const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
    // Wizard steps
    const wizardValidationFormStep1 = wizardValidationForm.querySelector('#ds-details-validation');
    const wizardValidationFormStep2 = wizardValidationForm.querySelector('#fees-validation');
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#it-validation');
    const wizardValidationFormStep4 = wizardValidationForm.querySelector('#images-validation');
    const wizardValidationFormStep5 = wizardValidationForm.querySelector('#settings-validation');
    // Wizard next prev button
    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardValidation, {
      linear: true
    });

    // ds details
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
              message: 'The Phone Number is required'
            },
            regexp: {
              regexp: /^[0-9]{11}$/,
              message: 'The Phone Number must be 11 digits and must only contain numbers'
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
        dti_accreditation_no: {
          validators: {
            notEmpty: {
              message: 'The DTI Accreditation Number is required'
            },
            regexp: {
              regexp: /^[0-9]+$/,
              message: 'The DTI Accreditation Number must only contain numbers'
            }
          }
        },
        lto_accreditation_no: {
          validators: {
            notEmpty: {
              message: 'The LTO Accreditation Number is required'
            },
            regexp: {
              regexp: /^[0-9]+$/,
              message: 'The LTO Accreditation Number must only contain numbers'
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
          rowSelector: '.col-sm-6'
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

    // Fees info
    const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
      fields: {
        formValidationFirstName: {
          validators: {
            notEmpty: {
              message: 'The first name is required'
            }
          }
        },
        formValidationLastName: {
          validators: {
            notEmpty: {
              message: 'The last name is required'
            }
          }
        },
        formValidationCountry: {
          validators: {
            notEmpty: {
              message: 'The Country is required'
            }
          }
        },
        formValidationLanguage: {
          validators: {
            notEmpty: {
              message: 'The Languages are required'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          eleValidClass: '',
          rowSelector: '.col-sm-6'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      validationStepper.next();
    });

    // Bootstrap Select (i.e Language select)
    if (selectPicker.length) {
      selectPicker.each(function () {
        var $this = $(this);
        $this.selectpicker().on('change', function () {
          FormValidation2.revalidateField('formValidationLanguage');
        });
      });
    }

    // select2
    if (select2.length) {
      select2.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this
          .select2({
            placeholder: 'Select a country',
            dropdownParent: $this.parent()
          })
          .on('change.select2', function () {
            FormValidation2.revalidateField('formValidationCountry');
          });
      });
    }

    // Social links
    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
      fields: {
        formValidationTwitter: {
          validators: {
            notEmpty: {
              message: 'The Twitter URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        },
        formValidationFacebook: {
          validators: {
            notEmpty: {
              message: 'The Facebook URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        },
        formValidationGoogle: {
          validators: {
            notEmpty: {
              message: 'The Google URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        },
        formValidationLinkedIn: {
          validators: {
            notEmpty: {
              message: 'The LinkedIn URL is required'
            },
            uri: {
              message: 'The URL is not proper'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          eleValidClass: '',
          rowSelector: '.col-sm-6'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      alert('Submitted..!!');
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
        validationStepper.previous();
      });
    });
  }
})();
