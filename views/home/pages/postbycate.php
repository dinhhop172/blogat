<section class="section">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="page-wrapper">
               <div class="blog-top clearfix">
                  <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
               </div>
               <!-- end blog-top -->
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 mb-4">
                            <p class="mb-0 text-center bg-like text-white"><?= $data['catename']['name'] ?><p>
                        </div>
                    </div>
                    <!-- //o day -->
                    <?php foreach($data['postbycate'] as $postByCate){ ?>
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                            <div class="post-media">
                                <a href="?c=home&a=single&id=<?= $postByCate['id'] ?>" title="">
                                    <img src="assets/uploads/<?= $postByCate['img'] ?>" alt="" class="img-fluid">
                                    <div class="hovereffect"></div>
                                </a>
                            </div>
                            <!-- end media -->
                            </div>
                            <!-- end col -->
                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="?c=home&a=single&id=<?= $postByCate['id'] ?>" title=""><?= $postByCate['title'] ?></a></h4>
                                <p><?= substr(strip_tags($postByCate['content']), 0, 200) . '...'; ?></p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Gadgets</a></small>
                                <small><a href="#" title="">12:123</a></small>
                                <small><a href="#" title=""><?php echo 'By '.$postByCate['user_id'] ?></a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> 1114</a></small>
                            </div>
                            <!-- end meta -->
                        </div>
                        <!-- end blog-box -->
                        <hr class="invis">
                    </div>
                    <?php } ?>
                  <hr class="invis">
                  <!-- <div class="row">
                     <div class="col-md-12">
                        <nav aria-label="Page navigation">
                           <ul class="pagination justify-content-start">
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                 <a class="page-link" href="#">Next</a>
                              </li>
                           </ul>
                        </nav>
                    </div>
                </div> -->
            </div>
         </div>
         <?php require_once "views/home/components/sidebar.php" ?>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>