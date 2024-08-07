<?php 
$csrf = array(
'name' => $this->security->get_csrf_token_name(),
'hash' => $this->security->get_csrf_hash()
);

?>

<style>
  div.a {
    position: relative;
    top: 30px;
} 
</style>

<div class="a container-fluid">
  <div class="card">
    <div class="card-header"><h2 class="card-title">Newly Registered Account</h2></div>
      <div class="card-body">
        <table id="search" class="table table-striped table-bordered" cellspacing="0" th:fragment="table" width="100%">
          <thead>
              <tr>
                <th>ID No.</th>
                <th>Full Name (Last Name, First Name, Middle Name, Ext. Name)</th>
                <th>Email</th>
                <th>Region</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>

            <?php
            foreach($user_list as $row){  



            ?>  

          <tr>
            <td><?php echo $row->user_id; ?></td>
            <td><?php echo $row->last_name;?>, <?php echo $row->first_name;?> <?php echo $row->middle_name;?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->region_name; ?></td>

            <td class="text-center">
              <span data-bs-toggle="modal" data-bs-target="#user_type<?php echo $row->user_id; ?>">
              <a href="#"  data-bs-toggle="tooltip" data-bs-placement="top"title="Select User Type">  <i class="fa-solid fa-check fa-sm fa-fw mr-2 text-success"></i></a>
              </span> | 

              <a href="<?php echo base_url(); ?>admin/delete_new_user/<?php echo $id=$row->user_id ?>" onclick="return confirm('Are you sure you want to delete?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa-solid fa-trash-can fa-sm fa-fw mr-2 text-danger"></i></a>
            </td> 
          </tr>

      <!-- USER TYPE SELECT -->
    <div class="modal fade" user_id="user_type<?php echo $row->user_id; ?>" tabindex="-1" aria-labelledby="editclient" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" style="max-width: 20%;" >
        <div class="modal-content">
          <div class="modal-header" style="background-color: #00AA9E;">
            <div class="modal-title text-light" user_id="editclient">
              <label class="form-label">User Type</label>
            </div>
          </div>

          <div class="modal-body">
            <form method="POST" action="<?php echo base_url(); ?>admin/update_user_type" autocomplete="off" >
              <input type="hidden" name="id" value="<?php echo $row->user_id ?>">

                <div class="mb-3">
                  <select name="user_type" class="form-control">
                      <option value="">Please Select</option>
                      <option value="admin" >1 - Admin</option>
                      <option value="regional" >2 - Regional</option>
                      <option value="co">3 - Central Office</option>
                  </select>
                  <input type="hidden" name="status" value="0" />
                </div>

                <div class="modal-footer">
                  <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure you want to add?')"><i class="fa-solid fa-check fa-sm fa-fw mr-2"></i> Okay</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-sm fa-fw mr-2"></i> Cancel</button>
                </div>
            </form>
          </div>
        <?php } ?>
    </tbody>
  </table>
    </div>
  </div>
</div>
<!-- =========================================================================================== -->



  <br>
  
  <script>
  $(document).ready(function () {
      $('#search').DataTable({
          order: [[0, 'asc']],
      });
  });
  
  </script>

<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>