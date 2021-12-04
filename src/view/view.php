<?php

namespace App\view;

class View
{
    private string $file;
    private string $title = 'test';

    public function render($templatePath, $data = [])
    {
        $this->file = __DIR__.$templatePath.'.php';
        $content  = $this->renderFile($this->file, $data);
        $base = '/base/begin.php';
        if (isset($_SESSION['connecte'])) {
            $base = '/base/beginConnecter.php';
        }
        $view = $this->renderFile(__DIR__.$base, [
            'title' => $this->title,
            'content' => $content
        ]);
        echo $view;
    }
    
    private function renderFile(string $file, array $data = []  )
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            
            require_once $file;

            return ob_get_clean();
        }
        
        //header('Location: index.php?route=notFound');
    }    
}
