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
        $jumlah = $this->request->getPost('jumlah');
        $inventaris = new Inventaris;
        $inventaris->nama = $nama;
        $inventaris->jumlah = $jumlah;
        $inventaris->save();
        
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

    public function updateAction()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $jumlah = $this->request->getPost('jumlah');

        $inventaris = Inventaris::findFirst(
            [
                'condition' => 'id = :id:',
                'bind' => [
                    'id' => $id
                ]
            ]
        );

        $inventaris->nama = $nama;
        $inventaris->jumlah = $jumlah;
        $inventaris->save();
    }

    public function deleteAction($id)
    {
        $inventaris = Inventaris::findFirst(
            [
                'condition' => 'id = :id:',
                'bind' => [
                    'id' => $id
                ]
            ]
        );

        $inventaris->delete();
    }

}

