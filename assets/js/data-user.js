$('#table-user').dataTable();

// access user
$('.form-check-input').on('click', function () {
  const menuId = $(this).data('menuid');
  const submenuId = $(this).data('submenu');
  const userId = $(this).data('user');

  $.ajax({
    url: base_url + 'admin/userchangeaccess',
    type: 'post',
    data: {
      menuId: menuId,
      submenuId: submenuId,
      userId: userId
    },
    success: function () {
      document.location.href = base_url + 'admin/useraccess/' + userId;

    }
  });

});
