<?php
declare(strict_types=1);


class UsersController extends AuthControllerBase
{

    public function indexAction()
    {
        
    }

    public function registerFormAction()
    {

    }

    public function registerAction()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

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

    public function logoutAction()
    {
        $this->session->remove('auth');
        $this->flashSession->success('Anda telah logout!');
        return $this->response->redirect('/');
    }

}

