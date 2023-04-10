@extends('layouts.master')

@section('content')
    <h1 style="margin: 25px 0px 25px 0px">Signlifyers</h1>
    <table class="table" id="view-signiflyers">
        <thead>
        <tr>
            <th scope="col">Available</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Education</th>
            <th scope="col">Skill Set</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
  </table>
@stop

@section('topinlinescripts')
<script>
    ajax_url = '{!! route('signifly.signiflyers.get') !!}';
</script>
@stop

@section('inlinescripts')
<script>
    function handleDataTable(target, ajax_url) {
        var table = target;
        
        var oTable = table.removeAttr('width').DataTable({
          columnDefs: [
            { orderable: false, targets: [0,1,2,3,4,5,6] },
            { width: "20%", targets: [0,1,2,3,4,5,6] }
          ],
          ajax: {
              url: ajax_url,
              type: 'GET',
          },
          processing: true,
          serverSide: true,
          searching: false,
          // Internationalisation. For more info refer to http://datatables.net/manual/i18n
          language: {
              aria: {
                  sortAscending: ': activate to sort column ascending',
                  sortDescending: ': activate to sort column descending'
              },
              emptyTable: 'No entires found to display.',
              info: 'Showing _START_ to _END_ of _TOTAL_ entries',
              infoEmpty: 'No entries found',
              infoFiltered: '(filtered from _MAX_ total entries)',
              lengthMenu: '_MENU_ entries',
              zeroRecords: 'No matching records found'
          },

          // setup buttons extentension: http://datatables.net/extensions/buttons/
          buttons: [
              // { extend: 'print', className: 'btn dark btn-outline' },
              // { extend: 'pdf', className: 'btn green btn-outline' },
              // { extend: 'csv', className: 'btn purple btn-outline ' }
          ],

          // setup responsive extension: http://datatables.net/extensions/responsive/
          responsive: true,

          order: [[1, 'ASC']],

          lengthMenu: [
              [5, 10, 15, 20, 50, 100],
              [5, 10, 15, 20, 50, 100] // change per page values here
          ],
          // set the initial value
          pageLength: 10,

          dom:
              "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
      });
    }

    jQuery(document).ready(function() {
        handleDataTable($('#view-signiflyers'),  ajax_url);
    });
</script>
@stop