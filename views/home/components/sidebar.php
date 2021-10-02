<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
   <div class="sidebar">
      <div class="widget">
         <!-- <div class="banner-spot clearfix">
            <div class="banner-img">
               <img src="assets/upload/banner_07.jpg" alt="" class="img-fluid">
            </div>
         </div> -->
         <!-- end banner -->
      </div>
      <!-- end widget -->
      <!-- end widget -->
      <div class="widget">
         <h2 class="widget-title">Popular Posts</h2>
         <?php foreach($data['popular'] as $popular){ ?>
         <div class="blog-list-widget">
            <div class="list-group">
                  <a href="?a=home&a=single&id=<?= $popular['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                     <div class="w-100 justify-content-between">
                        <img src="assets/uploads/<?= $popular['img'] ?>" alt="" class="img-fluid float-left">
                        <h5 class="mb-1"><?= $popular['title'] ?></h5>
                        <small><?= $popular['created_at'] ?></small>
                     </div>
                  </a>
            </div>
         </div>
         <?php } ?>
         <!-- end blog-list -->
      </div>

      <!-- category -->
      <div class="widget">
            <h2 class="widget-title" style="margin-bottom: 5px;">Categories</h2>
            <div class="blog-list-widget">
                  <div class="list-group">
                  <?php foreach($data['cates'] as $cate){ ?>
                     <p style="margin-bottom: 0px;"><a href="?c=home&a=find&id=<?= $cate['id'] ?>"><?= $cate['name'] ?></a></p>
                  <?php } ?>
                  </div>
            </div><!-- end blog-list -->
      </div>

      <div class="widget">
         <h2 class="widget-title">Follow Us</h2>

         <div class="row text-center">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
               <a href="#" class="social-button facebook-button">
                  <i class="fa fa-facebook"></i>
                  <p>27k</p>
               </a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
               <a href="#" class="social-button twitter-button">
                  <i class="fa fa-twitter"></i>
                  <p>98k</p>
               </a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
               <a href="#" class="social-button google-button">
                  <i class="fa fa-google-plus"></i>
                  <p>17k</p>
               </a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
               <a href="#" class="social-button youtube-button">
                  <i class="fa fa-youtube"></i>
                  <p>22k</p>
               </a>
            </div>
         </div>
      </div>
      <!-- end widget -->
   </div>
   <!-- end sidebar -->
</div>
<!-- end col -->