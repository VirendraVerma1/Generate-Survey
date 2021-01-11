<?php
ob_start();
session_start();
$message="This link is not complete.";
if(isset($_GET['ip']))
{
    if($_GET['ip']=='deactive')
    {
        $message="This survey is deactivated.";
    }
}
?>
<html>
<head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5870321000407115",
    enable_page_level_ads: true
  });
</script>
<title>Link Error</title>
<link rel="icon" href="img/icon.png">
</head>
<body>
	<h2 align="center" style="margin-top:300px;">
	<?php echo $message;?></h2>
	
	
	<div align="center">
	    <a  href="signup.php">Create your own survey</a>
	</div>
	
</body>
</html>