<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $db = $this->getDI()->get('db');

        $sql = "select * from users where id=:id";
        $data = [
            'id' => 0
        ];
        $result = $db->query($sql,$data);
        $user = $result->fetchAll(\Phalcon\Db\Enum::FETCH_OBJ);


        echo var_dump($user);
    }

}

