<?php

require_once('OrangeAPI.php');

$orange = new APIclient();
$orange->url = ORANGE_URL;
$orange->token = ORANGE_TOKEN;
$orange->saltKey = ORANGE_SALT;
$orange->setSessionToken(ORANGE_SESSION);

$r = $orange->request('GET','landing',array(
  'landing' => 'megacagle-yasearmo',
  'sublanding' => $_GET['city'],
  'step' => 'inicio'
));

if ($r->response->status != 200){
  die("dato no valido");
}

$googleCaptchaKey = '6Le8B98UAAAAAEmi5xa44pxFv4UEOF5O0IEnbho4';

$id_google_tag;
$token_google_display;
$id_pixel_facebook = $orange->get('id-facebook');
$id_google_analytics = $orange->get('id-google-analytics-thera');


if (($_GET['ag']) === 'or') {
  $id_google_tag = $orange->get('id-google-ads');
  $token_google_display = $orange->get('token-gdisplay');
}else{
  $id_google_tag = $orange->get('id-google-ads-thera');
  $token_google_display = $orange->get('token-gdisplay-thera');
}


switch (($_GET['campaign'])) {
  case 'display':
    $token = $token_google_display;
    break;
  case 'y-preroll':
    $token = $orange->get('youtube-preroll-thera');
    break;
  case 'fb-branding':
    $token = $orange->get('token-fb');
    break;
  case 'fb-breach':
    $token = $orange->get('token-breach');
    break;
  case 'fb-conversions':
    $token = $orange->get('token-convertions');
    break;
  case 'fb-trafico':
    $token = $orange->get('token-trafico');
    break;
  case 'video':
    $token = $orange->get('token-fb-video');
    break;
  default:
    $token = '';
    break;
}

?>

<script>
  var theToken = "<?= $token; ?>";
  console.log(theToken);
</script>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Megacable - Todo Incluido</title>
  <link rel="icon" href="fav.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/aos.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Facebook Pixel Code -->
  <script>
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return; n = f.fbq = function () {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
      n.queue = []; t = b.createElement(e); t.async = !0;
      t.src = v; s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?= $id_pixel_facebook; ?>');
    fbq('track', 'PageView');
  </script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <noscript>
    <img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=<?=$id_pixel_facebook;?>&ev=PageView&noscript=1" />
  </noscript>
  <!-- End Facebook Pixel Code -->

  <?php if (($_GET['ag']) === 'th') {?>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1944558472454005');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1944558472454005&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
  <?php }?>

  <!-- Global site tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?=$id_google_tag;?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', '<?=$id_google_tag;?>');
  </script>

  <?php if (($_GET['ag']) === 'th') {?>
    <!-- Global site tag (gtag.js) - Google Ads: 833256778 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-833256778"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-833256778');
    </script>
  <?php }?>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src='https://www.googletagmanager.com/gtag/js?id=<?=$id_google_analytics;?>'></script>
  <script>
      window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', '<?=$id_google_analytics;?>');
  </script>


  <style>
  .fixed-send-form {
    z-index:1000 !important;
  }
  </style>
</head>

<body id="body">

    <div class="g-recaptcha"
          data-sitekey="<?=$googleCaptchaKey;?>"
          data-callback="sendForm"
          data-size="invisible">
    </div>

  <?php include 'templates/fixed-send-form/fixed-send-form.php';?>
  <?php include 'templates/preload/preload.php';?>
  <?php include 'templates/header/header.php';?>
  <?php include 'templates/hero/hero.php';?>
  <?php include 'templates/packs/packs.php';?>
  <?php include 'templates/producto/producto-hbo.php';?>
  <!-- <?php include 'templates/producto/producto-fox.php';?> -->
  <?php include 'templates/producto/producto-xview.php';?>
  <?php include 'templates/footer/footer.php';?>
  <?php include 'templates/legales/legales.php';?>
  <?php include 'templates/fixed-cta/fixed-cta.php';?>
  <?php include 'templates/fixed-form/fixed-form.php';?>


  <script src="assets/js/vendors/vendors.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.8/lottie_html.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/get-url-values.js"></script>

</body>

</html>