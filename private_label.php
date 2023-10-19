<?php
include_once("my_admin/config.php");
// Set Success URL
$success_url = $base."private-label.html?form=submitted";
// Submit Form
if (isset($_POST['submit'])) {
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
        $msg = "Hi Scarves Kingdom,\rYou have received a private label enquiry from the website." . "\rPlease follow ASAP. " . "\r" . "\rName : " . $name . "\r" . "E-Mail : " . $email . "\r" . "Mobile : " . $mobile . "\r" . "Company : " . $company . "\r" . "Address : " . $address . "\r" . "Message : " . $message . "\r\rDate & Time : " . $date . "\rIP Address : " . $ip .  "\r" . "\rCheers,  \rAdmin- Scarves Kingdom";
        // Send email
        $send_to = "info@scarveskingdom.com";
        if (mail($send_to, '[Scarves Kingdom] Private Lebel Enquiry', $msg, $headers)) {
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
    <title>Private label</title>
    <meta name="description" content="Private Label - Scarves Kingdom is a scarf manufacturing company owned by M.A. Business Enterprise Pvt. Ltd.">
    <meta name="keywords" content="Private Label, Scarves Kingdom, Scarf Manufacturer Lucknow India, B2B Scarf Supplier, Myra Pashmina, Jasmine Viscose Satin Knotted Scarf, Polyester Georgette Scarf, Viscose Lurex Ombre Scarf, Rich Polyester Satin Scarf, Ma Business Enterprise">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="canonical" href="https://www.scarveskingdom.com/private-label.html" />
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

    <link rel="icon" href="<?php echo $base; ?>img/favicon.png" sizes="32x32">
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
    <!-- for recaptch -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script

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
                        <a href="./"><img src="img/sk_logo.png" alt="scarves kingdom"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav class="header_menu mobile-menu">
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <!--<li class="active"><a href="javascript:void(0)">Collections <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    <li><a href="">Pashmina</a></li>
                                    <li><a href="">Cashmere Feel</a></li>
                                    <li><a href="">Fashion Scarves</a></li>
                                </ul>
                            </li>-->
                            <li><a href="collections.html">Collections</a></li>
                            <li class="active"><a href="private-label.html">Private Label</a></li>
                            <li><a href="ready-stock.html">Ready Stock</a></li>
                            <li><a href="infrastructure.html">Infrastructure</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
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
                            <a href="<?php echo $base;?>">Home</a>
                            <span>Private Label</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about_pic">
                        <img src="img/private_label.jpg" alt="Private Label">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="about_item">
                        <h4>Private Label</h4>
                        <p class="mb-3">If you are looking for custom silk/viscose scarves manufacturer then you have reached the right place. We can do small quantities as well for small boutique shops, accessory brands, also for promotional purposes.</p>
                        <p class="mb-3">We can help you in establishing you “own Brand” right from design development, fabric selection to branding, marketing and printing</p>
                        <p class="mb-3">All we require is a “tech pack” with all details of the scarf like the design, measurements, fabric construction, GSM, Pantone shade etc. and we can then take care of everything from there.</p>
                        <p class="mb-3">So contact us to get your custom scarf designs made in India in high quality and with precision. It acts as the perfect accessory that can be worn in summers as well as winters.</p>
                        <p class="mb-3">We can help build your world class scarves brand from everything that is sourced or manufactured in India may it be fibre to yarn and then knitting or weaving of scarves to providing door-to-door delivery.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="product_details_text">
                    <form method="POST" name="contact_form" id="contact_form">
                        <?php if ($_REQUEST['form'] !== "submitted") { ?>
                            <div class="card border-default mb-5">
                                <div class="card-header bg-default">
                                    <h5 class="pt-2"><strong>Any Query? Please Write Us</strong></h5>
                                </div>
                                <div class="card-body text-left p-3">
                                    <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name" id="name" maxlength="66" value="<?php if(!empty($name)){echo $name;}?>" placeholder="Your Name" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" id="email" maxlength="66" value="<?php if(!empty($email)){echo $email;}?>" placeholder="E-Mail Address" required />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <input type="tel" class="form-control" name="mobile" id="mobile" maxlength="13" value="<?php if(!empty($mobile)){echo $mobile;}?>" placeholder="Mobile Number" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="company" id="company" maxlength="88" value="<?php if(!empty($company)){echo $company;}?>" placeholder="Company Name" required />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="address" id="address" maxlength="120" value="<?php if(!empty($address)){echo $address;}?>" placeholder="Full Address" required />
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="2" name="message" id="message" maxlength="260" placeholder="Message, If any" required><?php if(!empty($message)){echo $message;}?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div style="justify-content: center!important; align-self: center!important;" class="g-recaptcha text-center" data-sitekey="6LcL-AccAAAAAP5BXsYfSteAVM0j58UcTX-vZ9sj"></div>
                                    </div>
                                    <div class="product_details_cart_option">
                                        <button type="submit" value="submit" name="submit" class="primary-btn">Send Enquiry</button>
                                    </div>
                                    <p><strong>Note:</strong> By submitting this form, you authorize Scarves Kingdom to call/email/SMS/WhatsApp for further discussions, ongoing promotions, or offers.</p>
                                </div>
                            </div>
                        <?php } elseif ($_REQUEST['form'] == "submitted") { ?>
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
            </div>
        </div>
    </section>
    <!-- About Section End -->

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
</body>

</html>