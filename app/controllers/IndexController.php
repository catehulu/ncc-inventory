<?php
declare(strict_types=1);

use Phalcon\Mvc\Model\Query;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $query = "SELECT id FROM Users";
        $createQuery = new Query($query, $this->getDI());
        $posts = $createQuery->execute();
        echo var_dump('abc');
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

    public function logoutAction()
    {
        $this->session->remove('auth');
        $this->flashSession->success('Anda telah logout!');
        return $this->response->redirect('/');
    }
}

