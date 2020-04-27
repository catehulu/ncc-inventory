<?php
declare(strict_types=1);

use Phalcon\Mvc\Dispatcher;

class IndexController extends ControllerBase
{
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        if ($this->session->has('auth')) {
            return $this->dispatcher->forward(
                [
                    'controller'    => 'dashboard',
                    'action'        => 'index'
                ]
            );
        }
    }

    public function indexAction()
    {
        // // $db = $this->getDI()->get('db');

        // // $sql = "select * from users where id=:id";
        // // $data = [
        // //     'id' => 0
        // // ];
        // // $result = $db->query($sql,$data);
        // // $user = $result->fetchAll(\Phalcon\Db\Enum::FETCH_OBJ);

        // $user = $this->session->get('auth');
        // echo var_dump($user);
    }

    public function loginFormAction()
    {
        if ($this->session->has('auth')) {
            return $this->response->redirect('/dashboard');
        }   
    }

    public function loginAction()
    {
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        echo var_dump($email, $password);
        $user = Users::findFirst(
            [
                'conditions' => 'email = :email:',
                'bind'       => [
                    'email' => $email
                ]
            ]
        );
        if ($user) {
            $check = $this->security->checkHash($password, $user->password);
            if ($check) {
                $this->session->set('auth',$user);
                $this->flashSession->success('Anda berhasil login!');
            } else {
                $this->flashSession->error('Anda gagal login!');
                return $this->response->redirect('/login');
            }
        } else {
            $this->flashSession->error('Anda gagal login!');
            return $this->response->redirect('/login');
        }

        return $this->response->redirect('/');
    }
}

