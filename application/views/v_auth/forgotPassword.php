<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPAS | Forgot Password</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:url" content="http://demo.madebytilde.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:image" content="http://demo.madebytilde.com/elephant.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@madebytilde">
    <meta name="twitter:creator" content="@madebytilde">
    <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta name="twitter:image" content="http://demo.madebytilde.com/elephant.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/admin/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/admin/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?= base_url(); ?>assets/admin/manifest.json">
    <link rel="mask-icon" href="<?= base_url(); ?>assets/admin/safari-pinned-tab.svg" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/login-2.min.css">
  </head>
  <body>
    <div class="login">
    <!-- FLASH DATA -->    
    <?php 
          $dat = $this->session->flashdata('msg');
              if($dat!=""){ ?>
                    <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
          <?php } ?>  
         <!-- AKHIR FLASH DATA -->
         <!-- FLASH DATA -->    
         <?php 
          $dat = $this->session->flashdata('msg2');
              if($dat!=""){ ?>
                    <div id="notifikasi" class="alert alert-warning"><?=$dat;?></div>
          <?php } ?>  
         <!-- AKHIR FLASH DATA -->


      <div class="login-body">
        <a class="login-brand" href="#">
          <img class="img-responsive" src="<?= base_url(); ?>assets/admin/img/logo.svg" alt="Elephant">
        </a>
        <div class="login-form">
          <form method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
              <p class="help-block">
                <small>If you've forgotten your password, we'll send you an email to reset your password.</small>
              </p>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Send password reset email</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
        <a href="<?= base_url(); ?>auth">Back to login</a>
      </div>
    </div>
    <script src="<?= base_url(); ?>assets/admin/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/elephant.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>