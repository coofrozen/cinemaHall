<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        NOSM 
        <small>FAQ</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">FAQ</li>

      </ol>
    
    </section>
    <section class="content">
         <div class="row">
                  <div class="col-lg-12">   
                      <div class="panel-group" id="accordion">
                      <?php foreach($faq as $book){?>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $book->id;?>">
                                      <?php echo "Question:".$book->id.". ".$book->question;?></a>
                                  </h4>
                              </div>
                              <div id="<?php echo $book->id;?>" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <?php echo "Answer: ". $book->description;?>
                                  </div>
                              </div>
                          </div>
                      <?php }?> 
                      </div>  
                  </div>
          </div>  

        </section>
      </div>
