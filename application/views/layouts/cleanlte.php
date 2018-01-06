<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo $template['metas']; ?>

  <title><?php echo $template['title']; ?></title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php echo bower_url('font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo bower_url('Ionicons/css/ionicons.min.css'); ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo assets_url('adminlte/css/AdminLTE.min.css'); ?>">

  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo assets_url('adminlte/plugins/iCheck/square/blue.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $template['css']; ?>

	<?php echo $template['js_header']; ?>
</head>
<body class="hold-transition login-page">
		<?php echo $template['content']; ?>

    <!-- jQuery 3 -->
    <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo assets_url('adminlte/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
    </script>

    <?php echo $template['js_footer']; ?>

</body>

</html>


