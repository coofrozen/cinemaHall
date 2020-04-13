  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fas fa-file-pdf text-aqua"></i> Files
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Files</a></li>
        <li class="active">Download</li>
      </ol>
    </section>

    <section class="content">
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="box box-warning">
            <div class="box-header">
              <center><h3>Please Upload File here</h3></center>
                  <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                                <div class="panel-heading">
                                    File Upload Form
                                </div>
                                <center>
                                  <div style="color: green;"><h4><?php  echo $this->session->flashdata('upload Success'); ?></h4></div>
                                </center>
                                <center>
                                  <div style="color: red;"><h4><?php  echo $this->session->flashdata('upload Failed'); ?></h4></div>
                                </center>
                                <?php echo form_open_multipart('cofree/files/upload');?>
                                      <label class="control-label col-md-3">File Title</label>
                                          <div class="col-md-9">
                                              <input name="kno" placeholder="Title" class="form-control" type="text" required="">
                                          </div>
                                              <input class="btn" type="file" name="userfile" size="20">
                                                  <div class="panel-footer">
                                              <input class="btn btn-info form-control" type="submit" value="upload" />
                                          </div>
                          </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                          <div class="panel panel-yellow">
                                <div class="panel-heading">
                                      Attention
                                </div>
                                <div class="panel-body">
                                      <p>The file Which is uploaded shall not exceed 10MB and should be with the following file format or extention. <br><br> <a  data-toggle="tooltip" title="its also an PowerPoint file format">.pptx</a><a data-toggle="tooltip" title="its Adobe Acrobat Reader file format">.pdf</a><a  data-toggle="tooltip" title="its also an PowerPoint file format">.pptx</a></p>
                                </div>
                                <div class="panel-footer">
                                      <i style="color: red;">Attention: If the requirments are not fulfilled the data won't be submited</i>
                                </div>
                          </div>
                    </div> 
              </div>
            </div>
        </div>
      </div>
    </section>

              <!-- /.row -->
      <section class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="box box-warning">
            <div class="box-header">
                <center><h3>Files for download below</h3></center>
                    <div class="table-responsive">
                            <table id="table_id" class="table table-striped  table-condensed table-hover">
                                  <thead>
                                      <tr>
                                         <th>Title</th>
                                         <th>File Name</th>
                                         <th>Created On</th>
                                         <th style="min-width: 70px";>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach($ppt as $frow){ ?>      
                                          <tr>
                                              <td><?php echo $frow['title'];?></td>
                                              <td><?php echo $frow['file_name'];?></td>
                                              <td><?php echo $frow['created'];?></td>
                                              <th><a  class="btn-danger form-control"  href="<?php echo base_url().'cofree/files/download/'.$frow['id']; ?>" ><center><i class="glyphicon glyphicon-cloud-download"></i></center></a></th>
                                          </tr>     
                                      <?php }?>
                                  </tbody>
                                      
                                  </table>
                      </div>
                </div>
              </div>
            </div>
        </div>
 
                           
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>

<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script> 
<!-- bootstrap editor -->
      <script type="text/javascript">
       $(document).ready( function () {
              $('#table_id , #table_member').DataTable( {
              "order" : [],   
              dom: 'lBfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );        
      } );

      </script>

  </section>
</div>