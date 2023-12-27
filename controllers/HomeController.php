<?php


/*class HomeController {

    public function index() { 
        require_once 'views/form.php';
    }

}*/

class HomeController {
    public function index() { 
        $loader = new Twig\Loader\FilesystemLoader('templates');
        $twig = new Twig\Environment($loader);   

        // Chargement du template
        $template = $twig->load('form.twig');

        // Génération du rendu
        echo $template->render([
            'base_url' => BASE_URL,
        ]);        
    }
    
}