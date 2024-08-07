<?php 
	$csrf = array(
		'name' => $this->security->get_csrf_token_name(),
		'hash' => $this->security->get_csrf_hash()
		);

		// error_reporting(0);
	?>

<?php
$report = new Admin_model();

foreach($edit_cb_plan_list as $row){
  $cb_plan_id = $row->cb_plan_id;

  $office_id = $row->office_id;
  $obs_fos_name = $row->obs_fos_name;

  $cb_activity_objective = $row->cb_activity_objective;
  $cb_activity_title = $row->cb_activity_title;
  $cb_start_date = $row->cb_start_date;
  $cb_end_date = $row->cb_end_date;
  $cb_venue = $row->cb_venue;
  $cb_co_target_pax = $row->cb_co_target_pax;
  $cb_fo_target_pax = $row->cb_fo_target_pax;
  $cb_center_target_pax = $row->cb_center_target_pax;
  $cb_lgu_target_pax = $row->cb_lgu_target_pax;
  $cb_lswdo_target_pax = $row->cb_lswdo_target_pax;
  $cb_ngo_target_pax = $row->cb_ngo_target_pax;
  $cb_nga_target_pax = $row->cb_nga_target_pax;
  $cb_org_target_pax = $row->cb_org_target_pax;
  $cb_bene_target_pax = $row->cb_bene_target_pax;
  $cb_other_target_pax = $row->cb_other_target_pax;
  $cb_fund_source = $row->cb_fund_source;
  $cb_fund_source_others = $row->cb_fund_source_others;
  $cb_expected_output = $row->cb_expected_output;
  $cb_alloted_budget = $row->cb_alloted_budget;
  $remarks = $row->remarks;
}
?>
  
