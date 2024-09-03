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
              '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this record?\');">' +
              '<input type="hidden" name="_token" value="' +
              csrfToken +
              '">' +
              '<input type="hidden" name="_method" value="DELETE">' +
              '<button type="submit" class="dropdown-item mx-2 text-danger align-center"><i class="text-danger ti ti-trash me-3"></i>Delete</button>' +
              '</form>' +
              '</li></ul>' +
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
    $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');
  }

  $('#open_bio').on('click', function () {
    $('#hand_modal').modal('show');
  });
  $('#open_cam').on('click', function () {
    $('#camera').modal('show');
  });
});
