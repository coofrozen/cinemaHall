  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fas fa-user-check text-red"></i>&nbsp; Reservation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Main Settings</a></li>
        <li class="active">Reservation</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header"></div>
            <!-- /.box-header -->
          <div class="box-body">

    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
					
          <th>Attend.</th>          
          <th>Show Title</th>
          <th>Show Genre</th>
          <th>Full Name</th>
          <th>Mobile Number</th>
          <th>Seat Info.</th>
          <th>Payment Date</th>
          <th>Ticket Number</th>
          <th style="min-width: 25px";></th>

          
        </tr>
      </thead>
      <tbody>
      </tbody>

      
    </table>
   
          </div>
        <!-- table -->
       </div>
       <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
   <!-- /.col -->
</div>
 <!-- /.row -->


<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        dom: 'lBfrtip',
        buttons: [
            'copy','pdf'
        ],// add buttons for export functionality

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('reservation/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],

    });

  });


    

    var save_method; //for save method string
    var table;

      function edit_res(idr)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('reservation/ajax_edit/')?>/" + idr,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
//all the hidden ids are names for modal inputs and the data's written in bald are database columns

          $('[name="idr"]').val(data.idr);
          $('[name="attendance"]').val(data.attendance);



            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Reservation Info'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    
    {
    table.ajax.reload(null,false); //reload datatable ajax 
    }


    function save()
    {
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable 

      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('reservation/ne_add')?>";
      }
      else
      {
          url = "<?php echo site_url('reservation/ne_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();// for reload of table
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

    function delete_res(idr)
    {
      if(confirm('Are you sure delete the data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('reservation/ne_delete')?>/"+idr,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

</script>



  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" >Reservation ADD</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="idr"/>
          <div class="form-body">
             <div class="form-group">
              <label class="control-label col-md-3">Attendance Info</label>
              <div class="col-md-9">
                <select class="form-control select2" name="attendance">
                    <option value="1">ATTENDED</option>
                    <option value="0">NOT ATTENDED</option>
                </select>                
                <span class="help-block"></span>
              </div>
            </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
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