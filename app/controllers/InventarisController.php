<?php
declare(strict_types=1);

class InventarisController extends AuthControllerBase
{

    public function indexAction()
    {
        
    }

    public function createAction()
    {

    }

    public function storeAction()
    {
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                $this->flashSession->error('Session error! refresh halaman');
                return $this->_redirectBack();
            }
        }
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');
        $jumlah = $this->request->getPost('jumlah');
        $inventaris = new Inventaris;
        $inventaris->nama = $nama;
        $inventaris->jumlah = $jumlah;
        $inventaris->deskripsi = $deskripsi;
        $inventaris->save();
        
        $this->flashSession->success('Data barang berhasil ditambah!');
        return $this->response->redirect('/inventaris');
    }

    public function showAction($id)
    {
        $result = Inventaris::findFirst(
          [
              'conditions' => 'id = :id:',
              'bind' => [
                  'id' => $id
              ]
          ]
        );

        $data = array();
        $data['id'] = $result->id;
        $data['nama'] = $result->nama;
        $data['jumlah'] = $result->jumlah;
        $data['deskripsi'] = $result->deskripsi;


        return $this->response->setJsonContent($data)->send();
    }

    public function updateAction()
    {

        
        if ($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                $this->flashSession->error('Session error! refresh halaman');
                return $this->_redirectBack();
            }
        }
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $jumlah = $this->request->getPost('jumlah');
        $deskripsi = $this->request->getPost('deskripsi');
        
        $inventaris = Inventaris::findFirst(
            [
                'conditions' => 'id = :id:',
                'bind' => [
                    'id' => $id
                ]
            ]
        );

        $inventaris->nama = $nama;
        $inventaris->jumlah = $jumlah;
        $inventaris->deskripsi = $deskripsi;
        $inventaris->save();
        return $this->_redirectBack();
    }

    public function deleteAction($id)
    {
        $inventaris = Inventaris::findFirst(
            [
                'conditions' => 'id = :id:',
                'bind' => [
                    'id' => $id
                ]
            ]
        );

        $inventaris->delete();
        return $this->_redirectBack();
    }

    public function ajaxDatatablesAction()
    {
        if ($this->request->isAjax()) {
            // Check which column is ordered by
            $column = array(
                0 => 'num',
                1 => 'nama',
                2 => 'jumlah',
                3 => 'action'
            );

            $total_data = count(Inventaris::find());
            $total_returned = $total_data;

            // Handle order and limit and search
            $limit = $this->request->getPost('length');
            $start = $this->request->getPost('start');
            $order_header = $this->request->getPost('order')[0];
            $order = $column[$order_header['column']];
            $dir = $order_header['dir'];
            $search = $this->request->getPost('search')['value'];

            // return $this->response->setJsonContent($this->request->getPost())->send();
            if (empty($search)) {
                $inventarises = Inventaris::find(
                    [
                        'order' => $order.' '.$dir,
                        'limit' => $limit,
                        'offset' => $start,
                    ]
                );
            }
            else {
                $inventarises = Inventaris::find(
                    [   
                        'conditions' => 'nama like :search:',
                        'bind' => [
                            'search' => '%'.$search.'%'
                        ],
                        'order' => $order.' '.$dir,
                        'limit' => $limit,
                        'offset' => $start,
                    ]
                );

                $total_returned = count($inventarises);
            }
            
            $start++;
            if ($inventarises) {
                $data = [];
                foreach ($inventarises as $inventaris) {
                    $nestedData = array();
                    // Row id for the datatables
                    $nestedData['DT_RowId'] = $inventaris->id;
                    $nestedData['num'] = $start;
                    $nestedData['nama'] = $inventaris->nama;
                    $nestedData['jumlah'] = $inventaris->jumlah;
                    $nestedData['action'] = '<a class="btn btn-danger" href="/inventaris/delete/'.$inventaris->id.'">Hapus</a>';
                    $nestedData['action'] = $nestedData['action'].'<button type="button" class="btn btn-info" onClick="getData('.$inventaris->id.')">Detail</button>';
                    $data[] = $nestedData;
                    $start++;
                }
            }

            $json_response = array(
                'draw'          => intval($this->request->getPost('draw')),
                'recordsTotal'    => intval($total_data),
                'recordsFiltered'    => intval($total_returned),
                'data'    => $data,
            );


            return $this->response->setJsonContent($json_response)->send();
        } else {
            return $this->response->redirect('/404');
        }
    }
}

