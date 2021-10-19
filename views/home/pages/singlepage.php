<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active"><?= $data['getpost']['title'] ?></li>
                        </ol>
        <!-- <h2><a href="?c=home&a=test&id=143">test</a></h2> -->
                        <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>

                        <h3><?= $data['getpost']['title'] ?></h3>

                        <div class="blog-meta big-meta">
                            <small><a href="tech-single.html" title="">@313123213</a></small>
                            <small><a href="tech-author.html" title="">by dinhop</a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                        </div>
                        <!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <!-- end post-sharing -->
                        </div>

                        <div class="single-post-media">
                            <img src="uploads/" alt="" class="img-fluid">
                        </div>
                        <div class="blog-content">
                            <div class="pp">
                                <?= $data['getpost']['content'] ?>
                            </div>
                        </div>
                    </div>
                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <h1 class="text-warning mt-4 mb-4">
                                            <b><span id="average_rating"></span> / 5</b>
                                        </h1>
                                        <div class="mb-3">
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                        </div>
                                        <h3><span class="total_review">0</span> Review</h3>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                                            
                                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                            </div>               
                                        </p>
                                        <p>
                                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                                            
                                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                            </div>               
                                        </p>
                                        <p>
                                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                                            
                                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                            </div>               
                                        </p>
                                        <p>
                                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                            
                                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                            </div>               
                                        </p>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h3 class="mt-4 mb-3">Write Review Here</h3>
                                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mt-5" id="review_content"></div> -->
                    </div>

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title "><span class="total_review"></span> Reviews</h4>
                        <div class="row" id="id_post" data-post="<?= $_GET['id'] ?>">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    <!-- <div class='media'>
                                        <a class='media-left' href='#'>
                                            <img src='upload/author.jpg' alt='' class='rounded-circle'>
                                        </a>
                                        <div class='media-body'>
                                            <h4 class='media-heading user_name'>Amanda Martines <small>5 days ago</small></h4>
                                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                            <a href='#' class='btn btn-primary btn-sm'>Reply</a>
                                        </div>
                                    </div> -->
                                    <!-- <div class="media last-child">
                                        <a class="media-left" href="#">
                                            <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                            <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Submit Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="text-center mt-2 mb-4">
                                        <i class="fas fa-star star-light star mr-1" id="star_1" data-rating="1"></i>
                                        <i class="fas fa-star star-light star mr-1" id="star_2" data-rating="2"></i>
                                        <i class="fas fa-star star-light star mr-1" id="star_3" data-rating="3"></i>
                                        <i class="fas fa-star star-light star mr-1" id="star_4" data-rating="4"></i>
                                        <i class="fas fa-star star-light star mr-1" id="star_5" data-rating="5"></i>
                                    </h4>
                                    <div class="form-group">
                                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                                    </div>
                                    <div class="form-group text-center mt-4">
                                        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <!-- <div class="custombox clearfix">
                    <h4 class="small-title">You may also like</h4>
                    <div class="row">
                    
                        <div class="col-lg-6">
                            <div class="blog-box">
                                <div class="post-media">
                                <a href="singlepage.php?id=" title="">
                                    <img src="uploads/" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class=""></span>
                                    </div>
                                </a>
                                </div>
                                <div class="blog-meta">
                                <h4><a href="singlepage.php?id=" title="">kajsdkasldk</a></h4>
                                <small><a href="blog-category-01.html" title="">Trends</a></small>
                                <small><a href="blog-category-01.html" title="">3123123</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <hr class="invis1"> -->

                <!-- <div class="custombox clearfix">
                    <h4 class="small-title">CIn chao</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="comments-list">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img src="assets/upload/author.jpg" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading user_name">dasdasdasd<small>3123123213</small></h4>
                                            <p>dung roi banj oi</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- end custom-box -->

                <!-- <hr class="invis1"> -->

                <!-- <div class="custombox clearfix">
                    <h4 class="small-title">Leave a Reply</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="insert.php?id=" method="POST" class="form-wrapper">
                                <input type="text" name="name" class="form-control" placeholder="Your name">
                                <input type="email" name="email" class="form-control" placeholder="Email address">
                                <textarea name="content" class="form-control" placeholder="Your comment"></textarea>
                                <button type="submit" name="comment_submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                        </div>
                    </div>
                </div> -->
                
                </div>
                
            <?php require_once "views/home/components/sidebar.php" ?>
            <!-- end page-wrapper -->
            
            </div>
    <!-- end col -->
        </div>
    <!-- end row -->
    </div>
    <!-- end container -->
    




</section>