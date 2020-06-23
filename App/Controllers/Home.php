<?php
use Core\App\Controller;

class Home extends Controller {

    public function index(): void {
        // TODO: Implement index() method.
        $data = [
            'title' => 'Home',
            'nama' => 'Adam',
            'panggil' => 'Arthur'
        ];
        $this->view(__CLASS__ . '/index', $data);
    }
}