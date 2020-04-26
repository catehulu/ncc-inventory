<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class Inventaris extends Model
{
    public $id;
    public $nama;
    public $deskripsi;
    public $jumlah;
    /**
     * This model is mapped to the table Inventaris
     */
    // public function getSource()
    // {
    //     return 'Inventaris';
    // }

    /**
     * A car only has a Brand, but a Brand have many Cars
     */
    public function initialize()
    {
        $this->hasMany('id','Peminjaman','inventaris_id');
    }

    // public function peminjamans() {
    //     $id = $this->id;
    //     $connection = $this->getDI()->get('db');
    //     $sql = 'select * from inventaris where id = :inventaris_id';
    //     $data = [
    //         'inventaris_id' => $id
    //     ];
    //     $query = $connection->query($sql,$data);
    //     $result = $query->fetchOne(\Phalcon\Db\Enum::FETCH_OBJ);
    //     return $result;
    // }
}

