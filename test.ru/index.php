<?php
require_once 'router.php';
require_once 'BaseModel.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>тест</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css.css">
</head>
<body>
<?php
Router::start($_SERVER['QUERY_STRING']);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../region.js"></script>
</body>
</html>