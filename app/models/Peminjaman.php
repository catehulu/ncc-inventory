<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class Peminjaman extends Model
{
    public $id;
    public $nama;
    public $email;
    public $no_telp;
    public $status;
    public $inventaris_id;
    public $kode;
    /**
     * This model is mapped to the table Inventaris
     */
    public function getSource()
    {
        return 'Peminjaman';
    }

    /**
     * A car only has a Brand, but a Brand have many Cars
     */
    public function initialize()
    {
        $this->belongsTo('inventaris_id','Inventaris','id');
    }
}

