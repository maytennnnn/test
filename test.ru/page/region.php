<?php
require_once 'BaseModel.php';

$db = new BaseModel();
$region  = BaseModel::getregion();
$courier = BaseModel::getcourier();
?>

 <div class="container">
 <div class="row main-form">
 <form id='ajaxFormRegion' class="" method="post" action="">
  <h4 class="cols-sm-2 control-label">Поездки</h4>
 <div class="form-group">
 <label for="username" class="cols-sm-2 control-label">Регионы</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
 <select class="form-control" name="region" id="region">
 	<?php
 	$countregion = count($region);
 	for ($i=0; $i < $countregion; $i++) {
 		echo "<option>";
 		echo $region[$i];
 		echo "</option>";
 	}
 	?>
 </select>
 </div>
 </div>
 </div>
 <div class="form-group">
 <label for="email" class="cols-sm-2 control-label">Дата выезда</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-clock-o fa" aria-hidden="true"></i></span>
 <input type="date" class="form-control" name="time" id="time" placeholder="Enter time"/>
 </div>
 </div>
 </div>




 <div class="form-group">
 <label for="username" class="cols-sm-2 control-label">Курьеры</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
 <select class="form-control" name="courier" id="courier">
 	<?php
 	$countcourier = count($courier);
 	for ($i=0; $i < $countcourier; $i++) {
 		echo "<option>";
 		echo $courier[$i];
 		echo "</option>";
 	}
 	?>
 </select>
 </div>
 </div>
 </div>


 <div class="form-group ">
 	<button type="button" name='regionButton' id="region" class="btn btn-primary btn-lg btn-block login-button">
 	      Отправить
 	</button>
 </div>

 </form>
 </div>
 </div>


<br>
<div id="result">
	<h4>Результат</h4>
</div>