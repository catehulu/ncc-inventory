<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class Peminjaman extends Model
{
    public $id;
    public $nama;
    public $status;
    public $inventaris_id;
    public $kode;

    public function barang(){
        $id = $this->id;
        $connection = $this->getDI()->get('db');
        $sql = 'select * from peminjaman where peminjaman_id = :inventaris_id';
        $data = [
            'inventaris_id' => $id
        ];
        $query = $connection->query($sql,$data);
        $result = $query->fetchAll(\Phalcon\Db\Enum::FETCH_OBJ);
        return $result;
    }
}

