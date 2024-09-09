// $('#login').on('click', function () {
//   const requiredFields = ['#user_id', '#password'];

//   const allFilled = requiredFields.every(id => $(id).val().trim());
//   var form = $(this).closest('form');
//   if (allFilled) {
//     $.ajax({
//       url: loginUrl,
//       method: 'POST',
//       data: $('#formLogin').serialize(),
//       success: function (response) {
//         form.submit();
//       },
//       error: function (xhr) {
//         if (xhr.status === 422) {
//           let errorMsg = '';
//           $.each(xhr.responseJSON.errors, function (key, value) {
//             errorMsg += value + '\n';
//           });

//           Swal.fire({
//             title: 'Error!',
//             text: errorMsg,
//             icon: 'warning',
//             customClass: { confirmButton: 'btn btn-primary' },
//             buttonsStyling: false
//           });
//         }
//       }
//     });
//   } else {
//     const errorMsg = 'Please fill in all the required fields.';
//     Swal.fire({
//       title: 'Error!',
//       text: errorMsg,
//       icon: 'warning',
//       customClass: { confirmButton: 'btn btn-primary' },
//       buttonsStyling: false
//     });
//   }
// });
