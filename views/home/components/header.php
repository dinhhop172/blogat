<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Tech Blog - Stylish Magazine Blog Template</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="assets/home/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="assets/home/images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="assets/home/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<!-- FontAwesome Icons core CSS -->
<link href="assets/home/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/home/style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="assets/home/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="assets/home/css/colors.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="assets/home/css/version/tech.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   <div id="wrapper">
      <header class="tech-header header" style="margin-bottom: 61px;">
         <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <a class="navbar-brand" href="index.php"><img src="assets/home/images/lg4.png" alt=""></a>
               <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav <?php if(!isset($_SESSION['user'])){echo 'mr-auto';} ?>">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="javascrip:;">Contact Us</a>
                     </li>
                  </ul>
                  <?php if(isset($_SESSION['user'])){ ?>
                  <ul class="navbar-nav m-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="javascripts:;">Hi <?= $_SESSION['user']['name'] ?>!</a>
                     </li>
                  </ul>
                  <?php } ?>
                  <ul class="navbar-nav mr-2">
                     <form action="?c=home&a=search" class="form-inline" method="post">
                        <input class="form-control mr-sm-2" name="search" placeholder="Search  " aria-label="Search">
                        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search" style="cursor: pointer;" name="search-btn">
                     </form>
                  </ul>
                  <ul class="navbar-nav mr-2">
                     <?php if(isset($_SESSION['user'])){ ?>
                        <li class="nav-item">
                           <a class="nav-link" href="?a=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        </li>
                     <?php }else{ ?>
                     <li class="nav-item">
                        <a class="nav-link" href="?c=home&a=login">Login</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-apple"></i></a>
                     </li>
                     <?php } ?>
                  </ul>
               </div>
            </nav>
         </div>
         <!-- end container-fluid -->
      </header>
      <!-- end market-header -->