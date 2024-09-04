/**
 * DataTables Basic
 */

'use strict';

// datatable (jquery)
$(document).ready(function () {
  const select2 = $('.select2'),
    basicPickr = $('.flatpickr-date');

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
      $(this)
        .wrap('<div class="position-relative"></div>')
        .select2({
          placeholder: 'Select value',
          dropdownParent: $(this).parent(),
          minimumResultsForSearch: Infinity
        });
    });
  }
  var dt_basic_table = $('.datatables-basic'),
    dt_basic;

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      ajax: {
        url: adURL,
        dataSrc: 'accountData'
      },
      columns: [
        { data: 'employee_id' },
        { data: 'first_name' },
        { data: 'ds_code' },
        { data: 'is_active' },
        { data: 'user_type' }
        // { data: 'user_id' }
      ],
      columnDefs: [
        {
          responsivePriority: 1,
          targets: 3,
          render: function (data) {
            return data === '1'
              ? '<span class="badge bg-label-success me-1">Active</span>'
              : '<span class="badge bg-label-danger me-1">Inactive</span>';
          }
        },
        {
          // Label
          targets: 4,
          render: function (data, type, full, meta) {
            var $type_text = full['user_type'];

            var $type = {
              instructor: { title: 'Instructor', class: 'bg-label-warning' },
              encoder: { title: 'Encoder', class: 'bg-label-info' },
              administrator: { title: 'Administrator', class: 'bg-label-danger' }
            };

            if (typeof $type[$type_text] === 'undefined') {
              return data;
            }

            return '<span class="badge ' + $type[$type_text].class + '">' + $type[$type_text].title + '</span>';
          }
        },

        {
          // Actions
          targets: 5,
          orderable: false,
          searchable: false,

          render: function (data, type, row) {
            const deleteUrl = deleteFormBaseUrl.replace('__REPLACE__', row.user_id);
            const editUrl = editFormBaseUrl.replace('__REPLACE__', row.user_id);
            return (
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>' +
              '<ul class="dropdown-menu dropdown-menu-end m-0">' +
              '<li><a href="' +
              editUrl +
              '" class="dropdown-item mx-2 text-primary align-center"><i class="ti ti-pencil me-3"></i>Edit</a></li>' +
             '<li><form action="' +
              deleteUrl +
              '" method="POST" style="display:inline;" class="delete-form">' +
              '<input type="hidden" name="_token" value="' +
              csrfToken +
              '">' +
              '<input type="hidden" name="_method" value="DELETE">' +
              '<button type="button" class="dropdown-item mx-2 text-danger align-center delete-btn">' +
              '<i class="text-danger ti ti-trash me-3"></i>Delete</button>' +
              '</form></li></ul>' +
              '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Create New Account</span>',
          className: 'create-new btn btn-primary',
          action: function (e, dt, node, config) {
            // Trigger the modal using Bootstrap's modal method
            $('#newAccount').modal('show');
          }
        }
      ]
    });
    $('div.head-label').html('<h5 class="card-title mb-0">Accounts</h5>');
  }

  $(document).on('click', '.delete-btn', function (e) {
    e.preventDefault(); // Prevent the form from submitting immediately

    var form = $(this).closest('form'); // Get the form

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.isConfirmed) {
            form.submit(); // Submit the form if confirmed
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'Your record has been deleted.',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: 'Cancelled',
                text: 'Your record is safe :)',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            });
        }
    });
});

  $('#open_bio').on('click', function () {
    $('#hand_modal').modal('show');
  });
  $('#open_cam').on('click', function () {
    $('#camera').modal('show');
  });

  $('#open_bio').on('click', function () {
    $('#hand_modal').modal('show');
  });
  $('#open_cam').on('click', function () {
    $('#camera').modal('show');
  });

  $('.fingers').on('click', function () {
    // console.log('finger1');

    localStorage.setItem('fp', this.value);
    var frameSrc =
      '<iframe src="../biometrics/content.html" style="zoom:1.0" frameborder="0" height="400" width="100%" id="frame1"></iframe>';
    $('#bio_modal_body').html(frameSrc);
    $('#biometrics_modal').modal({
      backdrop: 'static',
      keyboard: false,
      backdrop: false
    });
    // $('#biometrics_modal').modal({ show: true });
    $('#biometrics_modal').modal('show');
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
  $('#save_fp').on('click', function () {
    var fp_idl1 = localStorage.getItem('fp_idl1'),
      fp_idl2 = localStorage.getItem('fp_idl2'),
      fp_idl3 = localStorage.getItem('fp_idl3'),
      fp_idl4 = localStorage.getItem('fp_idl4'),
      fp_idl5 = localStorage.getItem('fp_idl5'),
      fp_idr1 = localStorage.getItem('fp_idr1'),
      fp_idr2 = localStorage.getItem('fp_idr2'),
      fp_idr3 = localStorage.getItem('fp_idr3'),
      fp_idr4 = localStorage.getItem('fp_idr4'),
      fp_idr5 = localStorage.getItem('fp_idr5');
    if (fp_idl1 != '' || fp_idl1 != null) {
      $('#fp_idl1').val(fp_idl1);
    } else {
      let fp = '1';
      errorMessage(fp);
    }
    if (fp_idl2 != '' || fp_idl2 != null) {
      $('#fp_idl2').val(fp_idl2);
    } else {
      let fp = '2';
      errorMessage(fp);
    }
    if (fp_idl3 != '' || fp_idl3 != null) {
      $('#fp_idl3').val(fp_idl3);
    } else {
      let fp = '3';
      errorMessage(fp);
    }
    if (fp_idl4 != '' || fp_idl4 != null) {
      $('#fp_idl4').val(fp_idl4);
    } else {
      let fp = '4';
      errorMessage(fp);
    }
    if (fp_idl5 != '' || fp_idl5 != null) {
      $('#fp_idl5').val(fp_idl5);
    } else {
      let fp = '5';
      errorMessage(fp);
    }
    if (fp_idr1 != '' || fp_idr1 != null) {
      $('#fp_idr1').val(fp_idr1);
    } else {
      let fp = '6';
      errorMessage(fp);
    }
    if (fp_idr2 != '' || fp_idr2 != null) {
      $('#fp_idr2').val(fp_idr2);
    } else {
      let fp = '7';
      errorMessage(fp);
    }
    if (fp_idr3 != '' || fp_idr3 != null) {
      $('#fp_idr3').val(fp_idr3);
    } else {
      let fp = '8';
      errorMessage(fp);
    }
    if (fp_idr4 != '' || fp_idr4 != null) {
      $('#fp_idr4').val(fp_idr4);
    } else {
      let fp = '9';
      errorMessage(fp);
    }
    if (fp_idr5 != '' || fp_idr5 != null) {
      $('#fp_idr5').val(fp_idr5);
    } else {
      let fp = '10';
      errorMessage(fp);
    }
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
    Webcam.set({
      width: 640,
      height: 480,
      align: 'center',
      image_format: 'jpeg',
      jpeg_quality: 100
    });
    Webcam.attach('#video');
  });

  $('#capture').on('click', function () {
    capture();
  });
});
