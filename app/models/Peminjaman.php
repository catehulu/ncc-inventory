<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;

class Peminjaman extends Model
{
    public $id;
    public $nrp;
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
                        'format' => 'Y-m-d H:i:sP',
                    ]
                ]
            )
        );
        
        $this->addBehavior(
            new Timestampable(
                [
                    'beforeUpdate' => [
                        'field'  => 'updated_at',
                        'format' => 'Y-m-d H:i:sP',
                    ]
                ]
            )
        );
    }
}

