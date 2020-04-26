<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
    protected function _redirectBack() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}
