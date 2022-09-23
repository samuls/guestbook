<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php include 'resources/config.php';session_start(); ?>

<style>
  .toast-top-center{
    margin-top: 50px !important;
  }
</style>

<?php 
$userid = $_SESSION['ID'];
$strSql = "SELECT n.*, a.Title FROM notifications AS n JOIN auditions AS a ON a.ID = n.audition_id WHERE n.user_id = '$userid' AND n.audition_id IS NOT NULL AND DATE(n.audition_date) = CURDATE()";
$todaysNotificationData = $funDb->getBySql($strSql);
$jsonData = json_encode($todaysNotificationData);
?>

<script>
  toastr.options.positionClass = 'toast-top-right';
  toastr.options.progressBar = true;
  var data = <?=$jsonData?>;

  data.forEach(obj => {
    toastr.info('You have '+obj.Title+' audition Today.');
  });  
</script>
