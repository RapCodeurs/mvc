<?php 

require_once 'models/User.php';

class ProfileController {
    public function index() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            require_once 'views/profile.php';
        }  
    }
}

// ProfileController.php

$template = $twig->load('profile.twig');
echo $template->render([
   'base_url' => BASE_URL,
   'email' => $user->getEmail(),     
]);