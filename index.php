<?php 
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '0');

class ProductIdException extends Exception {
	protected $code = 404;
	protected $message = "Cant find product";
}

class PhoneIdException extends ProductIdException {

}

class ProductSetException extends ProductIdException {

}

class Product {
	private $id;
	private $name;
	private $description;
	public function __construct(int $id, string $name, string $description) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
	}
	public function getId(): int {
		return $this->id;
	}
	public function setName(Product $name){
		$this->name =$name;
	}
	public function getName(): string {
		return $this->name;
	}
	public function setDescription(Product $description){
		$this->description = $description;
	}
	public function getDescription(): string{
		return $this->description;
	}
}

$product = [
	'id'=>1,
	'name'=>'Phone',
	'decription'=> 'Telephone, this is telephone'
];

$productName = $product['name'];
$products = [];

foreach (range(1,10) as $item) {
	$product['id'] = $item;
	$product['name'] = $productName . $product['id'];
	$products[] = $product;
}

file_put_contents('db.txt', json_encode($products));

$productsDecode = json_decode(file_get_contents('db.txt'), false);

function getProduct(int $id) {

	$productsDecode = json_decode(file_get_contents('db.txt'), true);

	if ($id-- !== $productsDecode[$id]['id']) {
		throw new ProductIdException();
	}
	else {
		print_r($productsDecode[$id]);
	}
	echo 'xxxxxxxxxxxxxx';
}

function setProduct(Product $productObject) {

	$flag = true;

	$result = array();
	$result['id'] = $productObject->getId();
	$result['name'] = $productObject->getName();
	$result['description'] = $productObject->getDescription();

	file_put_contents('setProdt.txt', json_encode($result));

	$productsDecode = json_decode(file_get_contents('db.txt'), true);

	foreach ($productsDecode as $products){
		if($products['id'] === $result['id']){
			$flag = false;
			throw new ProductSetException();
		}
	}

	if($flag == true){
		file_put_contents('db.txt', json_encode($result), FILE_APPEND);
		print_r("Correct!");
	}
}

$productObject = new Product(10, 'Phone101', 'description');

try{
	getProduct(8);
} catch (ProductSetException $exception){
	print_r('ProductSetException');
} catch (ProductIdException $exception) {
	print_r('ProductIdException');
} catch(Exception $exception) {
	print_r($exception);
	print_r('Exception');
}

?>
