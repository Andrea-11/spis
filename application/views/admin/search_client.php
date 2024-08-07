<?php 

$csrf = array(
'name' => $this->security->get_csrf_token_name(),
'hash' => $this->security->get_csrf_hash()
);

$main_model = new Main_model();

if ($this->session->user_type == 'admin'){
  $user_type = 'admin';

}elseif ($this->session->user_type == 'co'){
  $user_type = 'central';

}elseif ($this->session->user_type == 'user'){
  $user_type = 'user';
}
?>

<section id="search">
  <div class="container-fluid ">
      <div class="card">
          <div class="card-header text-dark fw-bold">Search Client</div>
          <div class="card-body" style="overflow-x: auto;">

            <div id="bfrtip-btn"></div><br>

            <table id="client_table" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                    <th class="text-center text-nowrap">Office</th>
                    <th class="text-center text-nowrap">Client Name</th>
                    <th class="text-center text-nowrap">Birthdate</th>
                    <th class="text-center text-nowrap">Age</th>
                    <th class="text-center text-nowrap">Status</th>
                    <th class="text-center text-nowrap">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($client_table as $row){ 
                      $field_office = $row->field_office;

                    if($row->middle_name == ''){
                        $name = $row->first_name.' '.$row->last_name;
                    }else{
                        $name =  $row->first_name.' '.substr($row->middle_name, 0, 1).'. '.$row->last_name;
                    }

                    $birthdate = $row->birthdate;

                    // Calculate the age
                    $currentDate = date('Y-m-d');
                    $birthDateTime = new DateTime($birthdate);
                    $currentDateTime = new DateTime($currentDate);
                    $ageInterval = $currentDateTime->diff($birthDateTime);

                    // Retrieve the age components
                    $years = $ageInterval->y;
                    $months = $ageInterval->m;
                    $days = $ageInterval->d;
                    
                    $current_age = "$years Years Old";

                    $recommendation = $row->recommendation;

                       ?>

                    <tr>
                        <td class="text-center align-middle"><?php echo $field_office; ?></td>
                        <td class="text-center align-middle"><?php echo $name; ?></td>
                        <td class="text-center align-middle"><?php echo $birthdate; ?></td>
                        <td class="text-center align-middle"><?php echo $current_age; ?></td>
                        <td class="text-center align-middle"><?php echo $recommendation; ?></td>
                        
                        <td class="text-center">
                        <span data-bs-toggle="modal" data-bs-target="#viewIDCBPlanModal<?php echo $row->client_id; ?>">
                            <a href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fa-solid fa-eye fa-sm fa-fw mr-2 text-success"></i></a>
                          </span> | 

                          <a href="<?php echo base_url(); ?>admin/delete_data_idcb_plan/<?php echo $client_id=$row->client_id ?>" 
                              onclick="return confirm('Are you sure you want to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                  <i class="fa-solid fa-trash-can fa-sm fa-fw mr-2 text-danger"></i></a>
                        </td>
                      </tr>


                  <?php } ?>
              </tbody>

            </table>


          </div>
      </div>
  </div>
</section>

<script>
$(document).ready(function() {
    $('#client_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#client_table thead');

    var table = $('#client_table').DataTable({

        orderCellsTop: true,
        responsive: true,
        fixedHeader: true,
        
        initComplete: function() {
            var api = this.api();

            api.columns().eq(0).each(function(colIdx) {
                var column = api.column(colIdx);
                var title = $(column.header()).text();
                var header = $('.filters th').eq($(column.header()).index());

                if(title == "Action") {
                    $(header).addClass('no-filter').html('');
                
                } else {
                    $(header).html('<input type="text" class="form-control text-center" placeholder="' + title + '" />');

                    $('input', header)
                        .off('keyup change')
                        .on('keyup change', function(e) {
                            e.stopPropagation();

                            $(this).attr('title', $(this).val());
                            var regexr = '({search})';

                            var cursorPosition = this.selectionStart;
                            column
                                .search(
                                    this.value != '' ?
                                    regexr.replace('{search}', '(((' + this.value + ')))') :
                                    '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();

                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                }
            });

            api.rows().every(function() {
                var data = this.data();
                var status = data[6]; // 7th column
                var endDate = data[5]; // 6th column
                var endDateFormatted = new Date(endDate).setHours(0,0,0,0);
                var today = new Date().setHours(0,0,0,0);
                
                if (status === "Ongoing" && endDateFormatted < today) {
                    $(this.node()).addClass('bg-danger').find('td').addClass('text-white').find('a').addClass('text-white');
                }

            });

            api.columns.adjust();
        },
    });
});


</script> 

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>

