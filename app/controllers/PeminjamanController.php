<?php
declare(strict_types=1);

class PeminjamanController extends ControllerBase
{

    public function indexAction()
    {
    }

    public function createAction()
    {
        $inventarises = Inventaris::find();
        $this->view->inventarises = $inventarises;
    }

    public function storeAction()
    {
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                $this->flashSession->error('Session error! refresh halaman');
                return $this->_redirectBack();
            }
        }
        $validation = new PeminjamanValidation();
        $status = $validation->validate($this->request->getPost());
        if (count($status)) {
            foreach ($status as $message) {
                $this->flashSession->error($message->getMessage());
            }
            return $this->_redirectBack();
        }
        $nama = $this->request->getPost('nama');
        $NRP = $this->request->getPost('NRP');
        $email = $this->request->getPost('email');
        $no_telp = $this->request->getPost('no_telp');
        $tanggal_peminjaman = $this->request->getPost('tanggal_peminjaman');
        $tanggal_pengembalian = $this->request->getPost('tanggal_pengembalian');
        $deskripsi = $this->request->getPost('deskripsi');
        $status = 0;
        $inventaris_id = $this->request->getPost('inventaris_id');
        $jumlah = $this->request->getPost('jumlah');

        $inventaris = Inventaris::findFirst(
            [
                'conditions' => 'id = :inventaris_id:',
                'bind' => [
                    'inventaris_id' => $inventaris_id
                ]
            ]
        );

        if (!$inventaris) {
            $this->flashSession->error('Barang yang anda minta tidak ada!');
            $this->response->redirect('/peminjaman');
        }

        $kode = $this->generateCode(5);

        $peminjaman = new Peminjaman;
        $peminjaman->nama = $nama;
        $peminjaman->NRP = $NRP;
        $peminjaman->email = $email;
        $peminjaman->no_telp = $no_telp;
        $peminjaman->status = $status;   
        $peminjaman->inventaris_id = $inventaris_id;
        $peminjaman->jumlah = $jumlah;
        $peminjaman->tanggal_peminjaman = $tanggal_peminjaman;
        $peminjaman->tanggal_pengembalian = $tanggal_pengembalian;
        $peminjaman->deskripsi = $deskripsi;
        $peminjaman->kode = $kode;
        $peminjaman->save();

        $this->response->redirect('/peminjaman/kode/'.$kode);
    }

    public function kodeAction($kode)
    {
        $peminjam = Peminjaman::findFirst(
          [
              'conditions' => 'kode = :kode:',
              'bind' => [
                  'kode' => $kode
              ]
          ]  
        );

        
        $this->view->peminjam = $peminjam;

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
    //             'conditions' => 'id = :inventaris_id:',
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

    protected function generateCode($length = 5){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

