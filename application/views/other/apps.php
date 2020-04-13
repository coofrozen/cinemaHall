 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fas fa-file text-red"></i>&nbsp; Apps Download
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="#">Download</a></li>
        <li class="active">Apps</li>
      </ol>
    </section>


<section class="content">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h1 >Readable Apps</h1>
              <div class="col-md-4 col-xs-12">
                <form method='post' action="<?= base_url() ?>/do_apps/loadRecord" >
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name='search' value='<?= $search ?>'>
                          <span class="input-group-btn">
                            <button value='Submit' name='submit' type="submit" class="btn btn-info btn-flat">Search</button>
                          </span>
                    </div>
                </form>  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <?php foreach($result as $book){?>
                <div class="panel box">
                  <div class="box-header with-border">
                    <a  class="btn btn-warning"  href="<?php echo base_url().'do_apps/download/'.$book['id']; ?>" ><i class="fas fa-download"></i></a>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $book['id'];?>">
                    <h4 class="box-title">
                          <?php echo "Title:&nbsp;".$book['title'];?>

                    </h4>
                    <h5 class="btn pull-right text-red box-title"><?php echo $book['app_name'];?></h5>
                    </a>
                  </div>
                </div>
              <?php }?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div style='margin-top: 5px;'>
          <?= $pagination; ?>
        </div>
      </div>
  </div>
</section>
</div>
<!-- ./wrapper -->



