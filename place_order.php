<?php
include_once("my_admin/config.php");
$pid  = $_REQUEST['pid'];
//
$query = mysqli_query($con, "SELECT name, price, sale_price, tbl_data, other_para, lead_time, colors FROM site_collections where status='1' AND id='$pid' order by id limit 1");
$row = mysqli_fetch_assoc($query);
// Set Success URL
$product_url = $base . "place-order.html?pid=" . $pid;
$success_url = $base . "place-order.html?pid=" . $pid . "&form=submitted";
// Submit Form
if (isset($_POST['submit'])) {
    // for colors
    $color = $_POST['colors'];
    if(!empty($color)){
    $N = count($color);
    for ($i = 0; $i < $N; $i++) {
        $colors = $colors . $color[$i] . ',';
    }}
    else{
        $colors = "";
    }
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_ADD_SLASHES);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $mobile = $_POST['mobile'];
    $mobile = filter_var($mobile, FILTER_SANITIZE_NUMBER_INT);
    $company = $_POST['company'];
    $company = filter_var($company, FILTER_SANITIZE_ADD_SLASHES);
    $address = $_POST['address'];
    $address = filter_var($address, FILTER_SANITIZE_ADD_SLASHES);
    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_ADD_SLASHES);
    //
    $secretKey = "6LcL-AccAAAAADoo3_TozwSK97LN1tYMATlX4iu3";
    $responseKey = $_POST['g-recaptcha-response'];
    $UserIP = $_SERVER['REOMTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";
    //
    $response = file_get_contents($url);
    $response = json_decode($response);
    //
    if ($response->success) {
        date_default_timezone_set("Asia/Kolkata");
        $date = date("F j, Y, h:i A");
        $ip = $_SERVER['REMOTE_ADDR'];
        //$headers .= 'From: Company Name <newsletter@xyz.com>' . "\r\n";
        $headers .= 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n";
        $headers .= 'Return-Path: Scarves Kingdom <info@scarveskingdom.com>' . "\r\n";
        $headers .= 'From: Scarves Kingdom <no-reply@scarveskingdom.com>' . "\r\n";
        //$headers .= 'Cc: service@domain.com' . "\r\n";
        //$headers .= 'Bcc: arvindm563@gmail.com' . "\r\n";
        // MSG to site owner
        $msg = "Hi Scarves Kingdom,\rYou have received a sales enquiry from the website." . "\rPlease follow ASAP. " . "\r" . "\rName : " . $name . "\r" . "E-Mail : " . $email . "\r" . "Mobile : " . $mobile . "\r" . "Company : " . $company . "\r" . "Address : " . $address . "\r" . "Product URL : " . $product_url . "\r" . "Selected Colors : " . $colors . "\r" . "Message : " . $message . "\r\rDate & Time : " . $date . "\rIP Address : " . $ip .  "\r" . "\rCheers,  \rAdmin- Scarves Kingdom";
        // Send email
        $send_to = "info@scarveskingdom.com";
        if (mail($send_to, '[Scarves Kingdom] Sales Enquiry', $msg, $headers)) {
            // Print Success MSG
            echo '<script language="javascript">alert("Thanks! Your message sent successfully and we will contact you shortly.")</script>';
            // Redirect to success URL
            echo '<script type="text/javascript">window.location="' . $success_url . '"</script>';
        } else {
            echo '<script language="javascript">alert("Sorry! Something went wrong, please try later.")</script>';
        }
    } else {
        echo '<script language="javascript">alert("Sorry! Please check the reCAPTCHA.")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Place Order - <?php echo $row['name']; ?></title>
    <meta name="description" content="Place Your Order - Scarves Kingdom is a scarf manufacturing company owned by M.A. Business Enterprise Pvt. Ltd.">
    <meta name="keywords" content="Scarves Kingdom, Scarf Manufacturer Lucknow India, B2B Scarf Supplier, Myra Pashmina, Jasmine Viscose Satin Knotted Scarf, Polyester Georgette Scarf, Viscose Lurex Ombre Scarf, Rich Polyester Satin Scarf, Ma Business Enterprise">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo $base; ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/style2.css" type="text/css">
    <link rel="icon" href="./img/favicon.png" sizes="32x32">
    <!-- for gallery -->
    <link href="<?php echo $base; ?>venobox/venobox.css?v3" rel="stylesheet" />
    <!-- for recaptch -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K8LHLZ6');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8LHLZ6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Offcanvas Menu Begin -->
    <?php include_once('class/class.canvas_menu.php'); ?>
    <!-- Offcanvas Menu End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header_top alert alert-dismissible fade show">
            <div class="container">
                <div class="text-center">A PREMIER SCARF MANUFACTURER & <strong>B2B</strong> SUPPLIER — <strong>WORLDWIDE</strong> SHIPPING AVAILABLE<span type="button" class="btn-close" style="font-size: 10px;" data-bs-dismiss="alert"></span>
                </div>
            </div>
        </div>
        <div class="header_nav">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="canvas_open"><i class="fa fa-bars"></i></div>
                    <div class="header_logo">
                        <a href="<?php echo $base; ?>"><img src="./img/sk_logo.png" alt="scarves kingdom"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav class="header_menu mobile-menu">
                        <ul>
                            <li><a href="<?php echo $base; ?>about.html">About Us</a></li>
                            <!--<li class="active"><a href="javascript:void(0)">Collections <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    <li><a href="">Pashmina</a></li>
                                    <li><a href="">Cashmere Feel</a></li>
                                    <li><a href="">Fashion Scarves</a></li>
                                </ul>
                            </li>-->
                            <li><a href="<?php echo $base; ?>collections.html">Collections</a></li>
                            <li><a href="<?php echo $base; ?>private-label.html">Private Label</a></li>
                            <li><a href="<?php echo $base; ?>ready-stock.html">Ready Stock</a></li>
                            <li><a href="<?php echo $base; ?>infrastructure.html">Infrastructure</a></li>
                            <li><a href="<?php echo $base; ?>contact.html">Contact Us</a></li>
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
                            <span>Place Order</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">

                    </div>
                    <div class="col-lg-6 col-md-9">

                    </div>
                </div>
            </div>
        </div>
        <div class="product_details_content">
            <div class="container">
            <form method="POST" name="contact_form" id="contact_form">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="product_details_text">
                            <h3><?php echo $row['name']; ?></h3>

                            <h4>$<?php echo $row['price']; ?> <span><?php echo $row['sale_price']; ?></span></h4>
                            <?php
                            $des = $row['tbl_data'];
                            $des = str_replace('<table>', '<table class="table table-bordered table-hover">', $des);
                            echo $des;
                            ?>
                            <?php if (!empty($row['colors'])) { ?>
                                <div class="row">
                                    <div class="col-lg-12 product_details_last_option">
                                        <h5><span>Choose Colors</span></h5>
                                        <div class="product_details_option">
                                            <div class="product_details_option_color" style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden;">
                                                <?php
                                                $colors = $row['colors'];
                                                $myArray = explode(',', $colors);
                                                foreach ($myArray as $my_Array) {
                                                    if ($my_Array == !NULL) {
                                                        $color_code = $my_Array;
                                                        $qry = mysqli_query($con, "SELECT color_hex, color_img FROM color_options where color_code='$color_code' limit 1");
                                                        $rows = mysqli_fetch_assoc($qry);
                                                        $color_hex = $rows['color_hex'];
                                                        $color_img = $rows['color_img'];
                                                        if(!empty($color_img)){
                                                            echo '<div style="padding:10px 10px; text-align:center; float:left;">
                                                            <div style="margin:0px auto; padding:1px 1px; height:100px; width:100px; border:1px solid #e5e5e5;"><img src="'.$base_img_wp.$color_img.'?fit=100%2C100&ssl=1"></div>
                                                            <div><input class="form-check-input" type="checkbox" name="colors[]" value="'.$my_Array.'"> <label class="form-check-label">'.$my_Array.'</label></div>
                                                            </div>';
                                                        }
                                                        else{
                                                            echo '<div style="padding:10px 10px; text-align:center; float:left;">
                                                            <div style="margin:0px auto; padding:1px 1px; height:36px; width:36px; border:1px solid #e5e5e5; border-radius:20%; background:'.$color_hex.';"></div>
                                                            <div><input class="form-check-input" type="checkbox" name="colors[]" value="'.$my_Array.'"> <label class="form-check-label">'.$my_Array.'</label></div>
                                                            </div>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php } ?>
                            <?php if (!empty($row['lead_time'])) { ?>
                                <div class="row">
                                    <div class="col-lg-12 product_details_last_option">
                                        <h5><span>Lead Time</span></h5>
                                        <?php
                                        $lead_time = $row['lead_time'];
                                        $lead_time = str_replace('<table>', '<table class="table table-bordered table-hover">', $lead_time);
                                        echo $lead_time;
                                        ?>
                                    </div>
                                </div><?php } ?>
                            <div class="product_details_last_option">
                                <h5><span>Shipping</span></h5>
                                <p>Support Express · Sea freight · Land freight · Air freight</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product_details_text">
                            <?php if ($_REQUEST['form'] !== "submitted") { ?>
                                <div style="border-color: #000;" class="card shadow mb-5">
                                    <div style="background-color:#000" class="card-header">
                                        <h4 style="color:#fff" class="pt-3">Contact Manufacturer</h4>
                                    </div>
                                    <div class="card-body text-left p-3">
                                            <div class="mb-3">
                                                <!--<label class="form-label">Your Name</label>-->
                                                <input type="text" class="form-control" name="name" id="name" maxlength="66" value="<?php if(!empty($name)){echo $name;}?>" placeholder="Your Name" required />
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" name="email" id="email" maxlength="66" value="<?php if(!empty($email)){echo $email;}?>" placeholder="E-Mail Address" required />
                                            </div>
                                            <div class="mb-3">
                                                <input type="tel" class="form-control" name="mobile" id="mobile" maxlength="13" value="<?php if(!empty($mobile)){echo $mobile;}?>" placeholder="Mobile Number" required />
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="company" id="company" maxlength="88" value="<?php if(!empty($company)){echo $company;}?>" placeholder="Company Name" required />
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="address" id="address" maxlength="120" value="<?php if(!empty($address)){echo $address;}?>" placeholder="Full Address" required />
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" rows="3" name="message" id="message" maxlength="260" placeholder="Message, If any" required><?php if(!empty($message)){echo $message;}?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div style="justify-content: center!important; align-self: center!important;" class="g-recaptcha text-center" data-sitekey="6LcL-AccAAAAAP5BXsYfSteAVM0j58UcTX-vZ9sj"></div>
                                            </div>
                                            <div class="product_details_cart_option">
                                                <button style="border-radius:2vw" type="submit" value="submit" name="submit" class="primary-btn">Send Enquiry</button>
                                            </div>
                                            <p><strong>Note:</strong> By submitting this form, you authorize Scarves Kingdom to call/email/SMS/WhatsApp for further discussions, ongoing promotions, or offers.</p>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="card border-default shadow mb-5">
                                    <div class="card-header bg-default">
                                        <h3 class="pt-3">Thank You!</h3>
                                    </div>
                                    <div class="card-body text-left p-3">
                                        <h2>✔️</h2>
                                        <p class="fs-4">Your message sent successfully and we will contact you shortly.</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Footer Section Begin -->
    <?php include_once('class/class.footer.php'); ?>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="<?php echo $base; ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $base; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $base; ?>js/jquery.nice-select.min.js"></script>
    <script src="<?php echo $base; ?>js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $base; ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $base; ?>js/jquery.countdown.min.js"></script>
    <script src="<?php echo $base; ?>js/jquery.slicknav.js"></script>
    <script src="<?php echo $base; ?>js/mixitup.min.js"></script>
    <script src="<?php echo $base; ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo $base; ?>js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?php echo $base; ?>venobox/venobox.js?v3"></script>
    <script>
        $('.venobox').venobox({
            numeratio: true,
            border: '20px'
        });
        $('.venoboxframe').venobox({
            border: '6px',
            overlayColor: 'rgba(255,255,255,0.85)',
            titlePosition: 'bottom',
            titleColor: '#333',
            titleBackground: 'transparent',
            closeColor: '#333',
            closeBackground: 'transparent',
            spinner: 'wave'
        });
        $('.venoboxvid').venobox({
            bgcolor: '#000',
            spinner: 'cube-grid',
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
    <script src="https://kit.fontawesome.com/36a1d6fe15.js" crossorigin="anonymous"></script>
</body>

</html>