<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class AuthControllerBase extends Controller
{
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        if (!$this->session->has('auth')) {
            return $this->response->redirect('/login');
        }
    }

    protected function _redirectBack() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}
