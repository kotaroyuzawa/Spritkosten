<?php
/*
 * Base Controller
 * Loads the models and views
 */
declare(strict_types=1);

class BaseController
{
    // Load model
    public function model(string $model): object
    {
        // Require model file
        require_once 'models/' . $model . '.php';

        // Instatiate model
        return new $model();
    }

    // Load view
    public function view(string $view, mixed $data=[]): void
    {
        // Check for view file
        if (file_exists('views/' . $view . '.php')) {
            require_once 'views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}