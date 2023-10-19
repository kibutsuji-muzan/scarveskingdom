<?php
include_once("my_admin/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Collections - Scarf Kingdom</title>
    <meta name="description" content="Collections - Scarves Kingdom is a scarf manufacturing company owned by M.A. Business Enterprise Pvt. Ltd.">
    <meta name="keywords" content="Scarves Kingdom, Scarf Manufacturer Lucknow India, B2B Scarf Supplier, Myra Pashmina, Jasmine Viscose Satin Knotted Scarf, Polyester Georgette Scarf, Viscose Lurex Ombre Scarf, Rich Polyester Satin Scarf, Ma Business Enterprise">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="canonical" href="https://www.scarveskingdom.com/collections.html" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo $base;?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/style.css" type="text/css">
    <link rel="icon" href="<?php echo $base;?>img/favicon.png" sizes="32x32">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K8LHLZ6');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8LHLZ6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- Offcanvas Menu Begin -->
    <?php include_once('class/class.canvas_menu.php');?>
    <!-- Offcanvas Menu End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header_top alert alert-dismissible fade show">
            <div class="container">
                <div class="text-center">A PREMIER SCARF MANUFACTURER & <strong>B2B</strong> SUPPLIER  — <strong>WORLDWIDE</strong> SHIPPING AVAILABLE<span type="button" class="btn-close" style="font-size: 10px;" data-bs-dismiss="alert"></span>
                </div>
            </div>
        </div>
        <div class="header_nav">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="canvas_open"><i class="fa fa-bars"></i></div>
                    <div class="header_logo">
                        <a href="./"><img src="img/sk_logo.png" alt="scarves kingdom"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav class="header_menu mobile-menu">
                        <ul>
                            <li><a href="<?php echo $base;?>about.html">About Us</a></li>
                            <!--<li class="active"><a href="javascript:void(0)">Collections <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    <li><a href="">Pashmina</a></li>
                                    <li><a href="">Cashmere Feel</a></li>
                                    <li><a href="">Fashion Scarves</a></li>
                                </ul>
                            </li>-->
                            <li class="active"><a href="<?php echo $base;?>collections.html">Collections</a></li>
                            <li><a href="<?php echo $base;?>private-label.html">Private Label</a></li>
                            <li><a href="<?php echo $base;?>ready-stock.html">Ready Stock</a></li>
                            <li><a href="<?php echo $base;?>infrastructure.html">Infrastructure</a></li>
                            <li><a href="<?php echo $base;?>contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            
        </div>
        
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_text">
                        <div class="breadcrumb_links">
                            <a href="<?php echo $base; ?>">Home</a>
                            <span>Collections</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        $query = mysqli_query($con, "SELECT id, name, status FROM site_collections where cat='Collections' AND status='1' order by id limit 40");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $coll_id = $row ['id'];
                            $query_2 = mysqli_query($con, "SELECT id, img FROM collection_pix where coll_id='$coll_id' AND is_main_img='1'");
                            $row_2 = mysqli_fetch_assoc($query_2);
                        ?>
                        <div class="col-lg-4 col-6 col-md-6 col-sm-6">
                            <figure class="figure">
                                <a href="collection/<?php $link = $row['name']; $link = preg_replace('/[^a-zA-Z0-9]/',' ',$link); $link = preg_replace("/[\s_]/", "-", $link); echo strtolower($link);?>-<?php echo $row['id'];?>.html">
                                <img src="uploads/<?php echo $row_2['img'];?>" class="figure-img img-fluid" alt="<?php echo $row['name'];?>">
                                <figcaption class="figure-caption text-center"><?php echo $row['name'];?></figcaption>
                                </a>
                            </figure>
                        </div>
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    <!-- Footer Section Begin -->
    <?php include_once('class/class.footer.php');?>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="<?php echo $base;?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $base;?>js/bootstrap.min.js"></script>
    <script src="<?php echo $base;?>js/jquery.nice-select.min.js"></script>
    <script src="<?php echo $base;?>js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $base;?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $base;?>js/jquery.countdown.min.js"></script>
    <script src="<?php echo $base;?>js/jquery.slicknav.js"></script>
    <script src="<?php echo $base;?>js/mixitup.min.js"></script>
    <script src="<?php echo $base;?>js/owl.carousel.min.js"></script>
    <script src="https://kit.fontawesome.com/36a1d6fe15.js" crossorigin="anonymous"></script>
    <script src="<?php echo $base;?>js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>