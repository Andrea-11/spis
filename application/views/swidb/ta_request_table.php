<?php 
	$csrf = array(
		'name' => $this->security->get_csrf_token_name(),
		'hash' => $this->security->get_csrf_hash()
		);

		// error_reporting(0);

    // if($this->session->user_type == 'swidb' || $this->session->user_type == 'user'){
    //     $nav_hide = 'style="display: none"';
    //   }else{
    //     $nav_hide = '';
    //   }
	?>


  
<section id="ta_table">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header text-dark fw-bold">TA Request Table</div>
      <div class="card-body" style="overflow-x: auto;">
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#taRequestModal">
              Add Request
        </button> -->
      


        <table id="ta_request_table" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
                <th class="text-center text-nowrap">Office</th>
                <th class="text-center text-nowrap">Office/Bureau/Service/Unit/FOs</th>
                <th class="text-center text-nowrap">Name of Requester</th>
                <th class="text-center text-nowrap">Service / Assistance Availed</th>
                <th class="text-center text-nowrap">Date Submitted</th>
                <th class="text-center text-nowrap">Status</th>
                <th class="text-center text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($ta_request_table as $row){ 

                $office_name = $row->office_name;
                $obs_fos_name = $row->obs_fos_name;

                if($row->ta_services == "1"){
                  $ta_services = "Request for Knowledge Management Orientation";
                }elseif($row->ta_services == "2"){
                  $ta_services = "Request for Knowledge Management Assessment";
                }elseif($row->ta_services == "3"){
                  $ta_services = "Request for Knowledge Product / Good Practice Documentation";
                }else{
                  $ta_services = "";
                }

                if($row->ta_status == "0"){
                  $ta_status = "Completed";
                }elseif($row->ta_status == "1"){
                  $ta_status = "Pending";
                }

              ?>

              <tr>
                  <td class="text-center align-middle"><?php echo $office_name; ?></td>
                  <td class="text-center align-middle"><?php echo $obs_fos_name; ?></td>
                  <td class="text-center align-middle"><?php echo $row->ta_requester_name; ?></td>
                  <td class="text-center align-middle"><?php echo $ta_services; ?></td>
                  <td class="text-center align-middle"><?php echo $row->ta_date_encoded; ?></td>
                  <td class="text-center align-middle"><?php echo $ta_status; ?></td>
                  
                  <td class="text-center">
                    <span data-bs-toggle="modal" data-bs-target="#updateStatusnModal<?php echo $row->cb_plan_id; ?>">
                      <a href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fa-solid fa-eye fa-sm fa-fw mr-2 text-success"></i>
                      </a>
                    </span> |
                    <a href="<?php echo base_url(); ?>swidb/delete_data_idcb_plan/<?php echo $ta_request_id =$row->ta_request_id  ?>" 
                        onclick="return confirm('Are you sure you want to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                      <i class="fa-solid fa-trash-can fa-sm fa-fw mr-2 text-danger"></i>
                    </a>
                  </td>
                </tr>

            <?php } ?>
          </tbody>
        </table>



        <div class="modal fade" id="taRequestModal" tabindex="-1" aria-labelledby="taRequestModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="taRequestModalLabel">TA Request</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <form method="POST" action="" autocomplete="off">
                  <div class="row g-3">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Ticket Status<font style="color:red">*</font></label>
                        <select name="ta_status" class="form-control" id="ta_status" required>
                            <option value="">Please Select</option>
                            <option value="1" <?php echo set_select('ta_status', '2', ($row->ta_status == '1')); ?>>1 - Done</option>
                            <option value="2" <?php echo set_select('ta_status', '3', ($row->ta_status == '2')); ?>>2 - ?????</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                      <input type="submit" name="taRequestAdd" class="btn btn-primary" id="btn_add" value="Submit" onclick="return confirm('Are you sure you want to add?')">
                    </div>
                  </div>
                </form>


                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>       
</section>
  






<script>
$(document).ready(function() {
    $('#ta_request_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#ta_request_table thead');

    var table = $('#ta_request_table').DataTable({

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
