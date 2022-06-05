<?php

final class Router
{
	public static function d($array)
	{
		echo "<pre>".print_r($array,1)."</pre>";
	}
	public static function start(string $gets)
	{

		if ($gets == '') {
			$gets = 'page=region';
		}

		$result = self::getParam($gets);
		self::dispatch($result);
	}
	private static function getParam(string $array): array
	{
		$array = explode('&', $array);
		$count = count($array);
		for ($i=0; $i < $count; $i++) {
			list($key, $value) = explode('=', $array[$i]);
			$result[$key] = $value;
		}
		return $result;
	}
	private static function dispatch(array $get): void
	{
		if (isset($get['page']) and is_file('page/'.$get['page'].'.php')) {
			$page = $get['page'];
			require_once "page/".$page.".php";
		}
	}
}

?>