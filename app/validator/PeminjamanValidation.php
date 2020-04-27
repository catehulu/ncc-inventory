<?php
use Phalcon\Validation;
use Phalcon\Validation\Validator\Callback;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class PeminjamanValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'nama',
            new PresenceOf(
                [
                    'message' => 'Nama harap diisi!',
                ]
            )
        );

        $this->add(
            'NRP',
            new PresenceOf(
                [
                    'message' => 'NRP harap diisi!',
                ]
            )
        );

        $this->add(
            'email',
            new PresenceOf(
                [
                    'message' => 'Email harap diisi!',
                ]
            )
        );

        $this->add(
            'no_telp',
            new PresenceOf(
                [
                    'message' => 'Nomor Telpon harap diisi!',
                ]
            )
        );
        
        $this->add(
            'tanggal_peminjaman',
            new PresenceOf(
                [
                    'message' => 'Tanggal peminjaman harap diisi!',
                ]
            )
        );
        
        $this->add(
            'tanggal_pengembalian',
            new PresenceOf(
                [
                    'message' => 'Tanggal pengembalian harap diisi',
                ]
            )
        );

        
        $this->add(
            'deskripsi',
            new PresenceOf(
                [
                    'message' => 'Deskripsi harap diisi!',
                ]
            )
        );
        
        $this->add(
            'inventaris_id',
            new PresenceOf(
                [
                    'message' => 'Barang harap diisi',
                ]
            )
        );

        $this->add(
            "NRP",
            new StringLength(
                [
                    "max"            => 14,
                    "min"            => 14,
                    "messageMaximum" => "Harap masukkan NRP 14 Digit",
                    "messageMinimum" => "Harap masukkan NRP 14 Digit",
                ]
            )
        );

        $this->add(
            'email',
            new Email(
                [
                    'message' => 'Harap masukkan email yang valid',
                ]
            )
        );
    }
}