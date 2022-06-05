<?php
class BaseModel
{
	protected static $connect;
	public function __construct()
	{
		$array = $config =[
			'host' => 'mysql:host=localhost;dbname=tovar;charset=utf8',
			'login' => 'root',
			'password' => 'root'
		];
		self::$connect = new PDO($array['host'],$array['login'],$array['password']);
		if (!self::$connect) {
			die("Подключение к БД провалено");
		}
	}

	public static function settrips($region, $data, $courier, $nameregion)
	{
		$sql = "INSERT INTO trips VALUES (null, '{$region}', '{$data}', '{$courier}', '{$data}')";
		self::$connect->exec($sql);

		$time = BaseModel::gettimeofregion($nameregion);
		$id = BaseModel::getmaxid();
		BaseModel::plusdate($time, $id);
		return BaseModel::getarrival($id);
	}

	public static function getarrival($id)
	{
		$sql = "SELECT arrival FROM trips WHERE id = ".$id;
		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$arrival = $row['arrival'];
		}
		return $arrival;
	}

	public static function plusdate($time, $id)
	{
		$sql = "UPDATE trips SET arrival = arrival + INTERVAL '{$time}' DAY WHERE id = ".$id;
		self::$connect->exec($sql);
	}

	public static function getmaxid()
	{
		$sql = 'SELECT max(id) FROM trips';
		$result =  self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_NUM)) {
			$id = $row['0'];
		}
		return $id;
	}

	public static function getregion(): array
	{
		$sql = "SELECT name FROM region";

		$result = self::$connect->query($sql);
		while ($row = $result->fetch(\PDO::FETCH_NUM)) {
			$array[] = $row[0];
		}
		return $array;
	}

	public static function getcourier(): array
	{
		$sql = "SELECT name FROM courier";

		$result = self::$connect->query($sql);
		while ($row = $result->fetch(\PDO::FETCH_NUM)) {
			$array[] = $row[0];
		}
		return $array;
	}

	public static function gettimeofregion(string $region)
	{
		$sql = "SELECT trip_time FROM region WHERE name = '{$region}'";

		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_NUM)) {
			$array = $row[0];
		}
		return $array;
	}

	public static function gettrips($from, $to)
	{
		 $sql = "SELECT region.name as region, trips.dispatch as dispatch,
		 		courier.name as courier, trips.arrival as arrival
				FROM trips
				INNER JOIN courier ON trips.courier_id = courier.id
				INNER JOIN region  ON trips.region_id  = region.id
				WHERE dispatch BETWEEN '{$from}' and '{$to}'";

		$result = self::$connect->query($sql);
		while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$array[] = $row;
		}
		return $array;
	}



	public static function getidcourier(string $name)
	{
		$sql = "SELECT id FROM courier WHERE name = '{$name}'";

		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$res = $row['id'];
		}else{
			$res = 0;
		}
		return $res;
	}

	public static function getidregion(string $name)
	{
		$sql = "SELECT id FROM region WHERE name = '{$name}'";

		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$res = $row['id'];
		}else{
			$res = 0;
		}
		return $res;
	}

}