<?php

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'community':
        require 'app/controllers/communityController.php';
        break;

    case 'exercises':
        require 'app/controllers/exercisesController.php';
        break;

    case 'resources':
        require 'app/controllers/resourcesController.php';
        break;

    case 'test':
        require 'app/controllers/testController.php';
        break;
        
    default:
        require 'app/views/main.php';
}