<?php
declare(strict_types=1);

use Phalcon\Paginator\Adapter\NativeArray;

class ManajemenPeminjamanController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function showAction()
    {

    }

    public function allowAction($id)
    {
        $peminjam = Peminjaman::findFirst(
            [
                'conditions' => 'id = :id: and status != '.Peminjaman::DONE,
                'bind' => [
                    'id' => $id
                ]
            ]
        );
        if (!$peminjam) {
            $this->flashSession->error('Data yang dicari tidak ada!');
            return $this->_redirectBack();
        }

        $peminjam->status = Peminjaman::ACCEPTED;
        $peminjam->save();

        $this->flashSession->success('Data berhasil dirubah!');
        return $this->_redirectBack();
    }

    public function rejectAction($id)
    {
        $peminjam = Peminjaman::findFirst(
            [
                'conditions' => 'id = :id: and status != '.Peminjaman::DONE,
                'bind' => [
                    'id' => $id
                ]
            ]
        );
        if (!$peminjam) {
            $this->flashSession->error('Data yang dicari tidak ada!');
            return $this->_redirectBack();
        }

        $peminjam->status = Peminjaman::REJECTED;
        $peminjam->save();

        $this->flashSession->success('Data berhasil dirubah!');
        return $this->_redirectBack();

    }

    public function doneAction($id)
    {
        $peminjam = Peminjaman::findFirst(
            [
                'conditions' => 'id = :id: and status != '.Peminjaman::DONE,
                'bind' => [
                    'id' => $id
                ]
            ]
        );
        if (!$peminjam) {
            $this->flashSession->error('Data yang dicari tidak ada!');
            return $this->_redirectBack();
        }

        $peminjam->delete();

        $this->flashSession->success('Data berhasil dirubah!');
        return $this->_redirectBack();
    }

    public function ajaxDatatablesAction()
    {
        if ($this->request->isAjax()) {
            // Check which column is ordered by
            $column = array(
                0 => 'num',
                1 => 'NRP',
                2 => 'nama',
                3 => 'barang',
                4 => 'status',
                5 => 'action'
            );

            $total_data = count(Peminjaman::find());
            $total_returned = $total_data;

            // Handle order and limit and search
            $limit = $this->request->getPost('length');
            $start = $this->request->getPost('start');
            $order_header = $this->request->getPost('order')[0];
            $order = $column[$order_header['column']];
            $dir = $order_header['dir'];
            $search = $this->request->getPost('search')['value'];

            // return $this->response->setJsonContent($search)->send();
            if (empty($search)) {
                $peminjams = Peminjaman::find(
                    [
                        'conditions' => 'status != '.Peminjaman::DONE,
                        'order' => $order.' '.$dir,
                        'limit' => $limit,
                        'offset' => $start,
                    ]
                );
            }
            else {
                $peminjams = Peminjaman::find(
                    [   
                        'conditions' => 'nama like :search1: or NRP like :search2: status != '.Peminjaman::DONE,
                        'bind' => [
                            'search1' => '%'.$search.'%',
                            'search2' => '%'.$search.'%'
                        ],
                        'order' => $order.' '.$dir,
                        'limit' => $limit,
                        'offset' => $start,
                    ]
                );

                $total_returned = count($peminjams);
            }
            
            $start++;
            if ($peminjams) {
                $data = [];
                foreach ($peminjams as $peminjam) {
                    $nestedData = array();
                    // Row id for the datatables
                    $nestedData['DT_RowId'] = $peminjam->id;
                    $nestedData['NRP'] = $peminjam->NRP;
                    $nestedData['nama'] = $peminjam->nama;
                    $nestedData['jumlah'] = $peminjam->jumlah;
                    $nestedData['email'] = $peminjam->email;
                    $nestedData['no_telp'] = $peminjam->no_telp;
                    $nestedData['tanggal_peminjaman'] = $peminjam->tanggal_peminjaman;
                    $nestedData['deskripsi'] = $peminjam->deskripsi;
                    $status = $peminjam->status;

                    if ($status == 0) {
                        $nestedData['status'] = '<p class="btn btn-dark">Belum</p>';
                        $nestedData['action'] = '<a class="btn btn-danger table-buttons" href="/manajemenpeminjaman/reject/'.$peminjam->id.'">Tolak</a>';
                        $nestedData['action'] = $nestedData['action'].'<a class="btn btn-success table-buttons" href="/manajemenpeminjaman/allow/'.$peminjam->id.'">Terima</a>';
                    }
                    else if ($status == 1) {
                        $nestedData['status'] = '<p class="btn btn-success table-buttons">Diterima</p>';
                        $nestedData['action'] = '<a class="btn btn-danger table-buttons" href="/manajemenpeminjaman/done/'.$peminjam->id.'">Selesai</a>';
                    }
                    else if ($status == 2) {
                        $nestedData['status'] = '<p class="btn btn-success table-buttons">Ditolak</p>';
                        $nestedData['action'] = '<a class="btn btn-danger table-buttons" href="/manajemenpeminjaman/done/'.$peminjam->id.'">Hapus</a>';
                    }

                    $nestedData['inventaris'] = $peminjam->inventaris->nama;
                    $nestedData['kode'] = $peminjam->kode;
                    $data[] = $nestedData;
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

    public function historyAction($currentPage = 1)
    {
        
        $db = $this->getDI()->get('db');
        $sql = "select * from peminjaman";
        $result = $db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        $paginator   = new NativeArray(
            [
                "data"  => $result,
                "limit" => 10,
                "page"  => $currentPage,
            ]
        );

        $page = $paginator->paginate();
        $this->view->page = $page;

    }
}

