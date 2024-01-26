<?php
class HellosController extends AppController
{
    public function index()
    {
      $params = 'Hello World!!';
      $this->set(compact('params'));
    }

}
