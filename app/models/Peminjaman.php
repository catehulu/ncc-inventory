<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\SoftDelete;
use Phalcon\Mvc\Model\Behavior\Timestampable;

class Peminjaman extends Model
{
    
    const NOT_PROCESSED     = 0;
    const ACCEPTED = 1;
    const REJECTED = 2;
    const DONE = 3;

    public $id;
    public $NRP;
    public $nama;
    public $email;
    public $no_telp;
    public $tanggal_peminjaman;
    public $tanggal_pengembalian;
    public $deskripsi;
    public $status;
    public $inventaris_id;
    public $kode;
    

    /**
     * One peminjaman only have one inventaris
     */
    public function initialize()
    {
        $this->belongsTo('inventaris_id','Inventaris','id');

        
        
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
        
        $this->addBehavior(
            new SoftDelete(
                [
                    'field' => 'status',
                    'value' => Peminjaman::DONE,
                ]
            )
        );
    }
}