<section id="edit__IDCB">
  <div class="container-fluid p-4"> <!-- 1st div -->
    <div class="row"> <!-- 2nd div -->
      <div class="col-md-4 mx-auto"> <!-- 3rd div -->
        <div class="card shadow"> <!-- 4th div -->
            <div class="card-header"><p class="card-title">IDCB Plan Form</p></div>
            <div class="">
              <nav style="--bs-breadcrumb-divider:'/'; background-color:#EEF5FF" aria-label="breadcrumb">
                  <small>
                    <ol class="breadcrumb mx-2">
                      <li class="breadcrumb-item"><a href="<?php echo base_url().$user_type.'/idcb_plan_table';?>"><em>IDCB Plan Table</em></a></li>
                      <li class="breadcrumb-item active" aria-current="page"><em>Edit/Update IDCB Plan</em></li>
                    </ol>
                  </small>
                </nav>
              </div>
          <div class="card-body"> <!-- 5th div -->

            <form method="POST" action="" autocomplete="off">
              <details open>
                  <summary>DSWD Office Represented</summary>
                  <br>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">OFFICE <font style="color:red">*</font></label>
                    <select name="office_id" id="office_category" class="form-control" >
                      <option value="">Select Office</option>
                        <?php foreach($office_list as $row) { 
                          $selected = ($row->office_id == set_value('office_id')) ? 'selected' : '';?>

                          <option value="<?php echo $row->office_id ?>" <?php echo set_select('office_id', $row->office_id, $row->office_id == $office_id) ?>>
                            <?php echo $row->office_id.' - '.$row->office_name; ?>
                          </option>
                        <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">OBS/FOs<font style="color:red">*</font></label>
                    <input type="text" id="obs_fos_id" list="obs_fos" name="obs_fos_name" class="form-control" value="<?php echo set_value('obs_fos_name',$obs_fos_name);?>">
                    <datalist id="obs_fos"></datalist>
                  </div>


                    <script>
                        $(document).ready(function() {
                          $('#office_category').change(function() {
                              fetchObsFos();
                          });
                          $('#obs_fos_id').focus(function() {
                              fetchObsFos();
                          });
                          
                          function fetchObsFos() {
                              const office_id = $('#office_category').val();
                              $('#obs_fos_id').val('');
                              if (office_id !== '') {
                                  $.ajax({
                                      url: '<?php echo base_url(); ?>Admin/fetch_obs_fos',
                                      method: 'POST',
                                      data: {office_id: office_id},
                                      success: function(data) {
                                          $('#obs_fos').html(data);
                                      }
                                  });
                              } else {
                                  $('#obs_fos').html('<option value="">Select OBS/FOs</option>');
                              }
                          }
                      });
                    </script>

                  </div>
                </details><br><hr>

                <details open>
                  <summary>ACTIVITY DETAILS</summary><br>

                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label">Objective of the Activity<font style="color:red">*</font></label>
                        <textarea name="cb_activity_objective" class="form-control"><?php echo set_value('cb_activity_objective', $cb_activity_objective);?></textarea>
                    </div>	

                    <div class="col-md-6">
                      <label class="form-label">Title of the Activity<font style="color:red">*</font></label>
                        <textarea name="cb_activity_title" class="form-control"><?php echo set_value('cb_activity_title', $cb_activity_title);?></textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label">Date of Conduct (Start)<font style="color:red">*</font></label>
                        <input type="date" name="cb_start_date" class="form-control" value="<?php echo set_value('cb_start_date',$cb_start_date);?>" max="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="col-md-6">
                      <label class="form-label">Date of Conduct (End)<font style="color:red">*</font></label>
                        <input type="date" name="cb_end_date" class="form-control" value="<?php echo set_value('cb_end_date',$cb_end_date);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label">Venue<font style="color:red">*</font></label>
                        <textarea name="cb_venue" class="form-control"><?php echo set_value('cb_venue');?><?php echo set_value('cb_venue', $cb_venue);?></textarea>
                    </div>
                  </div>
                </details><br><hr>

                <details>
                  <summary>TARGET PARTICIPANTS (DSWD)</summary><br>
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label"># of Central Office Targets</label>
                        <input type="number" name="cb_co_target_pax" class="form-control" value="<?php echo set_value('cb_co_target_pax', $cb_co_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of Field Office Targets</label>
                        <input type="number" name="cb_fo_target_pax" class="form-control" value="<?php echo set_value('cb_fo_target_pax', $cb_fo_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of Center and Institutions Targets</label>
                        <input type="number" name="cb_center_target_pax" class="form-control" value="<?php echo set_value('cb_center_target_pax', $cb_center_target_pax);?>">
                    </div>
                  </div>
                </details><br><hr>

                <details>
                  <summary>TARGET PARTICIPANTS (INTERMEDIARIES)</summary><br>
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label"># of Local Government Unit Targets</label>
                        <input type="number" name="cb_lgu_target_pax" class="form-control" value="<?php echo set_value('cb_lgu_target_pax', $cb_lgu_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of LSWDO Targets</label>
                        <input type="number" name="cb_lswdo_target_pax" class="form-control" value="<?php echo set_value('cb_lswdo_target_pax', $cb_lswdo_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of Non-Government Organization Targets</label>
                        <input type="number" name="cb_ngo_target_pax" class="form-control" value="<?php echo set_value('cb_ngo_target_pax', $cb_ngo_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of National Government Agency Targets</label>
                        <input type="number" name="cb_nga_target_pax" class="form-control" value="<?php echo set_value('cb_nga_target_pax', $cb_nga_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of People's Organization Targets</label>
                        <input type="number" name="cb_org_target_pax" class="form-control" value="<?php echo set_value('cb_org_target_pax', $cb_org_target_pax);?>">
                    </div>
                  </div>
                </details><br><hr>

                <details>
                  <summary>TARGET PARTICIPANTS (STAKEHOLDERS)</summary><br>
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label"># of Beneficiary Targets</label>
                        <input type="number" name="cb_bene_target_pax" class="form-control" value="<?php echo set_value('cb_bene_target_pax', $cb_bene_target_pax);?>">
                    </div>

                    <div class="col-md-12">
                      <label class="form-label"># of Other Targets</label>
                        <input type="number" name="cb_other_target_pax" class="form-control" value="<?php echo set_value('cb_other_target_pax', $cb_other_target_pax);?>">
                    </div>
                  </div>
                </details><br><hr>

                <details open>
                  <summary>BUDGETARY REQUIREMENT / EXPECTED OUTPUT / BUDGET ALLOTTED</summary><br>
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label">Fund Source<font style="color:red">*</font></label>
                        <select name="cb_fund_source" class="form-control" id="fund_source" required>
                          <option value="">Please Select</option>
                          <option value="1" <?php echo set_select('cb_fund_source', '1', ($cb_fund_source == '1')); ?>>1 - Internal Source (DSWD)</option>
                          <option value="2" <?php echo set_select('cb_fund_source', '2', ($cb_fund_source == '2')); ?>>2 - External Source (Please specify)</option>
                        </select>
                    </div>	
                    
                    <div class="col-md-12" id="other_source">
                      <label class="form-label">Please Specify</label>
                        <input type="text" id="fund_source_specify" name="cb_fund_source_others" class="form-control" value="<?php echo set_value('cb_fund_source_others', $cb_fund_source_others);?>">
                    </div>

                    <script>
                      $(document).ready(function() {
                        $("#fund_source").change(function() {
                          const value = $(this).val();
                          $('#other_source').toggle(value == "2");
                          $('#fund_source_specify').prop('disabled', value != "2");
                        }).trigger('change');
                      });
                    </script>

                    <div class="col-md-12">
                      <label class="form-label">Please type your expected output<font style="color:red">*</font></label>
                        <textarea name="cb_expected_output" class="form-control" value="" required><?php echo set_value('cb_expected_output', $cb_expected_output);?></textarea>
                    </div>

                    <div class="col-md-12">
                      <label class="form-label">Please type your allotted budget for this activity<font style="color:red">*</font></label>
                        <input type="number" name="cb_alloted_budget" class="form-control" value="<?php echo set_value('cb_alloted_budget', $cb_alloted_budget);?>" required>
                    </div>

                    <div class="col-md-12">
                      <label class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control" value=""><?php echo set_value('remarks', $remarks);?></textarea>
                    </div>
                </details>  
              </div>
                
              <br>
              <div class="card-footer text-end">
              <input type="hidden" name="cb_plan_id" value="<?php echo $cb_plan_id; ?>" class="form-control">
              <input type="hidden" name="old_cb_activity_title" value="<?php echo $cb_activity_title; ?>" class="form-control">

                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <input type="submit" name="idcbPlanSubmitEdit" class="btn btn-primary" id="btn_add" value="Submit" onclick="return confirm('Are you sure you want to add?')">
              </div>

            </form>
          </div> <!-- end 5th div -->
        </div> <!-- end 4th div -->
      </div> <!-- end 3rd div -->
    </div> <!-- end 2nd div -->
  </div> <!-- end 1st div -->
</section>








