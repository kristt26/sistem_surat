<!DOCTYPE html>
<html lang="en" ng-app="admin.app" ng-controller="AdminController">

<head>
  <title>{{title}}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?=site_url('assets/plugins/select2/css/select2.min.css');?>" rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="<?=site_url('assets/css/main.css');?>">
  <link rel="stylesheet" href="<?=base_url();?>assets/js/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?=site_url('assets/plugins/highchats/highchats.css');?>" rel='stylesheet'>

  <link rel="stylesheet"
    href="<?=base_url();?>assets/js/plugins/angular-datatables/dist/css/angular-datatables.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

</head>

<body class="app sidebar-mini">
  <div ng-include="header"></div>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1>{{dashboard}}</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{url}}{{dashboard | lowercase}}">{{dashboard}}</a></li>
      </ul>
    </div>
    <div class="row">
      <?php
if (isset($_view) && $_view) {
    $this->load->view($_view);
}
?>
    </div>
  </main>

  <script src="<?=base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
  <script src="<?=base_url('assets/js/angular/angular.min.js');?>"></script>
  <script src="<?=base_url('assets/js/js/admin.app.js');?>"></script>
  <script src="<?=base_url('assets/js/js/services/admin.services.js');?>"></script>
  <script src="<?=base_url('assets/js/js/services/auth.services.js');?>"></script>
  <script src="<?=base_url('assets/js/js/helpers/helper.services.js');?>"></script>
  <script src="<?=base_url('assets/js/js/controllers/admin.controllers.js');?>"></script>
  <script data-require="angular-ui-bootstrap@0.3.0" data-semver="0.3.0" src="https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.3.0.min.js"></script>


  <script src="<?=base_url('assets/js/popper.min.js');?>"></script>
  <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
  <script src="<?=base_url('assets/js/main.js');?>"></script>
  <script src="<?=base_url();?>assets/js/plugins/angular-datatables/dist/angular-datatables.min.js"></script>
  <script src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>assets/js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?=base_url('assets/js/plugins/pace.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/jquery-loading-overlay/dist/loadingoverlay.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/input-mask/angular-input-masks-standalone.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/angular-locale_id-id.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/currency.js');?>"></script>
  <script src="<?=base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>
  <!-- <script src="<?=base_url('assets/js/bower_components/select2/select2.min.js');?>"></script>
  <script src="<?=base_url('assets/js/bower_components/select2/select2_locale_id.js');?>"></script> -->
  <script src="<?=base_url('assets/js/bower_components/angular-select2/dist/angular-select2.min.js');?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <!-- Page specific javascripts-->
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
          m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $(document).ready(function () {
      $('[data-toggle=tooltip]').hover(function () {
        // on mouseenter
        $(this).tooltip('show');
      }, function () {
        // on mouseleave
        $(this).tooltip('hide');
      });
      $('.js-example-basic-single').select2();
    });
    $('.select2').select2({
      placeholder: "Pilih item"
    });
    $('.select22').select2({
      placeholder: "Pilih item"
    });


    $(function () {
      $(".asidebox").css('width',0);
      $('#addClass').click(function (event) {
        var open = document.getElementById('sidebar_secondary');
        $(".asidebox").css('height',700);
        $(".asidebox").css('width','50%');


        // $('#sidebar_secondary').addClass('popup-box-on');

      });

      $('#removeClass').click(function () {
        $(".asidebox").css('height',0);
        $(".asidebox").css('width',0);

        // $(".asidebox").css('display','none');
      });
    });

  </script>
</body>

</html>