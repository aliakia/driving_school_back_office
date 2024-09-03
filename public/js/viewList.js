'use strict';

$(function () {
  const dtBasic = $('.datatables-basic');

  if (dtBasic.length) {
    dtBasic.DataTable({
      ajax: {
        url: dsUrl, // Declared in viewList blade
        dataSrc: 'data'
      },
      columns: [{ data: 'ds_code' }, { data: 'ds_name' }, { data: 'is_active' }],
      columnDefs: [
        {
          targets: 2,
          render: function (data) {
            return data === '1'
              ? '<span class="badge bg-label-success me-1">Active</span>'
              : '<span class="badge bg-label-danger me-1">Inactive</span>';
          }
        },
        {
          targets: 3,
          orderable: false,
          searchable: false,
          render: function (data, type, row) {
            const editUrl = editFormBaseUrl.replace('__REPLACE__', row.ds_code);
            const deleteUrl = deleteFormBaseUrl.replace('__REPLACE__', row.ds_code);

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
      order: [[1, 'asc']],
      responsive: true,
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 10,
      lengthMenu: [10, 25, 50, 75, 100],
      buttons: [
        {
          text: '<i class="ti ti-plus"></i> Create New Driving School',
          className: 'btn btn-primary',
          action: function (e, dt, node, config) {
            window.location.href = createFormUrl; // Declared in viewList blade
          }
        }
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== ''
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }
});
