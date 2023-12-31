<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <title>Modular Pada CodeIgniter</title>
   <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
   <link rel="icon" href="<?= BASEURLKU; ?>writable/assets/img/icon.ico" type="image/x-icon" />
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/webfont/webfont.min.js"></script>
   <script>
      WebFont.load({
         google: {
            "families": ["Latto:300,400,700,900"]
         },
         custom: {
            "families": [
               "Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Reguler",
               "Font Awesome 5 Brands", "simple-line-icons"
            ],
            urls: ['<?= BASEURLKU; ?>writable/assets/css/fonts.min.css']
         },
         active: function() {
            sessionStorage.fonts = true;
         }
      });
   </script>
   <link rel="stylesheet" href="<?= BASEURLKU; ?>writable/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= BASEURLKU; ?>writable/assets/css/atlantis.min.css">
   <script src="<?= BASEURLKU; ?>writable/assets/js/core/jquery.3.2.1.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/core/popper.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/core/bootstrap.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/atlantis.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/datatables/datatables.min.js"></script>
   <script src="<?= BASEURLKU; ?>writable/assets/js/plugin/sweetalert/sweetalert.min.js"></script>


</head>

<body>
   <div class="wrapper overlay-sidebar">
      <div class="main-header">
         <div class="logo-header" data-background-color="blue2">
            <a href="#" class="logo">
               <img src="<?= BASEURLKU; ?>writable/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"><i class="icon-menu"></i></span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
               <button class="btn btn-toggle sidenav-overlay-toggler"><i class="icon-menu"></i></button>
            </div>
         </div>
         <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
      </div>
      <div class="sidebar sidebar-style-2">
         <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
               <ul class="nav nav-primary">
                  <li class="nav-item" id="mnberanda">
                     <a href="<?= BASEURLKU; ?>"><i class="icon-layers"></i>
                        <p>Paket Soal 2</p>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="main-panel">
         <div class="content">
            <?php
            if (empty($hal)) {
               include "beranda.php";
            } else {
               include $hal . ".php";
            }
            ?>
         </div>
      </div>
</body>

</html>