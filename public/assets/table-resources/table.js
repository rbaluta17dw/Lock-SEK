
$(document).ready( function () {
    $('#keys_table').DataTable();
});
$(document).ready( function () {
    $('#locksTable').DataTable();
});
$(document).ready( function () {
    $('#aUsersTable').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copy', 'excel', 'pdf', 'print'
      ]
  } );
});
