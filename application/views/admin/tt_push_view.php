
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        NOSM 
        <small>TT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url("cofree/home")?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">TT's Upload</li>

      </ol>
    </section>




<div class="row" style="text-align: center";>

  <div style="color: green;"><h1><?php  echo $this->session->flashdata('Table emptied'); ?></h1></div>
  <div style="color: green;"><h1><?php  echo $this->session->flashdata('upload Success'); ?></h1></div>
  <div style="color: red;"><h1><?php  echo $this->session->flashdata('upload Failed'); ?></h1></div>

</div>

    <div class="col-lg-12">
        <div class="row">
                    <div class="col-lg-6">
                           <div class="box box-success">
                                  <div class="box-header">
                                                      UPLOAD FILE FORM
                                 </div>
                                 <div class="box-body">
                                    <br>
                                             <?php echo form_open_multipart('cofree/push/'.$push_controller);?>

                                    <input class="btn" type="file" name="file" size="20" required="">
                                    <input class="btn btn-info form-control" type="submit" value="Upload">
                                  </div>                 
                                  <div class="box-footer">
                                       <center><i style="color: red;"> Total Number Of Rows inside Table: <?php echo $row_number; ?></i></center>  
                                  </div>
                            
                        </div>    
                    </div>

                    <div class="col-lg-6">
                           <div class="box box-danger">
                                 <div class="box-header">
                                                      Attention
                                  </div>
                                                  <div class="box-body">
    
                                                      <h4>file uploaded shall not exceed 5MB size and should be with the following file format or extention. <a data-toggle="tooltip" title="light weight spreed sheet file format."> .xls</a></h4>
                                                      <h4>You can also download the sample file showing the table structure for upload using the following <a href="<?php echo base_url().'cofree/push/download/';?>">link</a></h4>
                                                      <h4 class="text-red">and clean all the records using the clean button below</h4>
                                                      <button class="button btn-danger form-control" onclick="truncate()">clean</button>


                                                      
                                                  </div>
                                                  <div class="box-footer">
                                                      <i style="color: red;">Attention: If the requirments are not fulfilled the data won't be submited</i>
                                                  </div>              
                          </div>    
                    </div>
                    <!-------- end of col md 12-------->

                  </div>
                  <a class="btn btn-success form-control" href="<?php echo base_url('cofree/push')?>">VIEW SUMMARY<span class="fa fa-bar-chart-o pull-right"></span></a>
                </div>
              </div>



<script type="text/javascript">
      
    function truncate()
    {
      if(confirm('Are you sure delete all the data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('cofree/push/truncate')?>",
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               alert('All data cleaned');
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

    