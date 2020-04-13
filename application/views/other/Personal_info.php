 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Profiles</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">Profiles</li>
      </ol>
    </section>
<section class="content">
  <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">

              <button  class="btn btn-success" onclick="edit_pass(<?php echo $this->session->userdata('id');?>)"><i class="glyphicon glyphicon-refresh"></i>  Change Password  </button>
            </div>

    <div class="box-body">

        <!-- Blog Post Row -->
        <div class="row">
            <div class="col-md-1 text-center">
                <p><i class="fa fa-camera fa-4x"></i>
                </p>
                <p><?php echo date("y-m-d");?></p>
            </div>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <img class="img-responsive bg-danger" src="<?php echo base_url('upload')."/". $this->session->userdata('pic');?>" alt="" style="height: 350px; width: 350px;">
                    <div class="caption">
                        <h2><?php echo ucfirst($this->session->userdata('fullname'));?><br></h2>
                            <h3><?php echo $this->session->userdata('oracle_id');?></h3>
                            <?php echo $this->session->userdata('email');?>
                            <h4><?php echo ucfirst($this->session->userdata('department'));?></h4>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            </div>
        <!-- /.row -->
        </div>
       <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
   <!-- /.col -->
</div>
 <!-- /.row --> 


<!-- jquery -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">
 $(document).ready( function () {
        $('#table_id').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


 
    var save_method; //for save method string


    function edit_pass(id)
    {
      save_method = 'update';
      $('#xform')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('cofree/personal_info/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
//all the hidden ids are names for modal inputs and the data's written in bald are database columns
  
          $('[name="id"]').val(data.id);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Change Password (<?php echo $this->session->userdata('id');?>)'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }


  

    function change()
    {
        save_method="update";
         url = "<?php echo site_url('cofree/personal_info/password_update')?>";
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#xform').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
                location.reload();// for reload a page

              alert('Password Changed Successfully');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('password Does not match');
            }
        });
    }

  



    
</script>

            <div class="modal fade" id="modal_form" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" style="color: green;"></h3>
                  </div>
                  <div class="modal-body form">
                    <form action="#" id="xform" class="form-horizontal">
                      <input type="hidden" value="" name="id"/>
                      <div class="form-body">
                        <div class="form-group">
                          <label class="control-label col-md-3">Current Password</label>
                          <div class="col-md-9">
                          <input name="oldpass" placeholder="Current Password" class="form-control" type="password" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">New Password</label>
                          <div class="col-md-9">
                            <input name="newpass" placeholder="New Password" class="form-control" type="password" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Confirm Password</label>
                          <div class="col-md-9">
                            <input name="confirmpass" placeholder="Confirm Password" class="form-control" type="password" required="">
                          </div>
                        </div>
                    </form>
                  </div>
                      <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="change()" class="btn btn-success">Change</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

</section>
    <!-- /.content -->
  
</div>
<!-- ./wrapper -->