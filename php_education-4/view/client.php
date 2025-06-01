


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | صفحه ورود</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="assets/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="assets/css/custom-style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b> به وبلاگ ما خوش امدید</b></a>
  </div>
  <!-- /.login-logo -->


  <?php 
       include __DIR__."/../helper.php";
       $connection = connetion();
       $blogs = select($connection,"SELECT * FROM `blogs`;");

     foreach($blogs as $blog){
       $id = $blog['id'];
       $title = $blog['title'];
       $description = $blog['description'];
       $shortText = truncateWords($description, 50); 
 
       echo "
       <div class='card text-center'>
       <div class='card-header'>
       $id مقاله
       </div>
       <div class='card-body'>
         <h5 class='card-title'>$title</h5>
         <p class='card-text'>$shortText </p>
      
       <form action='showBlog.php' method='post'>
       <input type='hidden' name='id' value='$id'>
       <button type='submit' class='btn btn-primary  btn-block btn-flat'>نمایش مقاله</button>
       </form>

       </div>
       <div class='card-footer text-muted'>
          $id days ago
       </div>
     </div>
      ";
     }
  
   ?>


<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>