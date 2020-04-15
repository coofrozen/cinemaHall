
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
       <div class="col-lg-12 ">
         
      <header id="myCarousel" class="carousel slide" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>     
               <div class="carousel-inner">
                        <div class="item active">
                            <div class="fill" style="background-image:url('<?php echo base_url()?>assets/img/temp_img/vv.jpg');"></div>
                            <!-- <div class="carousel-caption">
                                <h2>Caption 1</h2>
                            </div> -->
                        </div>
                        <div class="item">
                            <div class="fill" style="background-image:url('<?php echo base_url()?>assets/img/temp_img/ww.jpg');"></div>
                            <!-- <div class="carousel-caption">
                                <h2>Caption 2</h2>
                            </div> -->
                        </div>
                        <div class="item">
                            <div class="fill" style="background-image:url('<?php echo base_url()?>assets/img/temp_img/xx.jpg');"></div>
                            <!-- <div class="carousel-caption">
                                <h2>Caption 3</h2>
                            </div> -->
                        </div>
                        <div class="item">
                            <div class="fill" style="background-image:url('<?php echo base_url()?>assets/img/temp_img/yy.jpg');"></div>
                            <!-- <div class="carousel-caption">
                                <h2>Caption 4</h2>
                            </div> -->
                        </div>
                        <div class="item">
                            <div class="fill" style="background-image:url('<?php echo base_url()?>assets/img/temp_img/zz.jpg');"></div>
                           <!--  <div class="carousel-caption">
                                <h2>Caption 5</h2>
                            </div> -->
                        </div>
              </div>

        <!-- Controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="icon-prev"></span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="icon-next"></span>
              </a>
        </header>
<!-- carousal end -->

       </div>
     </div>
    </section>

<section class="content">
  <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h4 class="text-success"><i class="fas fa-home"></i> Dashboard</h4>
            </div>

          <div class="box-body">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-lime">
                  <a href="<?php echo base_url("files")?>" class="small-box-footer">
                    <div class="inner">
                      <h2>Files</h2>
                      <h3 class="text-white">454<sup style="font-size: 20px">+</sup></h3>
                    </div>
                    <div class="icon">
                    <i class="fas fa-file-pdf"></i>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <a href="<?php echo base_url("files")?>" class="small-box-footer">
                    <div class="inner">
                      <h2>Apps</h2>
                      <h3 class="text-white">344<sup style="font-size: 20px">+</sup></h3>
                    </div>
                    <div class="icon">
                      <i class="fab fa-app-store"></i>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                  <div class="small-box-footer">
                    <div class="inner">
                      <h2>News</h2>
                      <h3 class="text-white">500<sup style="font-size: 20px">+</sup></h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-newspaper"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-teal">
                  <div class="small-box-footer">
                    <div class="inner">
                      <h2>Downloads</h2>
                      <h3 class="text-white">2122<sup style="font-size: 20px">+</sup></h3>
                    </div>
                    <div class="icon">
                      <i class="fas fa-download"></i>
                    </div>
                  </div>
                </div>
              </div>
      
        </div>
        </div>
      <!-- /.row -->
          </div>
      </div>
  </div>
</section> 
      <!-- dashboard section end -->
      <!-- news section start -->

</div>

    <!-- Script to Activate the Carousel -->
<script>

var $item = $('.carousel .item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight/2); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});
$('.carousel').carousel({
  interval: 5000,
  pause: "false"
});
</script>