<?php 

$csrf = array(
'name' => $this->security->get_csrf_token_name(),
'hash' => $this->security->get_csrf_hash()
);

$swidb_model = new Swidb_model();

if ($this->session->user_type == 'admin'){
  $user_type = 'admin';

}elseif ($this->session->user_type == 'swidb'){
  $user_type = 'swidb';

}elseif ($this->session->user_type == 'user'){
  $user_type = 'user';
}
?>

<section id="cb_plan">
  <div class="container-fluid ">
      <div class="card">
          <div class="card-header text-dark fw-bold">Capacity Building Plan </div>
          <div class="card-body" style="overflow-x: auto;">

              <div class="col-md-2">
                <!-- <a href="<?php echo base_url().$user_type.'/idcb_plan_add';?>" class="btn btn-primary hvr-float-shadow m-1" data-bs-placement="top" title="Add Capacity Building Plan">              
                <?php if($this->uri->uri_string() == $user_type.'/'.'idcb_plan_add/') {echo 'text-info'; } ?>Submit IDCB Plan</a> -->
              </div><br>

            <div id="bfrtip-btn"></div><br>

            <table id="cb_plan_table" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                    <th class="text-center text-nowrap">Office</th>
                    <th class="text-center text-nowrap">Office/Bureau/Service/Unit/FOs</th>
                    <th class="text-center text-nowrap">Objective of the Activity</th>
                    <th class="text-center text-nowrap">Title Of Activity</th>
                    <th class="text-center text-nowrap">Date(Start)</th>
                    <th class="text-center text-nowrap">Date(End)</th>
                    <th class="text-center text-nowrap">Status</th>
                    <th class="text-center text-nowrap">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($cb_plan_table as $row){ 
                      if ($row->filename == ""){
                        $filename = "No MOV Uploaded";
                        $text_decoration = 'style="text-decoration: none;"';
                        $download_attribute = '';
                      } else {
                        $text_decoration = ''; // If filename is not empty, no text-decoration needed
                        $download_attribute = 'download';
                    } 



                      $office_name = $row->office_name;

                      if ($row->cb_start_date == '0000-00-00'){
                            $cb_start_date = "";
                          }else{
                            $cb_start_date = date('F j, Y', strtotime($row->cb_start_date));
                          }

                          if ($row->cb_end_date == '0000-00-00'){
                            $cb_end_date = "";
                          }else{
                            $cb_end_date = date('F j, Y', strtotime($row->cb_end_date));
                          }

                          if ($row->cb_fund_source == "1"){
                            $cb_fund_source = "Internal Source (DSWD)";
                          }elseif($row->cb_fund_source == "2"){
                            $cb_fund_source = "External Source";
                          }
                          
                          if ($row->cb_status == "1") {
                              $cb_status = "Accomplished";
                              $cb_status_class = "status-done";
                          } elseif ($row->cb_status == "2") {
                              $cb_status = "Not Accomplished";
                              $cb_status_class = "status-not-accomplished";
                          } elseif ($row->cb_status == "0") {
                              $cb_status = "";
                              $cb_status_class = "";
                          }
                        
                        $obs_fos_name = $row->obs_fos_name;
                       ?>

                    <tr>
                        <td class="text-center align-middle"><?php echo $office_name; ?></td>
                        <td class="text-center align-middle"><?php echo $obs_fos_name; ?></td>
                        <td class="text-center align-middle"><?php echo $row->cb_activity_objective; ?></td>
                        <td class="text-center align-middle"><?php echo $row->cb_activity_title; ?></td>
                        <td class="text-center align-middle"><?php echo $cb_start_date; ?></td>
                        <td class="text-center align-middle"><?php echo $cb_end_date; ?></td>
                        <td class="text-center align-middle <?php echo $cb_status_class; ?>"><?php echo $cb_status;?></td>
                        
                        <td class="text-center">
                        <span data-bs-toggle="modal" data-bs-target="#viewIDCBPlanModal<?php echo $row->cb_plan_id; ?>">
                            <a href="#"  data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fa-solid fa-eye fa-sm fa-fw mr-2 text-success"></i></a>
                          </span>

                          <!-- <a href="<?php echo base_url(); ?>swidb/delete_data_idcb_plan/<?php echo $cb_plan_id=$row->cb_plan_id ?>" 
                              onclick="return confirm('Are you sure you want to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                  <i class="fa-solid fa-trash-can fa-sm fa-fw mr-2 text-danger"></i></a> -->
                        </td>
                      </tr>

                      <div class="modal fade" id="viewIDCBPlanModal<?php echo $row->cb_plan_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5>IDCB Plan</h5>&nbsp;
                              <!-- <a href="<?php echo base_url(); ?>swidb/idcb_plan_edit/<?php echo $row->cb_plan_id ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit IDCB Plan" class="btn btn-sm btn-outline-warning" >Edit</a> -->

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <dl class="row">
                                <form method="post" enctype="multipart/form-data"> 
                                  <div class="mb-3">
                                      <div class="col-md-12 mb-3">
                                          <label class="form-label">Status<font style="color:red">*</font></label>
                                          <select name="cb_status" class="form-control" id="cb_status" required disabled>
                                              <option value="">Please Select</option>
                                              <option value="1" <?php echo set_select('cb_status', '1', ($row->cb_status == '1')); ?>>1 - Accomplished</option>
                                              <option value="2" <?php echo set_select('cb_status', '2', ($row->cb_status == '2')); ?>>2 - Not Accomplished</option>
                                          </select>
                                      </div>

                                      <!-- <div class="col-md-12 mb-2" id="mov">
                                          <label class="form-label">Upload Means of Verification (MOV) if the Status is Accomplished<font style="color:red">*</font></label><br>
                                          <input type="file" id="files" name="upload" multiple><br>
                                      </div> -->
                                      <hr>
                                      <div class="col-md-12 mb-2">
                                        <label class="form-label">Means of Verification (MOV)<font style="color:red">*</font></label><br>
                                          <?php if ($row->filename == ""): ?>
                                              <li><?php echo $filename; ?></li>
                                          <?php else: ?>
                                              <li><a href="<?php echo base_url().'upload/'.$filename; ?>" <?php echo $download_attribute; ?> <?php echo $text_decoration; ?>><?php echo $filename; ?></a></li>
                                          <?php endif; ?>
                                      </div>
                                      <div class="text-end">
                                          <!-- <input type="hidden" name="cb_plan_id" value="<?php echo $cb_plan_id; ?>" class="form-control">
                                          <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                          <input type="submit" name="idcbPlanUpdateStatus" class="btn btn-primary" id="btn_add" value="Submit" onclick="return confirm('Are you sure you want to add?')"> -->
                                      </div>
                                  </div>
                              </form>

                              <!-- <script>
                                  $(document).ready(function() {
                                      $("#cb_status").change(function() {
                                          if ($(this).val() == "1") {
                                              $('#mov').show();
                                              $('#files').prop('disabled', false).attr('data-error', 'This field is required.').show();
                                          } else {
                                              $('#mov').hide();
                                              $('#files').prop('disabled', true).removeAttr('data-error').hide();
                                          }
                                      }).trigger('change');
                                  });
                              </script> -->


                                <hr>
                                <details>
                                  <summary>ACTIVITY DETAILS</summary><br>
                                  <dl class="row">
                                    <dt class="col-sm-7">Office</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $office_name; ?></dd>
                                  
                                    <dt class="col-sm-7">OBS/FOs</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $obs_fos_name; ?></dd>

                                    <dt class="col-sm-7">Objective of the Activity</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_activity_objective;; ?></dd>

                                    <dt class="col-sm-7">Title of the Activiy</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_activity_title; ?></dd>

                                    <dt class="col-sm-7">Date of Conduct (Start)</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $cb_start_date; ?></dd>

                                    <dt class="col-sm-7">Date of Conduct (End)</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $cb_end_date; ?></dd> 

                                    <dt class="col-sm-7">Venue</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_venue; ?></dd>
                                  </dl>
                                </details><hr>

                                <details>
                                  <summary>TARGET PARTICIPANTS (DSWD)</summary><br>
                                    <dl class="row">
                                      <dt class="col-sm-7"># of Central Office Targets</dt>	
                                      <dd class="col-sm-1">:</dd>
                                      <dd class="col-sm-4"><?php echo $row->cb_co_target_pax; ?></dd>

                                      <dt class="col-sm-7"># of Field Office Targets</dt>	
                                      <dd class="col-sm-1">:</dd>
                                      <dd class="col-sm-4"><?php echo $row->cb_fo_target_pax; ?></dd>

                                      <dt class="col-sm-7"># of Center and Institutions Targets</dt>	
                                      <dd class="col-sm-1">:</dd>
                                      <dd class="col-sm-4"><?php echo $row->cb_center_target_pax; ?></dd>
                                    </dl>
                                </details><hr>

                                <details>
                                  <summary>TARGET PARTICIPANTS (INTERMEDIARIES)</summary><br>
                                  <dl class="row">
                                    <dt class="col-sm-7"># of Local Government Unit Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_lgu_target_pax; ?></dd>

                                    <dt class="col-sm-7"># of LSWDO Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_lswdo_target_pax; ?></dd>

                                    <dt class="col-sm-7"># of Non-Government Organization Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_ngo_target_pax; ?></dd>

                                    <dt class="col-sm-7"># of National Government Agency Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_nga_target_pax; ?></dd>

                                    <dt class="col-sm-7"># of People's Organization Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_org_target_pax; ?></dd>
                                  </dl>
                                </details><hr>

                                <details>
                                  <summary>TARGET PARTICIPANTS (STAKEHOLDERS)</summary><br>
                                  <dl class="row">
                                    <dt class="col-sm-12 text-center"></dt><dd></dd>

                                    <dt class="col-sm-7"># of Beneficiary Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_bene_target_pax; ?></dd>

                                    <dt class="col-sm-7"># of Other Targets</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_other_target_pax; ?></dd>
                                  </dl>
                                </details><hr>

                                <details>
                                  <summary>BUDGETARY REQUIREMENT / EXPECTED OUTPUT / BUDGET ALLOTTED</summary><br>
                                  <dl class="row">
                                    <dt class="col-sm-7">Source of Fund</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $cb_fund_source; ?></dd>

                                    <dt class="col-sm-7">Other Source</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_fund_source_others; ?></dd>

                                    <dt class="col-sm-7">Expected Output</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_expected_output; ?></dd>

                                    <dt class="col-sm-7">Alloted Budget</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->cb_alloted_budget; ?></dd>

                                    <dt class="col-sm-7">Remarks</dt>	
                                    <dd class="col-sm-1">:</dd>
                                    <dd class="col-sm-4"><?php echo $row->remarks; ?></dd>
                                  </dl>
                                </details>

                  <?php } ?>
              </tbody>

            </table>


          </div>
      </div>
  </div>
</section>

<script>
$(document).ready(function() {
    $('#cb_plan_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#cb_plan_table thead');

    var table = $('#cb_plan_table').DataTable({

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

