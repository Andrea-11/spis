<?php 
	$csrf = array(
		'name' => $this->security->get_csrf_token_name(),
		'hash' => $this->security->get_csrf_hash()
		);

        $new_id = "";
        $formatted_id = "";
        foreach ($id_validation as $client_id){
            $new_id = $client_id->client_id + 1;
            $formatted_id = str_pad($new_id, 5, '0', STR_PAD_LEFT);
        }
		// error_reporting(0);
	?>
<section id="add__client">
<body id="page-top">
    <div class="container-fluid">
        <div class="col-lg-12 offset-lg-0" style="padding-left: 200px;margin-right: 8px;padding-right: 200px;">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h3 class="text-secondary m-0 fw-bold">Add New Client</h3>
                </div>
                <div class="card-body" style="padding-right: 15px;padding-bottom: 15px;margin-bottom: 13px;">
                    <form method="POST" action="" autocomplete="off">

                        <details open>
                            <summary class="label mb-1 fs-5 text-info"><strong>I. IDENTIFYING INFORMATION</strong></summary><br>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><strong>REFERENCE CODE</strong></label>
                                    <input type="text" class="form-control fw-bold" name="ref_code" value="<?php echo $this->session->brgy_id.'-'.$formatted_id; ?>" disabled>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><strong>OSCA ID NO.</strong></label>
                                    <input  type="text" class="form-control" name="osca_id" value="<?php echo set_value('first_name');?>">
                                    <?php echo form_error('osca_id',"<div class='error'>", "</div>"); ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><strong>NCSC RRN (if applicable)</strong></label>
                                    <input type="text" class="form-control" name="ncsc_rrn" value="<?php echo set_value('first_name');?>">
                                </div>
                                    <hr>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><strong>LAST NAME</strong><font style="color:red">*</font></label>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo set_value('first_name');?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><strong>FIRST NAME</strong><font style="color:red">*</font></label>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name');?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><strong>MIDDLE NAME</strong><font style="color:red">*</font></label>
                                    <input type="text" class="form-control" name="middle_name" value="<?php echo set_value('first_name');?>" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><strong>EXT. NAME</strong></label>
                                    <input type="text" class="form-control" name="ext_name" value="<?php echo set_value('first_name');?>">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label"><strong>MOTHER'S MAIDEN NAME</strong><font style="color:red">*</font></label>
                                    <input type="text" class="form-control"  name="mothers_maiden_name" value="<?php echo set_value('first_name');?>" required>
                                </div>
                                    <hr>

                                    <label class="form-label mb-1"><strong>PERMANENT ADDRESS</strong></label><br>
                                    <div class="col-md-6 mb-3">
                                        <label for="perm_region" class="form-label"><strong>REGION</strong><font style="color:red">*</font></label>
                                        <select name="perm_region" id="perm_region" class="form-control" placeholder="Region" required>
                                            <option value="" class="text-dark">Select Region</option>
                                            <?php
                                                $counter = 1;
                                                foreach($region as $row)
                                                {
                                                    echo '<option value="'.$row->region_id.'" class="text-dark">'.$counter.' - '.$row->region_name.'</option>';
                                                    $counter++;
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>PROVINCE</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="perm_prov" id="perm_province" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>MUNICIPALITY/CITY</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="perm_muni" id="perm_city" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>BARANGAY</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="perm_brgy" id="perm_brgy" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>HOUSE NO./ PUROK</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control"  name="perm_sitio" id="perm_sitio" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>STREET</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="perm_street" id="perm_street"  required>
                                    </div>
                                </div>

                                <div class="col-md-6 mx-3">
                                    <input type="checkbox" id="copyAddress" onclick="copyPermanentAddress()">
                                    <label for="copyAddress" class="text-warning mb-3"><strong>CHECK IF SAME ADDRESS ABOVE</strong></label>
                                </div>

                                <div class="row">
                                    <label class="form-label mb-1"><strong>PRESENT ADDRESS</strong></label><br>
                                    <div class="col-md-6 mb-3">
                                        <label for="pre_region" class="form-label"><strong>REGION</strong><font style="color:red">*</font></label>
                                        <select name="pre_region" id="present_region" class="form-control" placeholder="Region" required>
                                            <option value="" class="text-dark">Select Region</option>
                                            <?php
                                                $counter = 1;
                                                foreach($region as $row)
                                                {
                                                    echo '<option value="'.$row->region_id.'" class="text-dark">'.$counter.' - '.$row->region_name.'</option>';
                                                    $counter++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>PROVINCE</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="pre_prov" id="present_province" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>MUNICIPALITY/CITY</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="pre_muni" id="present_city" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>BARANGAY</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="pre_brgy" id="present_brgy" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>HOUSE NO./ PUROK</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="pre_sitio" value="<?php echo set_value('pre_sitio');?>"  required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>STREET</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control"   name="pre_street" value="<?php echo set_value('pre_street');?>" required>
                                    </div>
                                </div>
                            

                                    <script type='text/javascript'>
                                        function submitBday() {
                                        Q4A = "";
                                        var Bdate = document.getElementById('bday').value;
                                        var Bday = +new Date(Bdate);
                                        var age = ~~((Date.now() - Bday) / (31557600000));
                                        Q4A += "" + age;
                                        var theBday = document.getElementById('resultBday');
                                        theBday.innerHTML = Q4A;

                                        if (age < 60) {
                                            theBday.value = "";
                                            alert("Age is below 60");
                                        } else {
                                            theBday.value = age;
                                        }
                                        }
                                    </script>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>BIRTHDATE</strong><font style="color:red">*</font></label>
                                        <input type="date" class="form-control" name="birthdate" id="bday" value="<?php echo set_value('birthdate');?>" onchange="submitBday()" >
                                    </div>

                                    <div class="col-md-6 mb-3" id="age_output">
                                        <label class="form-label"><strong>AGE</strong> <i class="fas fa-lock" id="lock" aria-hidden="true"></i></label>
                                        <textarea class="form-control" name="age" rows="1" value="<?php echo set_value('age');?>" id="resultBday" required readonly></textarea>
                                    </div>	

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>GENDER</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="gender" required>
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('gender', '1'); ?>>1 - MALE</option>
                                            <option value="2" <?php echo set_select('gender', '2'); ?>>2 - FEMALE</option>
                                        </select>
                                    </div>	

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>CIVIL STATUS</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="civil_status" required>
                                            <option value="">Please Select</option>
                                            <option value="1"<?php echo set_select('civil_status', '1'); ?>>1 - SINGLE</option>
                                            <option value="2"<?php echo set_select('civil_status', '2'); ?>>2 - MARRIED</option>
                                            <option value="3"<?php echo set_select('civil_status', '3'); ?>>3 - WIDOWED</option>
                                            <option value="4"<?php echo set_select('civil_status', '4'); ?>>4 - DIVORCED</option>
                                            <option value="5"<?php echo set_select('civil_status', '5'); ?>>5 - SEPARATED</option>
                                            <option value="6"<?php echo set_select('civil_status', '6'); ?>>6 - COMMON-LAW SPOUSE</option>
                                            <option value="7"<?php echo set_select('civil_status', '7'); ?>>7 - N/D</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>PLACE OF BIRTH</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="birth_place" value="<?php echo set_value('birth_place');?>" required>
                                    </div><hr>

                                    <label class="text-primary label mb-1 fs-5"><strong>AFFILATION</strong></label><br>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>LISTAHANAN</strong></label>
                                        <select name="listahanan_y_n" class="form-control" id="listahanan_y_n">
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('listahanan_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('listahanan_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3" id="hh_id_no">
                                        <label class="form-label"><strong>HOUSEHOLD ID NO.</strong></label>
                                        <input type="text" class="form-control" name="household_id_no" value="<?php echo set_value('household_id_no');?>" id="hh_id_no_input" >
                                    </div>

                                        <script>
                                        $(document).ready(function() {
                                            $("#listahanan_y_n").change(function() {
                                            const value = $(this).val();
                                            $('#hh_id_no').toggle(value == "1");
                                            $('#hh_id_no_input').prop('disabled', value != "1");
                                            }).trigger('change');
                                        });
                                        </script>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>IPs?</strong></label>
                                        <select name="ip_y_n" class="form-control" id="ip_y_n">
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('ip_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('ip_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>
                
                                    <div class="col-md-6 mb-3" id="ethnic">
                                        <label class="form-label"><strong>ETHNICITY</strong></label>
                                        <input type="text" class="form-control" name="ethnicity" id="ethnic_input" value="<?php echo set_value('ethnicity');?>">
                                    </div>
                                    
                                        <script>
                                        $(document).ready(function() {
                                            $("#ip_y_n").change(function() {
                                            const value = $(this).val();
                                            $('#ethnic').toggle(value == "1");
                                            $('#ethnic_input').prop('disabled', value != "1");
                                            }).trigger('change');
                                        });
                                        </script>

                                    <div class="col-md-6">
                                        <label class="form-label"><strong>4Ps MEMBER?</strong></label>
                                        <select name="pantawid_y_n" class="form-control" >
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('pantawid_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('pantawid_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>
                                </div><!--END OF ROW-->
                            </details><hr>  

                            <details open>
                                <summary class="fs-5 text-info"><strong>II. FAMILY INFORMATION</strong></summary><br>
                                <div class="row">
                                    <label class="text-primary label mb-1 fs-5"><strong>NAME OF SPOUSE</strong></label><br>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>LAST NAME</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="spouse_lname" value="<?php echo set_value('spouse_lname');?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>FIRST NAME</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="spouse_fname" value="<?php echo set_value('spouse_fname');?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>MIDDLE NAME</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="spouse_mname" value="<?php echo set_value('spouse_mname');?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>EXT. NAME</strong></label>
                                        <input type="text" class="form-control" name="spouse_ename" value="<?php echo set_value('spouse_ename');?>">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>CONTACT NUMBER</strong></label>
                                        <input type="number" class="form-control" name="spouse_contact_num" value="<?php echo set_value('spouse_contact_num');?>" required>
                                    </div>

                                    <label class="form-label mb-1"><strong>SPOUSE ADDRESS</strong></label><br>
                                    <div class="col-md-6 mb-3">
                                        <label for="spouse_region" class="form-label"><strong>REGION</strong><font style="color:red">*</font></label>
                                        <select name="spouse_region" id="spouse_region" class="form-control" placeholder="Region" required>
                                            <option value="" class="text-dark">Select Region</option>
                                            <?php
                                                $counter = 1;
                                                foreach($region as $row)
                                                {
                                                    echo '<option value="'.$row->region_id.'" class="text-dark">'.$counter.' - '.$row->region_name.'</option>';
                                                    $counter++;
                                                }
                                            ?>
                                        </select>
                                </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>PROVINCE</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="spouse_prov" id="spouse_province" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>MUNICIPALITY/CITY</strong><font style="color:red">*</font></label>
                                        <select class="form-control"  name="spouse_muni" id="spouse_city" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>BARANGAY</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="spouse_brgy" id="spouse_brgy" required>
                                            <option value="">Select Region First</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>HOUSE NO./ PUROK</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="spouse_sitio" value="<?php echo set_value('spouse_sitio');?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>STREET</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="spouse_street" value="<?php echo set_value('spouse_street');?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        LIVING ARRANGEMENT
                                        <label class="form-label">HOUSE</label>
                                        <select class="form-control" name="house" required>
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('house', '1'); ?>>1 - OWN</option>
                                            <option value="2" <?php echo set_select('house', '2'); ?>>2 - RENT</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">LIVING WITH?</label>
                                        <select class="form-control" name="living_with" required>
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('living_with', '1'); ?>>1 - LIVING ALONE</option>
                                            <option value="2" <?php echo set_select('living_with', '2'); ?>>2 - LIVING WITH SPOUSE ONLY</option>
                                            <option value="3" <?php echo set_select('living_with', '3'); ?>>3 - LIVING WITH A CHILD</option>
                                            <option value="4" <?php echo set_select('living_with', '4'); ?>>4 - LIVING WITH ANOTHER RELATIVE</option>
                                            <option value="5" <?php echo set_select('living_with', '5'); ?>>5 - LIVING WITH UNRELATED PEOPLE ONLY</option>
                                            <option value="6" <?php echo set_select('living_with', '6'); ?>>7 - Others</option>
                                        </select>
                                    </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">PLEASE SPECIFY<font style="color:red">*</font></label>
                                            <input type="text" class="form-control" name="other_living_with" value="<?php echo set_value('other_living_with');?>" id="other_living_with" required>
                                        </div>
                                    <hr>

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary perp mb-3" id="add">
                                            <i class="fa-solid fa-plus fa-sm fa-fw mr-2"></i> ADD REPRESENTATIVE
                                        </button>
                                    </div>

                                    <div id="dynamic_field">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="text-primary label mb-1 fs-5"><strong>NAME OF AUTHORIZED REPRESENTATIVE</strong></label><br>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label"><strong>NAME (LAST, FIRST MIDDLE)</strong><font style="color:red">*</font></label>
                                                <input type="text" class="form-control" name="representative_name[]" value="">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label"><strong>RELATIONSHIP TO THE CLIENT</strong></label>
                                                <select class="form-control" name="representative_relationship[]" >
                                                    <option value="">Please Select</option>
                                                    <option value="1">1 - SPOUSE</option>
                                                    <option value="2">2 - SIBLINGS</option>
                                                    <option value="3">3 - CHILD</option>
                                                    <option value="4">4 - GRAND-CHILD</option>
                                                    <option value="5">5 - GREAT GRAND-CHILD</option>
                                                    <option value="6">6 - GRAND-PARENT</option>
                                                    <option value="7">7 - GREAT GRAND-PARENT</option>
                                                    <option value="8">8 - NIECE</option>
                                                    <option value="9">9 - NEPHEW</option>
                                                    <option value="10">10 - NEIGHBOR</option>
                                                    <option value="11">11 - CONCERNED CITIZEN</option>
                                                    <option value="12">12 - IN-LAWS</option>
                                                    <option value="13">13 - COMMON-LAW SPOUSE</option>
                                                    <option value="14">14 - FIANCE</option>
                                                    <option value="15">15 - FAR-FLUNG RELATIVES</option>
                                                    <option value="16">16 - GOD-FATHER</option>
                                                    <option value="17">17 - GOD-MOTHER</option>
                                                    <option value="18">18 - GOD-CHILD</option>
                                                    <option value="19">19 - GUARDIAN/CAREGIVER</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label"><strong>CONTACT NUMBER</strong><font style="color:red">*</font></label>
                                                <input type="number" class="form-control" name="representative_contact_num[]" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <?php for ($i=0; $i < 1; $i++) { ?>
                                    <script type="text/javascript">
                                        $(document).ready(function(){      
                                            var count = 1; // Start count at 1 since one representative field is already present

                                            $('#add').click(function(){  
                                                if (count < 3) { // Check if the count is less than 3
                                                    count++; // Increment count
                                                    var i = count; // Set i to current count
                                                    $('#dynamic_field').append('<div id="row'+i+'"><hr><div class="row"><div class="col-md-12 mb-3"><label class="form-label"><strong>NAME (LAST, FIRST MIDDLE)</strong><font style="color:red">*</font></label><input type="text" class="form-control"  name="representative_name[]" value=""></div><div class="col-md-6"><label class="form-label"><strong>RELATIONSHIP TO THE CLIENT</strong></label><select name="representative_relationship[]" class="form-control" ><option value="">Please Select</option><option value="1" >1 - SPOUSE</option><option value="2" >2 - SIBLINGS</option><option value="3" >3 - CHILD</option><option value="4" >4 - GRAND-CHILD</option><option value="5" >5 - GREAT GRAND-CHILD</option><option value="6" >6 - GRAND-PARENT</option><option value="7" >7 - GREAT GRAND-PARENT</option><option value="8" >8 - NIECE</option><option value="9" >9 - NEPHEW</option><option value="10" >10 - NEIGHBOR</option><option value="11" >11 - CONCERNED CITIZEN</option><option value="12" >12 - IN-LAWS</option><option value="13" >13 - COMMON-LAW SPOUSE</option><option value="14" >14 - FIANCE</option><option value="15" >15 - FAR-FLUNG RELATIVES</option><option value="16" >16 - GOD-FATHER</option><option value="17" >17 - GOD-MOTHER</option><option value="18" >18 - GOD-CHILD</option><option value="19" >19 - GUARDIAN/CAREGIVER</option></select></div><div class="col-md-6"><label class="form-label"><strong>CONTACT NUMBER</strong><font style="color:red">*</font></label><input type="number" class="form-control" name="representative_contact_num[]"></div></div><br><button type="button" onclick="return confirm(\'Are you sure you want to delete?\')" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-align">Delete</button></div>');
                                                } else {
                                                    alert("You can only add up to 3 representatives.");
                                                }
                                            });

                                            $(document).on('click', '.btn_remove', function(){  
                                                var button_id = $(this).attr("id"); 
                                                $('#row'+button_id+'').remove();  
                                                count--; // Decrement count when a field is removed
                                            });  
                                        });  
                                    </script>
                                    <?php } ?>
                            </details><hr>
                            <details open>
                                <summary class="fs-5 text-info"><strong>III. ECONOMIC INFORMATION</strong></summary><br>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>RECIEVING A PENSION?</strong><font style="color:red">*</font></label>
                                        <select name="pension_y_n" class="form-control" required>
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('pension_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('pension_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>PLEASE SPECIFY</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="pension_source" value="<?php echo set_value('pension_source');?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>HAVE PERMANENT INCOME?</strong><font style="color:red">*</font></label>
                                        <select name="perm_income_y_n" class="form-control" required>
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('perm_income_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('perm_income_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>AMOUNT</strong><font style="color:red">*</font></label>
                                        <input type="number" class="form-control" name="perm_income_amount" value="<?php echo set_value('perm_income_amount');?>" id="perm_income_amount" required oninput="calculateTotal()">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3"> 
                                        <label class="form-label"><strong>RECEIVING REGULAR SUPPORT?</strong><font style="color:red">*</font></label>
                                        <select name="regular_support" class="form-control" required>
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('regular_support', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('regular_support', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>AMOUNT</strong><font style="color:red">*</font></label>
                                        <input type="number" class="form-control" name="regular_support_amount" value="<?php echo set_value('regular_support_amount');?>" id="regular_support_amount" required oninput="calculateTotal()">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"></div>

                                    <div class="col-md-6">
                                        <label class="form-label"><strong><font style="color:red">TOTAL</font> OF PERMANENT AND REGULAR INCOME</strong></label>
                                        <input type="number" id="total_income_support" class="form-control" name="total_income_support" required readonly>
                                    </div>
                                </div>

                                        <script>
                                            function calculateTotal() {
                                                const permIncomeAmount = document.getElementById('perm_income_amount').value;
                                                const regularSupportAmount = document.getElementById('regular_support_amount').value;
                                                const totalIncomeSupport = document.getElementById('total_income_support');

                                                const total = (parseFloat(permIncomeAmount) || 0) + (parseFloat(regularSupportAmount) || 0);
                                                totalIncomeSupport.value = total.toFixed(2);
                                            }
                                        </script>
                            </details><hr>

                            <details open>
                                <summary class="fs-5 text-info"><strong>IV. HEALTH INFORMATION</strong></summary><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>WITH EXISTING ILLNESS</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="illness" >
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('illness', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('illness', '2'); ?>>2 - NONE</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>PLEASE SPECIFY</strong><font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="illness_specify">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>WITH DISABILITY?</strong><font style="color:red">*</font></label>
                                        <select class="form-control" name="disability_y_n">
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('disability_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('disability_y_n', '2'); ?>>2 - NONE</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><strong>PLEASE SELECT DISABILITY</strong><font style="color:red">*</font></label>
                                            <select name="disability" id="" class="form-control" >
                                                <option value="">Please Select</option>
                                                <option value="1"<?php echo set_select('disability', '1'); ?>>1 - Communication Disability</option>
                                                <option value="2"<?php echo set_select('disability', '2'); ?>>2 - Disability due to Chr class="color"onic Illness</option>
                                                <option value="3"<?php echo set_select('disability', '3'); ?>>3 - Hearing disability</option>
                                                <option value="4"<?php echo set_select('disability', '4'); ?>>4 - Learning Disability</option>
                                                <option value="5"<?php echo set_select('disability', '5'); ?>>5 - Mental/Intellectual disability</option>
                                                <option value="6"<?php echo set_select('disability', '6'); ?>>6 - Multiple disabilities</option>
                                                <option value="7"<?php echo set_select('disability', '7'); ?>>7 - Orthopedic Disability</option>
                                                <option value="8"<?php echo set_select('disability', '8'); ?>>8 - Psychosocial Disability</option>
                                                <option value="9"<?php echo set_select('disability', '9'); ?>>9 - Speech impairment</option>
                                                <option value="10"<?php echo set_select('disability', '10'); ?>>10 - Visual Disability</option>
                                                <option value="11"<?php echo set_select('disability', '11'); ?>>11 - None</option>
                                            </select>
                                    </div><hr>

                                    <div class="col-md-12 mb-3">
                                        <label class="text-primary label mb-1 fs-5"><strong>FAILTY QUESTIONS</strong></label><br>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>DO YOU EXPERIENCE DIFFICULTY IN DOING YOUR ADLS?</strong></label>
                                        <select class="form-control" name="adl_difficulty_y_n">
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('adl_difficulty_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('adl_difficulty_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"><strong>ARE YOU COMPLETELTY DEPENDENT ON SOMEONE IN DOING YOUR IADLS?</strong></label>
                                        <select class="form-control" name="adl_do_someone_y_n">
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('adl_do_someone_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('adl_do_someone_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label"><strong>ARE YOU EXPERIENCING WEIGHT LOSS, WEAKNESS, EXHAUSTION?</strong></label>
                                        <select class="form-control" name="exhaustion_exp_y_n">
                                            <option value="">Please Select</option>
                                            <option value="1" <?php echo set_select('exhaustion_exp_y_n', '1'); ?>>1 - YES</option>
                                            <option value="2" <?php echo set_select('exhaustion_exp_y_n', '2'); ?>>2 - NO</option>
                                        </select>
                                    </div>
                                </div>
                                </details><hr>

                                <details open>
                                    <summary class="fs-5 text-info"><strong>V. ASSESSMENT AND VI. RECOMMENDATION</strong></summary><br>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label"><strong>ASSESSMENT</strong></label>
                                            <textarea class="form-control" name="assessment" value="<?php echo set_value('assessment');?>"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label"><strong>RECOMMENDATION</strong></label>
                                            <select class="form-control" name="recommendation">
                                                <option value="">Please Select</option>
                                                <option value="1" <?php echo set_select('recommendation', '1'); ?>>1 - ELIGIBLE</option>
                                                <option value="2" <?php echo set_select('recommendation', '2'); ?>>2 - NOT ELIGIBLE</option>
                                            </select>
                                        </div>
                                    </div>
                                </details><hr>

                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label"><strong>NAME OF VALIDATOR</strong></label>
                                        <input type="text" class="form-control" name="validator_name" value="<?php echo set_value('validator_name');?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label"><strong>DATE VALIDATED</strong></label>
                                        <input type="date" class="form-control" name="date_validate" value="<?php echo set_value('date_validate');?>" required>
                                    </div>
                        
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label"><strong>NAME OF ENCODER</strong></label>
                                        <input type="text" class="form-control" name="encoder_name" value="<?php echo set_value('encoder_name');?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label"><strong>DATE ACCOMPLISHED</strong></label>
                                        <input type="date" class="form-control" name="date_encoded" value="<?php echo set_value('date_encoded');?>" required>
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <label class="form-label"><strong>NAME OF APPLICANT OR RESPONDENT</strong></label>
                                        <input type="text" class="form-control" name="respondent_name" value="<?php echo set_value('respondent_name');?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label"><strong>DATE CONFIRMED</strong></label>
                                        <input type="date" class="form-control" name="date_confirmed" value="<?php echo set_value('date_confirmed');?>" required>
                                    </div>
                                </div><br>

                                    <div class="card-footer text-end">
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                        <input type="submit" name="addClientSubmit" class="btn btn-primary" id="btn_add" value="Submit" onclick="return confirm('Are you sure you want to add?')">
                                    </div>

                </div>  <!-- END CARD BODY-->

            </div>
        </div>
    </div>

</section>

</div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>


<!-- DYNAMIC ADDRESS -->
<script>
// Function to copy the permanent address to the present address fields
function copyPermanentAddress() {
    if (document.getElementById('copyAddress').checked) {
        document.getElementById('present_region').value = document.getElementById('perm_region').value;
        document.getElementById('present_province').value = document.getElementById('perm_province').value;
        document.getElementById('present_city').value = document.getElementById('perm_city').value;
        document.getElementById('present_brgy').value = document.getElementById('perm_brgy').value;
        document.getElementById('pre_sitio').value = document.getElementById('perm_sitio').value;
        document.getElementById('pre_street').value = document.getElementById('perm_street').value;
        
        // Disable the present address fields
        document.getElementById('present_region').disabled = true;
        document.getElementById('present_province').disabled = true;
        document.getElementById('present_city').disabled = true;
        document.getElementById('present_brgy').disabled = true;
        document.getElementById('pre_sitio').disabled = true;
        document.getElementById('pre_street').disabled = true;
    } else {
        document.getElementById('present_region').value = "";
        document.getElementById('present_province').value = "";
        document.getElementById('present_city').value = "";
        document.getElementById('present_brgy').value = "";
        document.getElementById('pre_sitio').value = "";
        document.getElementById('pre_street').value = "";

        // Enable the present address fields
        document.getElementById('present_region').disabled = false;
        document.getElementById('present_province').disabled = false;
        document.getElementById('present_city').disabled = false;
        document.getElementById('present_brgy').disabled = false;
        document.getElementById('pre_sitio').disabled = false;
        document.getElementById('pre_street').disabled = false;
    }
}

// jQuery document ready function to handle AJAX requests
$(document).ready(function() {
    function updatePresentAddressFields() {
        if ($('#copyAddress').is(':checked')) {
            $('#present_region').val($('#perm_region').val()).trigger('change');
            $('#pre_sitio').val($('#perm_sitio').val());
            $('#pre_street').val($('#perm_street').val());
        }
    }

    // Permanent Address Handlers
    $('#perm_region').change(function() {
        const region_id = $('#perm_region').val();
        if (region_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_province",
                method: "POST",
                data: { region_id: region_id },
                success: function(data) {
                    $('#perm_province').html(data);
                    $('#perm_city').html('<option value="<?php echo set_value('first_name');?>">Select Province First</option>');
                    $('#perm_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Province First</option>');
                    updatePresentAddressFields();
                }
            });
        } else {
            $('#perm_province').html('<option value="<?php echo set_value('first_name');?>">Select Province</option>');
            $('#perm_city').html('<option value="<?php echo set_value('first_name');?>">Select Municipality</option>');
            $('#perm_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#perm_province').change(function() {
        const province_id = $('#perm_province').val();
        if (province_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_city",
                method: "POST",
                data: { province_id: province_id },
                success: function(data) {
                    $('#perm_city').html(data);
                    $('#perm_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Municipality First</option>');
                    updatePresentAddressFields();
                }
            });
        } else {
            $('#perm_city').html('<option value="<?php echo set_value('first_name');?>">Select City</option>');
            $('#perm_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#perm_city').change(function() {
        const city_id = $('#perm_city').val();
        if (city_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_brgy",
                method: "POST",
                data: { city_id: city_id },
                success: function(data) {
                    $('#perm_brgy').html(data);
                    updatePresentAddressFields();
                }
            });
        } else {
            $('#perm_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    // Present Address Handlers
    $('#present_region').change(function() {
        const region_id = $('#present_region').val();
        if (region_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_province",
                method: "POST",
                data: { region_id: region_id },
                success: function(data) {
                    $('#present_province').html(data);
                    $('#present_city').html('<option value="<?php echo set_value('first_name');?>">Select Province First</option>');
                    $('#present_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Province First</option>');
                }
            });
        } else {
            $('#present_province').html('<option value="<?php echo set_value('first_name');?>">Select Province</option>');
            $('#present_city').html('<option value="<?php echo set_value('first_name');?>">Select Municipality</option>');
            $('#present_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#present_province').change(function() {
        const province_id = $('#present_province').val();
        if (province_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_city",
                method: "POST",
                data: { province_id: province_id },
                success: function(data) {
                    $('#present_city').html(data);
                    $('#present_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Municipality First</option>');
                }
            });
        } else {
            $('#present_city').html('<option value="<?php echo set_value('first_name');?>">Select City</option>');
            $('#present_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#present_city').change(function() {
        const city_id = $('#present_city').val();
        if (city_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_brgy",
                method: "POST",
                data: { city_id: city_id },
                success: function(data) {
                    $('#present_brgy').html(data);
                }
            });
        } else {
            $('#present_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#copyAddress').click(function() {
        copyPermanentAddress();
    });

    // Spouse Address Handlers
    $('#spouse_region').change(function() {
        const region_id = $('#spouse_region').val();
        if (region_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_province",
                method: "POST",
                data: { region_id: region_id },
                success: function(data) {
                    $('#spouse_province').html(data);
                    $('#spouse_city').html('<option value="<?php echo set_value('first_name');?>">Select Province First</option>');
                    $('#spouse_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Province First</option>');
                }
            });
        } else {
            $('#spouse_province').html('<option value="<?php echo set_value('first_name');?>">Select Province</option>');
            $('#spouse_city').html('<option value="<?php echo set_value('first_name');?>">Select Municipality</option>');
            $('#spouse_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#spouse_province').change(function() {
        const province_id = $('#spouse_province').val();
        if (province_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_city",
                method: "POST",
                data: { province_id: province_id },
                success: function(data) {
                    $('#spouse_city').html(data);
                    $('#spouse_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Municipality First</option>');
                }
            });
        } else {
            $('#spouse_city').html('<option value="<?php echo set_value('first_name');?>">Select City</option>');
            $('#spouse_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });

    $('#spouse_city').change(function() {
        const city_id = $('#spouse_city').val();
        if (city_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Main/fetch_brgy",
                method: "POST",
                data: { city_id: city_id },
                success: function(data) {
                    $('#spouse_brgy').html(data);
                }
            });
        } else {
            $('#spouse_brgy').html('<option value="<?php echo set_value('first_name');?>">Select Barangay</option>');
        }
    });
});
</script>