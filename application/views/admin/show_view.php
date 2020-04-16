  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-sitemap text-aqua"></i> show
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Main Settings</a></li>
        <li class="active">show</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
  <button  class="btn btn-success" onclick="add_show()"><i class="glyphicon glyphicon-plus"></i>New Show</button>
  <button class="btn btn-danger pull-right" onclick="bulk_delete()"><i class="glyphicon glyphicon-trash"></i> Bulk Delete</button>
             </div>
            <!-- /.box-header -->
          <div class="box-body">

    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
          
          <th><input type="checkbox" id="check-all"></th>
          <th>Load Time</th>
          <th>Show Title</th>
          <th>Show Identifier</th>
          <th>Seat Genrs.</th>
          <th>Show Start Date</th>
          <th>Show End Date</th>
          <th></th>
          <th></th>

          
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
            "url": "<?php echo site_url('Admin/shows/ajax_list')?>",
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



    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });

    

    var save_method; //for save method string
    var table;

////////////////////////*****end for search and table nos****/////////////////////////////
  
    function add_show()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Ne'); // Set Title to Bootstrap modal title
    }

    function edit_show(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Admin/shows/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
//all the hidden ids are names for modal inputs and the data's written in bald are database columns

          $('[name="id"]').val(data.id);
          $('[name="show_title"]').val(data.show_title);
          $('[name="show_genrs"]').val(data.show_genrs);
          $('[name="show_start_date"]').val(data.show_start_date);
          $('[name="show_end_date"]').val(data.show_end_date);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Show Info'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('Admin/shows/show_add')?>";
      }
      else
      {
          url = "<?php echo site_url('Admin/shows/show_update')?>";
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

    function delete_show(id)
    {
      if(confirm('Are you sure delete the data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('Admin/shows/show_delete')?>/"+id,
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

    function bulk_delete()

    {
        var list_id = [];
        $(".data-check:checked").each(function() {
                list_id.push(this.value);
        });
        if(list_id.length > 0)
        {
            if(confirm('Are you sure delete this '+list_id.length+' data?'))
            {
                $.ajax({
                    type: "POST",
                    data: {id:list_id},
                    url: "<?php echo site_url('Admin/shows/ajax_bulk_delete')?>",
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status)
                        {
                            reload_table();
                        }
                        else
                        {
                            alert('Failed.');
                        }
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
            }
        }
        else
        {
            alert('Please Select Some Data');
        }
    }

</script>



  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" >SHOW ADD</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <div class="form-body">
             <div class="form-group">
                <label class="control-label col-md-3">Show Title</label>
                <div class="col-md-9">
                  <input class="form-control" name="show_title" placeholder="Full Name" type="text"/>
                  <span class="help-block"></span>
                </div>
             </div> 
             <div class="form-group">
              <label class="control-label col-md-3">Show Genrs</label>
              <div class="col-md-9">
                <select class="form-control select2" name="show_genrs">
                  <option value="">..Please Select..</option>
                  <?php foreach ($show_genere as $sho) {?>
                    <option value="<?php echo $sho->show_genre;?>"><?php echo $sho->show_genre;?></option>
                  <?php } ?>
                </select>                
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Show Start Date</label>
              <div class="col-md-9">
                <input name="show_start_date" placeholder="Show Start Date" class="form-control" type="date" required="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Show End Date</label>
              <div class="col-md-9">
                <input name="show_end_date" placeholder="Show End Date" class="form-control" type="date" required="">
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