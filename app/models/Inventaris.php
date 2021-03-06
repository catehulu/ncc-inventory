<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Relation;

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
     * One inventaris can have many peminjaman
     */
    public function initialize()
    {
        $this->hasMany(
            'id',
            'Peminjaman',
            'inventaris_id',
            [
                'foreignKey' => [
                    'action' => Relation::ACTION_CASCADE,
                ]
            ]
        );
        
        $this->addBehavior(
            new Timestampable(
                [
                    'beforeCreate' => [
                        'field'  => 'created_at',
                        'format' => 'Y-m-d',
                    ]
                ]
            )
        );
        
        $this->addBehavior(
            new Timestampable(
                [
                    'beforeUpdate' => [
                        'field'  => 'updated_at',
                        'format' => 'Y-m-d',
                    ]
                ]
            )
        );
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

