<?php 

class LogoutController {
    public function index() { 
        header('location: '.BASE_URL);
    }

}