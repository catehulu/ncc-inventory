<?php
declare(strict_types=1);



class IndexController extends ControllerBase
{

    public function indexAction()
    {
        // $db = $this->getDI()->get('db');

        // $sql = "select * from users where id=:id";
        // $data = [
        //     'id' => 0
        // ];
        // $result = $db->query($sql,$data);
        // $user = $result->fetchAll(\Phalcon\Db\Enum::FETCH_OBJ);

        $user = $this->session->get('auth');
        echo var_dump($user);
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
            $this->session->set('auth',$user);
            $this->flashSession->success('Anda berhasil login!');
        } else {
            $this->flashSession->error('Anda gagal login!');
            return $this->response->redirect('/login');
        }

        return $this->response->redirect('/');
    }
}

