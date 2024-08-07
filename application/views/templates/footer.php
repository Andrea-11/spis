


<script>
    var timeout = 2000; // in miliseconds (3*1000)

$('.alert').delay(timeout).fadeOut(1000);

</script>

<script>
$(document).ready(function(){
    $('#region').change(function(){
        var region_id = $('#region').val();
        if(region_id != '') {
            $.ajax({
                url:"<?php echo base_url(); ?>User/select_center",
                method:"POST",
                data:{region_id:region_id},
                success:function(data) {
                    $('#center').html(data);
                    $('#sector').html('<option value="" class="text-dark">Select Center First</option>');
                }
            });
        } else {
            $('#center').html('<option value="" class="text-dark">Select Center</option>');
            $('#sector').html('<option value="" class="text-dark">Select Sector</option>');
        }
    });

    $('#center').change(function(){
        var center_id = $('#center').val();
        if(center_id != '') {
            $.ajax({
                url:"<?php echo base_url(); ?>User/select_sector",
                method:"POST",
                data:{center_id:center_id},
                success:function(data) {
                    $('#sector').html(data);
                }
            });
            // Additional Ajax call for center address
            $.ajax({
                url:"<?php echo base_url(); ?>User/select_center_address",
                method:"POST",
                data:{center_id:center_id},
                success:function(data) {
                    $('#center_address').html(data);
                }
            });
        } else {
            $('#sector').html('<option value="" class="text-dark">Select Sector</option>');
        }
    });
});

</script>

<script>
	$(document).on('click', '.toggle-log_password', function() {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $("#log_password");
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        $(this).attr('title', 'Hide Password');
    } else {
        input.attr('type', 'password');
        $(this).attr('title', 'Show Password');
    }});


	$(document).on('click', '.toggle-reg_password', function() {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $("#reg_password");
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        $(this).attr('title', 'Hide Password');
    } else {
        input.attr('type', 'password');
        $(this).attr('title', 'Show Password');
    }});


	$(document).on('click', '.toggle-conf_password', function() {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $("#conf_password");
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        $(this).attr('title', 'Hide Password');
    } else {
        input.attr('type', 'password');
        $(this).attr('title', 'Show Password');
    }});
</script>



</div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<script src='https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js'></script>

<script src='https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js'></script>
<script src='https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js'></script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>


<footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © PMB SOCPEN 2024</span></div>
        </div>
</footer>