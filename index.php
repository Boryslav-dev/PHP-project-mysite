<?php
include 'autoloader.php';
$autoloader = new Autoloader();
spl_autoload_register([$autoloader, 'load']);

$layout = 'site.php';
$template = 'product_list.php';

$productsDecode = json_decode(file_get_contents('App/Storage/products.txt'), true);

function render(string $template, array $params = null, string $layout)
{
    if (is_array($params)) {
        // converting array elements to variables
        extract($params);
    }
    /*
    dynamically connecting a common template (view),
    inside which the view will be embedded
    to display the content of a specific page.
    */
    include 'views/layouts/' . $layout;
}

?>
