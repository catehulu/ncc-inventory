<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $nama;
    public $email;
    public $password;
}

