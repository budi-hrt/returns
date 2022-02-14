<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_in extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('terbilang');
        $this->load->model('stokIn_model', 'stokIn');
    }

    public function index()
    {

        $data['title'] = 'Pembelian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['faktur'] = $this->stokIn->faktur();
        // $data['satuan'] = $this->db->get('satuan')->result_array();
        // $data['gudang'] = $this->db->get('gudang')->result_array();
        // $data['po'] = $this->stokIn->po()->result_array();
        // $data['e_satuan'] = $this->stokIn->get_satuan();
        // if ($data['faktur']) {
        //     $faktur = $data['faktur'];
        //     $user_id = $data['user']['id'];
        //     $this->stokIn->buat_baru($faktur, $user_id);
        // }


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/list-pembelian', $data);
    }

    public function tambah_baru()
    {
        $this->stokIn->tambah_baru();
    }


    public function pembelian()
    {
        $data['title'] = 'Pembelian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->db->get('satuan')->result_array();
        $data['gudang'] = $this->db->get('gudang')->result_array();
        $data['po'] = $this->stokIn->po()->result_array();
        $data['e_satuan'] = $this->stokIn->get_satuan();
        $this->load->view('template/header_m', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/stok-in', $data);
    }

    public function faktur()
    {

        $data = $this->stokIn->faktur_baru();
        echo json_encode($data);
    }


    // Detil Pembelian
    public function getdetil()
    {

        $faktur = $this->input->get('faktur');

        $this->db->select('d.id_detil, d.qty, d.harga_detil,d.disc_detil, d.subtotal_detil, b.nama_barang, s.nama_satuan,b.barcode,d.id_sup,d.nomor_po,p.nama_suplier');
        $this->db->from('detil_pembelian d');
        $this->db->join('satuan s', 's.id=d.id_satuan', 'left');
        $this->db->join('barang b', 'b.kode=d.kode_produk', 'left');
        $this->db->join('suplier p', 'p.id=d.id_sup', 'left');
        $this->db->where('d.no_faktur', $faktur);
        $this->db->order_by('d.id_detil', 'asc');
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
                $dis = $r['disc_detil'] * $r['qty'];
                $sub_total = $r['qty'] * $r['harga_detil'] - $dis;
                echo '
                <tr>
               
                <td class="text-center">' . $no++ . '</td>
                <td>' . $r['barcode'] . '</td>
                <td>' . $r['nama_barang'] . '</td>
                <td  data-type="text" data-name="qty" data-placement="top"   class="qty text-center editable editable-click extraSectionTitle" data-original-title="Edit Quantity" data-pk="' . $r['id_detil'] . '"><a href="javascript:;">' . number_format($r['qty'], 0, ',', '.') . '</a></td>
                <td  data-type="select" data-name="satuan" data-placement="top"   class="satuan text-center" data-original-title="Edit Satuan" data-pk="' . $r['id_detil'] . '"><a href="javascript:;">' . $r['nama_satuan'] . '</a></td>
                <td  data-type="text" data-name="harga" data-placement="top"   class="harga text-center editable editable-click extraSectionTitle" data-original-title="Edit Harga" data-pk="' . $r['id_detil'] . '"><a href="javascript:;">' . number_format($r['harga_detil'], 0, ',', '.')  . '</a></td>
                <td  data-type="text" data-name="diskon" data-placement="top"   class="diskon text-center editable editable-click extraSectionTitle" data-original-title="Edit Diskon" data-pk="' . $r['id_detil'] . '"><a href="javascript:;">' . number_format($r['disc_detil'], 0, ',', '.')  . '</a></td>
                <td  class="text-right"><input type="hidden" class="subtttl" name="subttl[]" vlaue="' . $sub_total . '">' . number_format($sub_total, 0, ',', '.')  . '</td>
                <td class="text-center"><a href="javascript:;" class="item-hapus "  data="' . $r['id_detil'] . '" ><i class="fa fa-trash text-danger"></i></a></td>
                </tr>
            
            ';
                $total += $sub_total;
            }
            $this->db->where('faktur_in', $faktur);
            $potongan = $this->db->get('pembelian')->row_array();
            $pot = $potongan['potongan'];
            $Sttl = $total - $pot + $ppn;
            print_r($Sttl);
            $item = count($data->result_array());
            echo '
                <tr>
                <td colspan="6" rowspan="3">
                <div>Terbilang : ' . ucwords(number_to_words($Sttl)) . '</div>
                <input type="hidden" value="' . $item . '" id="item" name="item">
                </td>
                <td><strong>Total : </strong></td>
                <td  colspan="2" class="text-right"><strong>Rp. ' . number_format($total, 0, ',', '.') . '</strong></td>
                </tr>
                <tr>
                <td><strong>Potongan : </strong></td>
                <td  colspan="2" class="text-right"><strong>Rp. ' . number_format($pot, 0, ',', '.') . '</strong><input type="hidden" value="' . $pot . '" id="potongan" name="potongan"></td>
                </tr>
                <tr>
                <td><strong>Subtotal : </strong></td>
                <td colspan="2" class="text-right"><strong>Rp. ' . number_format($Sttl, 0, ',', '.') . '</strong><input type="hidden" value="' . $Sttl . '" id="total"></td>
                </tr>
            ';
        } else {
            echo '<tr><td colspan="8" class=text-center><p>Data Masih Kosong</p></td></tr>
                    <tr>
                    <td class="text-right" colspan="3">Total Item :</td>
                    <td><input type="hidden" value="" id="item" name="item"> 0</td>
                    <td class="text-right" colspan="3">Total Harga :</td>
                    <td class="text-left" colspan="2"><input type="hidden"  id="total"> Rp.0</td>
                    </tr>
            
            ';
        }
    }

    // Nomor Po
    public function no_po()
    {

        $data = $this->stokIn->get_nomorpo();
        echo json_encode($data);
    }

    // Detil PO
    public function getdetil_po()
    {

        $faktur = $this->input->get('faktur_po');
        $faktur_pembelian = $this->input->get('faktur_pembelian');
        $id_suplier = $this->input->get('id_suplier');

        $this->db->select('*');
        $this->db->from('detil_po');
        $this->db->where('faktur_po', $faktur);
        $this->db->order_by('id', 'asc');
        $data = $this->db->get();
        // var_dump($data);
        // die;

        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $r) {

                echo '
                <tr>
                <td>
                <input type="text" class="faktur" name="faktur[]" value="' . $faktur_pembelian . '" >
                <input type="text" class="nomor_po" name="nomor_po[]" value="' . $faktur . '" >
                <input type="text" class="id_suplier" name="id_suplier[]" value="' . $id_suplier . '" >
                </td>
                <td><input type="text" class="kode_produk" value="' . $r['kode_produk'] . '" name="kode_produk[]"></td>
                <td ><input type="text" class="qty" value="' . $r['qty'] . '" name="qty[]"></td>
                <td><input type="text" class="id_satuan" value="' . $r['id_satuan'] . '" name="id_satuan[]"></td>
                <td><input type="text" class="harga" value="' . $r['harga_item'] . '" name="harga[]"></td>
                <td><input type="text" class="diskon" value="0" name="diskon[]"></td>
                <td><input type="text" class="subtotal" value="' . $r['subtotal'] . '" name="subtotal[]"></td>
                
                </tr>
            
            ';
            }
        }
    }


    public function simpan_batch()
    {
        $faktur = $_POST['faktur'];
        $kode_produk = $_POST['kode_produk'];
        $qty = $_POST['qty'];
        $id_satuan = $_POST['id_satuan'];
        $harga = $_POST['harga'];
        $diskon = $_POST['diskon'];
        $subtotal = $_POST['subtotal'];
        $nomor_po = $_POST['nomor_po'];
        $id_suplier = $_POST['id_suplier'];
        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($faktur as $f) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'no_faktur' => $f,
                'kode_produk' => $kode_produk[$index],  // Ambil dan set data nama sesuai index array dari $index
                'qty' => $qty[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'id_satuan' => $id_satuan[$index],  // Ambil dan set data telepon sesuai index array dari $index
                'harga_detil' => $harga[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'disc_detil' => $diskon[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'subtotal_detil' => $subtotal[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'nomor_po' => $nomor_po[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'id_sup' => $id_suplier[$index],  // Ambil dan set data alamat sesuai index array dari $index
            ));

            $index++;
        }
        $this->stokIn->save_batch($data);
    }


    // get qty
    public function get_qty()
    {
        $data = $this->stokIn->get_qty();
        echo json_encode($data);
    }

    public function edit_qty()
    {
        $this->stokIn->edit_qty();
    }

    public function edittable()
    {
        $this->stokIn->edittable();
    }

    public function edit_harga()
    {
        $this->stokIn->edit_harga();
    }

    public function edit_satuan()
    {
        $this->stokIn->edit_satuan();
    }

    // edit potongan
    public function potongan()
    {
        $this->stokIn->potongan();
    }
}
