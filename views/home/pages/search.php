<section class="section first-section">
   <div class="container-fluid">
      <div class="masonry-blog clearfix">
      </div>
   </div>
</section>

<section class="section">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="page-wrapper">
               <div class="blog-top clearfix">
                  <h4 class="pull-left">Search results <a href="#"><i class="fa fa-rss"></i></a></h4>
               </div>
               <!-- end blog-top -->
                        <?php 
                        foreach($data['search'] as $search){
                        ?>
                           <div class="blog-list clearfix">
                              <div class="blog-box row">
                                 <div class="col-md-4">
                                    <div class="post-media">
                                       <a href="?c=home&a=single&id=<?= $search['id'] ?>" title="">
                                          <img src="assets/uploads/<?= $search['img'] ?>" alt="" class="img-fluid">
                                          <div class="hovereffect"></div>
                                       </a>
                                    </div>
                                    <!-- end media -->
                                 </div>
                                 <!-- end col -->
                                 <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="?c=home&a=single&id=<?= $search['id'] ?>" title=""><?= $search['title'] ?></a></h4>
                                    <p><?= substr(strip_tags($search['content']), 0, 200) . '...'; ?></p>
                                    <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Gadgets</a></small>
                                    <small><a href="#" title="">12:123</a></small>
                                    <small><a href="#" title=""><?php echo 'By '.$search['user_id'] ?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 1114</a></small>
                                 </div>
                                 <!-- end meta -->
                              </div>
                              <!-- end blog-box -->
                              <hr class="invis">
                           </div>
                        <?php } ?>
                <hr class="invis">
            </div>
         </div>
         <?php require_once "views/home/components/sidebar.php" ?>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>