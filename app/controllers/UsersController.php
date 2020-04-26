<?php
declare(strict_types=1);


class UsersController extends ControllerBase
{

    public function indexAction()
    {
        echo var_dump('disini');
    }

    public function registerFormAction()
    {

    }

    public function registerAction()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        echo var_dump($email, $password);
        $user = new Users;
        $user->id = $this->security->getRandom()->uuid();
        $user->nama = $nama;
        $user->email = $email;
        $user->password = $this->security->hash($password);
        $user->save();

        return $this->response->redirect('/');
    }

    public function dashboardAction()
    {

    }

}

