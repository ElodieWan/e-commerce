<?php

namespace App\view;

class View
{
    private string $file;
    private string $title = 'test';
    private string $message="";

    public function render($templatePath, $data = [])
    {
        $this->file = __DIR__.$templatePath.'.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile(__DIR__.'/base.php', [
            'title' => $this->title,
            'content' => $content,
            'message' => $this->message
        ]);
        echo $view;
    }
    
    private function renderFile(string $file, array $data = []  )
    {
        if (file_exists($file)) {
            extract($data);
            if (isset($message)) {
                $this->message = $message;
            }
            ob_start();
            
            require_once $file;

            return ob_get_clean();
        }
        
        //header('Location: index.php?route=notFound');
    }    
}
