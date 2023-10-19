<?php
include_once("my_admin/config.php");
$link  = $_REQUEST['link'];
$link = strrchr($link, '-');
$coll_id = str_replace('-', '', $link);
//
$query = mysqli_query($con, "SELECT name, price, sale_price, tbl_data, other_para FROM site_collections where status='1' AND id='$coll_id' order by id limit 40");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['name'];?></title>
    <meta name="description" content="<?php echo $row['name'];?> - Scarves Kingdom is a scarf manufacturing company owned by M.A. Business Enterprise Pvt. Ltd.">
    <meta name="keywords" content="Scarves Kingdom, Scarf Manufacturer Lucknow India, B2B Scarf Supplier, Myra Pashmina, Jasmine Viscose Satin Knotted Scarf, Polyester Georgette Scarf, Viscose Lurex Ombre Scarf, Rich Polyester Satin Scarf, Ma Business Enterprise">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo $base;?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base;?>css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/style2.css" type="text/css">
    <link rel="icon" href="<?php echo $base;?>img/favicon.png" sizes="32x32">
    <!-- for gallery -->
    <link href="<?php echo $base;?>venobox/venobox.css?v3" rel="stylesheet" />
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
                        <a href="../"><img src="<?php echo $base;?>img/sk_logo.png" alt="scarves kingdom"></a>
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

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product_details_pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_details_breadcrumb">
                            <a href="<?php echo $base; ?>">Home</a>
                            <a href="<?php echo $base;?>collections.html">Collections</a>
                            <span><?php echo $row['name'];?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $query_2 = mysqli_query($con, "SELECT img, alt FROM collection_pix where coll_id='$coll_id' AND is_main_img='0'");
                        while ($row_2 = mysqli_fetch_assoc($query_2)){
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <figure class="figure">
                            <a class="venobox" data-gall="gall1" title="<?php echo $row_2['alt'];?>" href="<?php echo $base_img.$row_2['img'];?>"><img src="<?php echo $base_img.$row_2['img'];?>" class="figure-img img-fluid" /></a>
                        </figure>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="product_details_content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product_details_text">
                            <h4><?php echo $row['name'];?></h4>
                            <h3>$<?php echo $row['price'];?> <span><?php echo $row['sale_price'];?></span></h3>
                            <?php
                                $des = $row['tbl_data'];
                                $des = str_replace('<table>', '<table class="table table-bordered table-hover">', $des);
                                echo $des;
                            ?>
                            <br />
                            <div class="product_details_cart_option">
                                <a href="<?php echo $base;?>place-order.html?pid=<?php echo $coll_id;?>" class="primary-btn">Bulk Order</a>
                            </div>
                            <?php echo $row['other_para'];?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">More Collections</h3>
                </div>
            </div>
            <div class="row text-center">
                        <?php
                        $query = mysqli_query($con, "SELECT id, name, status FROM site_collections where id!='$coll_id' AND cat='Collections' AND status='1' order by id limit 4");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $coll_id = $row ['id'];
                            $query_2 = mysqli_query($con, "SELECT id, img FROM collection_pix where coll_id='$coll_id' AND is_main_img='1'");
                            $row_2 = mysqli_fetch_assoc($query_2);
                        ?>
                        <div class="col-lg-4 col-6 col-md-6 col-sm-6">
                            <figure class="figure">
                                <a href="<?php echo $base;?>collection/<?php $link = $row['name']; $link = preg_replace('/[^a-zA-Z0-9]/',' ',$link); $link = preg_replace("/[\s_]/", "-", $link); echo strtolower($link);?>-<?php echo $row['id'];?>.html">
                                <img src="<?php echo $base_img.$row_2['img'];?>" class="figure-img img-fluid" alt="<?php echo $row['name'];?>">
                                <figcaption class="figure-caption text-center"><?php echo $row['name'];?></figcaption>
                                </a>
                            </figure>
                        </div>
                       <?php } ?>
            </div>
        </div>
    </section>
    <!-- Related Section End -->

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
    <script src="<?php echo $base;?>js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?php echo $base;?>venobox/venobox.js?v3"></script>
    <script>
        $('.venobox').venobox({
              numeratio: true,
              border: '20px'
            });
       $('.venoboxframe').venobox({
              border: '6px',
              overlayColor : 'rgba(255,255,255,0.85)',
              titlePosition : 'bottom',
              titleColor: '#333',
              titleBackground: 'transparent',
              closeColor: '#333',
              closeBackground: 'transparent',
                      spinner : 'wave'
          });
       $('.venoboxvid').venobox({
              bgcolor: '#000',
              spinner : 'cube-grid',
              // cb_post_open : function(obj, gallIndex, thenext, theprev){
              //     console.log(thenext);
              // },
          });
       $('.venoboxinline').venobox({
          numeratio: true,
              framewidth: '400px',
              frameheight: 'auto',
              border: '10px',
              bgcolor: '#f46f00',
              titleattr: 'data-title',
              infinigall: true,
              // cb_init : function(plugin){
              //     console.log('INIT');
              //     console.log(plugin);
              // },
              // cb_pre_open : function(obj){
              //     console.log('link obj');
              //     console.log(obj.data());
              // },
              // cb_post_open : function(obj, gallIndex, thenext, theprev){
              //     console.log('item index');
              //     console.log(gallIndex);
              //     console.log('next - prev lenght');
              //     console.log(thenext.length);
              //     console.log(theprev.length);
              // },
              // cb_pre_close : function(obj, gallIndex, thenext, theprev){
              //     console.log('item index');
              //     console.log(gallIndex);
              // },
              // cb_post_close : function(){
              //     console.log('CLOSED');
              // },
              // cb_after_nav : function(obj, gallIndex, thenext, theprev){
              //     console.log('after nav');
              //     console.log(gallIndex);
              // }
      
      })
          </script>
</body>

</html>