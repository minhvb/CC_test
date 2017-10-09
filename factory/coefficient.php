<?php

class coefficientSingleton {
	private static $coefficient = false;
	private $weight_coefficient = 11;
	private $dimension_coefficient = 11;

	private function __construct () {

    }

	public static function getInstance () {
		if (!self::$coefficient) {
			self::$coefficient = new coefficientSingleton();
		}

		return self::$coefficient;
	}

	public function get_weight_coefficient () {
		return $this->weight_coefficient;
	}

	public function set_weight_coefficient ($value) {
		$this->weight_coefficient = $value;
	}

	public function get_dimension_coefficient () {
		return $this->dimension_coefficient;
	}

	public function set_dimension_coefficient ($value) {
		$this->dimension_coefficient = $value;
	}
}

?>