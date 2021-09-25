<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/admin/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin/dist/js/adminlte.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assets/admin/dist//js/pages/dashboard2.js"></script> -->
<script>
  $(document).ready(function() {
    
    // $.ajax({
    //   url: '?c=admin&a=data',
    //   method: 'get',
    //   contentType: 'application/json',
    //   success: function(response){
    //     $json = JSON.parse(response);
    //     $entries = {"data" : $json};
    //     $json2 = JSON.stringify($entries);
    //     console.log($json2);
        $('#example').DataTable({});
        // $('#myModal').modal({backdrop: 'static', keyboard: false})  
      //   $('#example').dataTable( {
      //       "ajax": $json2,
      //       "columns": [
      //           { "data": "name" },
      //           { "data": "email" },
      //           { "data": "role" },
      //           { "data": "created_at" }
      //       ]
      //   })
      // }
    // })


    // $.ajax({
    //   url: "?c=admin&a=data",
    //   method: "GET"
    // }).done( function(data) {
    //     $('#example').dataTable( {
    //         "aaData": data,
    //         "columns": [
    //             { "data": "name" },
    //             { "data": "email" },
    //             { "data": "role" },
    //             { "data": "created_at" }
    //         ]
    //     })
    // })

    $('#addtv').on('click', function(e){
      if($("#addtv-form")[0].checkValidity()){
        e.preventDefault();
        $.ajax({
          url: "?c=admin&a=store",
          method: "post",
          data: $("#addtv-form").serialize()+"&action=addmm",
          success: function(response){
            // $("#register-btn").val("Sign up");
            // if(response === 'register'){
            //   window.location = '?c=home';
            // }else{
            //   $('.errAlert').html(response);
            // }
            if(response == 'success'){
              window.location = '?c=admin';
            }else{
              $('.err_add_mm').html(response);
            }
          },
          error: function(err){
            console.log(err);
          }
        })
      }
    })

    // $("#update_mm").click(function(e){
    //   e.preventDefault();
    //   $err = "<div id='alert-err' class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong id='str_err_pw' class='text-center'></strong></div>";
    //   if($("#password").val() < 5){
    //     $("#app_update").prepend($err);
    //     $('#str_err_pw').text('Mật khẩu tối thiểu 5 ký tự');
    //   }else{
    //     $('#alert-err').remove();
    //     return true;
    //   }
    //   return true;
    // });
  });
</script>
</body>
</html>
