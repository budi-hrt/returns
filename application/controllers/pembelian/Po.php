<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('terbilang');
        $this->load->model('po_model', 'po');
    }

    public function index()
    {

        $data['title'] = 'Purchase Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->db->get('satuan')->result_array();
        $data['suplier'] = $this->db->get('suplier')->result_array();

        $this->load->view('template/header_m', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/po', $data);
    }

    public function faktur()
    {

        $data['faktur'] = $this->po->faktur_po();
        echo json_encode($data);
    }

    function get_produk()
    {
        if (isset($_GET['term'])) {
            $result = $this->po->cari_produk($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->barcode . " | " . $row->nama_barang,
                        'description'    => $row->kode,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function getharga()
    {
        $data = $this->po->getharga();
        echo json_encode($data);
    }



    public function getdetil()
    {

        $faktur = $this->input->get('faktur_po');

        $this->db->select('d.id as idDetil, d.qty, d.harga_item, d.subtotal, b.nama_barang, s.nama_satuan,b.barcode');
        $this->db->from('detil_po d');
        $this->db->join('satuan s', 's.id=d.id_satuan', 'left');
        $this->db->join('barang b', 'b.kode=d.kode_produk', 'left');
        $this->db->where('d.faktur_po', $faktur);
        $this->db->order_by('d.id', 'asc');
        $data = $this->db->get();
        // var_dump($data);
        // die;
        $no = 1;
        $total = 0;
        $diskon = 0;
        $ppn = 0;
        $Sttl = 0;
        $item = 0;
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $r) {

                echo '
                <tr>
                <td><input type="checkbox" class="check-item" name="check[]" value="' . $r['idDetil'] . '" ></td>
                <td class="text-center">' . $no++ . '</td>
                <td>' . $r['barcode'] . '</td>
                <td>' . $r['nama_barang'] . '</td>
                <td class="text-center">' . number_format($r['qty'], 0, ',', '.') . '</td>
                <td  class="text-center">' . $r['nama_satuan'] . '</td>
                <td  class="text-right">' . number_format($r['harga_item'], 0, ',', '.')  . '</td>
                <td  class="text-right">' . number_format($r['subtotal'], 0, ',', '.')  . '</td>
                </tr>
            
            ';
                $total += $r['subtotal'];
            }

            $Sttl = $total - $diskon + $ppn;
            print_r($Sttl);
            $item = count($data->result_array());
            echo '
                <tr>
                <td colspan="6" rowspan="3">
                <div>Terbilang : ' . ucwords(number_to_words($Sttl)) . '</div>
                <input type="hidden" value="' . $item . '" id="item">
                </td>
                <td><strong>Total : </strong></td>
                <td class="text-right">Rp. ' . number_format($total, 0, ',', '.') . '</td>
                </tr>
                <tr>
                <td><strong>Discount : </strong></td>
                <td class="text-right">Rp. ' . number_format($diskon, 0, ',', '.') . '</td>
                </tr>
                <tr>
                <td><strong>Subtotal : </strong></td>
                <td class="text-right">Rp. ' . number_format($Sttl, 0, ',', '.') . '<input type="hidden" value="' . $Sttl . '" id="total"></td>
                </tr>
            ';
        } else {
            echo '<tr><td colspan="8" class=text-center><p>Data Masih Kosong</p></td></tr>
                    <tr>
                    <td class="text-right" colspan="2">Total Item :</td>
                    <td> 0</td>
                    <td class="text-right" colspan="3">Total Harga :</td>
                    <td class="text-left" colspan="2"><input type="hidden"  id="total"> Rp.0</td>
                    </tr>
            
            ';
        }
    }


    public function simpandetil()
    {
        $this->po->simpanDetil();
    }

    public function getD()
    {
        $data = $this->po->getD();
        echo json_encode($data);
    }


    public function ubahdetil()
    {
        $this->po->ubahdetil();
    }


    public function hapusdetil()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $id = explode(",", $id);
        // var_dump($id);
        // die;

        $this->po->hapusdetil($id);
    }

    public function proses()
    {
        $this->po->proses();
    }

    public function invoice()
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['po'] = $this->po->poterakhir()->row_array();

        $this->load->view('template/header_m', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/faktur-po', $data);
    }

    public function getdetilinvoice()
    {

        $faktur = $this->input->get('faktur_po');

        $this->db->select('d.id as idDetil, d.qty, d.harga_item, d.subtotal, b.nama_barang, s.nama_satuan,b.barcode');
        $this->db->from('detil_po d');
        $this->db->join('satuan s', 's.id=d.id_satuan', 'left');
        $this->db->join('barang b', 'b.kode=d.kode_produk', 'left');
        $this->db->where('d.faktur_po', $faktur);
        $this->db->order_by('d.id', 'asc');
        $data = $this->db->get();
        // var_dump($data);
        // die;
        $no = 1;
        $total = 0;
        $diskon = 0;
        $ppn = 0;
        $Sttl = 0;
        $item = 0;
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $r) {

                echo '
                <tr>
                <td class="text-center">' . $no++ . '</td>
                <td>' . $r['nama_barang'] . '</td>
                <td class="text-center">' . number_format($r['qty'], 0, ',', '.') . '</td>
                <td  class="text-center">' . $r['nama_satuan'] . '</td>
                <td  class="text-right">' . number_format($r['harga_item'], 0, ',', '.')  . '</td>
                <td  class="text-right">' . number_format($r['subtotal'], 0, ',', '.')  . '</td>
                </tr>
            
            ';
                $total += $r['subtotal'];
            }

            $Sttl = $total - $diskon + $ppn;
            print_r($Sttl);
            $item = count($data->result_array());
            echo '
                <tr>
                <td colspan="4" rowspan="3">
                <div>Terbilang : ' . ucwords(number_to_words($Sttl)) . '</div>
                <input type="hidden" value="' . $item . '" id="item">
                </td>
                <td><strong>Total : </strong> </td>
                <td class="text-right">Rp. ' . number_format($total, 0, ',', '.') . '</td>
                </tr>
                <tr>
                <td><strong>Discount : </strong></td>
                <td class="text-right">Rp. ' . number_format($diskon, 0, ',', '.') . '</td>
                </tr>
                <tr>
                <td><strong>Subtotal : </strong> </td>
                <td class="text-right">Rp. ' . number_format($Sttl, 0, ',', '.') . '<input type="hidden" value="' . $Sttl . '" id="total"></td>
                </tr>
            ';
        } else {
            echo '<tr><td colspan="7" class=text-center><p>Data Masih Kosong</p></td></tr>
                    <tr>
                    <td class="text-right" colspan="2">Total Item :</td>
                    <td> 0</td>
                    <td class="text-right" colspan="3">Total Harga :</td>
                    <td class="text-left" colspan="2"><input type="hidden"  id="total"> Rp.0</td>
                    </tr>
            
            ';
        }
    }



    public function editpo($id)
    {


        $data['title'] = 'Ubah Purchase Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->db->get('satuan')->result_array();
        $data['faktur'] = $this->po->cari_faktur($id)->row_array();
        $this->load->view('template/header_m', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/edit-po', $data);
    }

    public function ubahdatapo()
    {
        $this->po->ubahdatapo();
    }

    public function cetakpo($id, $faktur)
    {

        $data['po'] = $this->po->cari_faktur($id)->row_array();
        $data['detil'] = $this->po->cari_detil($faktur)->result_array();

        $this->load->view('pembelian/pdf-po', $data);
    }
}
