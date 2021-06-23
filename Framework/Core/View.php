<?php

namespace Framework\Core;

use Framework\Exception\ViewException;

class View
{
    public string $layout = 'site.php'; // default layout
    public string $template = 'product_list.php'; // default template

    public function render(string $template, $params = null, string $layout)
    {
        try {
            if (is_array($params)) {
                // converting array elements to variables
                extract($params);
            }
            $path = 'App/View/Layouts/' . $layout;
            if (file_exists($path)) {
                include $path;
            } else {
                throw new ViewException();
            }
        } catch (ViewException $exception) {
            $errorView = new View();
            $errorView->render('Error/error404', ['code' => $exception->getCode(), 'message' => $exception->getMessage()], 'error');
        }
    }
}
