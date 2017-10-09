<?php
class Product {
	private $name;
	private $amazon_price;
	private $weight;
	private $width;
	private $height;
	private $depth;
	private $coefficient;

	public function __construct ($product_id) {
		global $coefficient;
		$this->coefficient = $coefficient;
		$product = getProduct ($product_id);
		if (!empty($product)) {
			$this->name = $product['name'];
			$this->amazon_price = $product['amazon_price'];
			$this->weight = $product['weight'];
			$this->width = $product['width'];
			$this->height = $product['height'];
			$this->depth = $product['depth'];
		} else {
			echo "Product is not exist";
			exit;
		}
	}

	public function get_name () {
		return $this->name;
	}

	public function get_amazon_price () {
		return $this->amazon_price;
	}

	public function get_weight () {
		return $this->weight;
	}

	public function get_width () {
		return $this->width;
	}

	public function get_height () {
		return $this->height;
	}

	public function get_depth () {
		return $this->depth;
	}

	public function get_fee ($type = 'weight') {
		switch ($type) {
			case 'weight':
				return $this->calculate_weight_fee();
				break;
			
			case 'dimension':
				return $this->calculate_dimension_fee();
				break;
		}
	}

	private function calculate_weight_fee () {
		return $this->weight * $this->coefficient->get_weight_coefficient();
	}

	private function calculate_dimension_fee () {
		$dimension = $this->width * $this->height * $this->depth;
		return ($dimension * $this->coefficient->get_dimension_coefficient()) / 1000;
	}

	public function getGrossPrice () {
		return $this->amazon_price + max($this->calculate_weight_fee(), $this->calculate_dimension_fee());
	}
}

?>