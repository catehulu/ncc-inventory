<?php
declare(strict_types=1);

class PeminjamanController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function createAction()
    {

    }

    public function storeAction()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $no_telp = $this->request->getPost('no_telp');
        $status = 0;
        $inventaris_id = $this->request->getPost('inventaris_id');
        $jumlah = $this->request->getPost('jumlah');

        $inventaris = Inventaris::findFirst(
            [
                'condition' => 'id = :inventaris_id:',
                'bind' => [
                    'inventaris_id' => $inventaris_id
                ]
            ]
        );

        if (!$inventaris) {
            
        }

        $peminjaman = new Peminjaman;
        $peminjaman->nama = $nama;
        $peminjaman->email = $email;
        $peminjaman->no_telp = $no_telp;
        $peminjaman->status = $status;
        $peminjaman->inventaris_id = $inventaris_id;
        $peminjaman->jumlah = $jumlah;
        $peminjaman->save();
    }

    public function searchAction()
    {
        $nama = $this->request->getPost('search');
        $result = Inventaris::find(
          [
              'condition' => 'nama LIKE :nama:',
              'bind' => [
                  'nama' => $nama
              ]
          ]  
        );

        $this->view->result = $result;

    }

    public function kode($kode)
    {
        $result = Peminjaman::findFirst(
          [
              'condition' => 'kode LIKE :kode:',
              'bind' => [
                  'kode' => $kode
              ]
          ]  
        );

        $this->view->result = $result;

    }

    // public function updateAction()
    // {
    //     $nama = $this->request->getPost('nama');
    //     $email = $this->request->getPost('email');
    //     $no_telp = $this->request->getPost('no_telp');
    //     $status = 0;
    //     $inventaris_id = $this->request->getPost('inventaris_id');
    //     $jumlah = $this->request->getPost('jumlah');

    //     $inventaris = Inventaris::findFirst(
    //         [
    //             'condition' => 'id = :inventaris_id:',
    //             'bind' => [
    //                 'inventaris_id' => $inventaris_id
    //             ]
    //         ]
    //     );

    //     if (!$inventaris) {
            
    //     }

    //     $peminjaman = new Peminjaman;
    //     $peminjaman->nama = $nama;
    //     $peminjaman->email = $email;
    //     $peminjaman->no_telp = $no_telp;
    //     $peminjaman->status = $status;
    //     $peminjaman->inventaris_id = $inventaris_id;
    //     $peminjaman->jumlah = $jumlah;
    //     $peminjaman->save();

    // }

    // public function deleteAction()
    // {

    // }

}

