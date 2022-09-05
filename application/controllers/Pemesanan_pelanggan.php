<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan_pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        // exit;
        // $this->layout->auth_privilege($c_url);
        $this->load->library('form_validation');
        $this->load->model('Pemesanan_model');
        $this->load->model('Produk_model');
        $this->load->model('Detail_pemesanan_model');
        $this->load->model('Pembayaran_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan_pelanggan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan';
            $config['first_url'] = base_url() . 'pemesanan_pelanggan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesanan_model->total_rows($q);
        $pemesanan = $this->Pemesanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan_pelanggan/pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function detail($id_pesanan)
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan/detail?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan_pelanggan/detail?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan/detail';
            $config['first_url'] = base_url() . 'pemesanan_pelanggan/detail';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_pemesanan_model->total_rows_detail($q, $id_pesanan);
        $pemesanan = $this->Detail_pemesanan_model->get_limit_data_detail($id_pesanan);


        $this->load->library('pagination');
        $this->pagination->initialize($config);
        // print_r($pemesanan);die;
        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $xxx = $this->db->query("SELECT * FROM pemesanan where id_pemesanan='$id_pesanan'")->row();
        $data['nama_pemesan'] = $xxx->nama_pemesan;
        $data['no_meja'] = $xxx->no_meja;
        $data['tanggal_pemesanan'] = $xxx->tanggal_pemesanan;
        if ($xxx->id_cheff) {
            $nama_cheff = $this->db->query("SELECT concat(first_name,' ',last_name) as name from users where id='$xxx->id_cheff'")->row()->name;
            $data['id_cheff'] = $nama_cheff;
        } else {
            $data['id_cheff'] = '';
        }
        $data['title'] = 'Pemesanan Detail';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'berhasil_pelanggan';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function admin()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan/admin?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan_pelanggan/admin?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan/admin';
            $config['first_url'] = base_url() . 'pemesanan_pelanggan/admin';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesanan_model->total_rows_admin($q);
        $pemesanan = $this->Pemesanan_model->get_limit_data_admin($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan_pelanggan/pemesanan_admin';
        $this->load->view('template/backend', $data);
    }

    public function tambahKeranjang($id_produk)
    {
        $produk = $this->Produk_model->get_by_id($id_produk);

        $data = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga_produk,
            'name'    => $produk->nama_produk,
        );
        $this->cart->insert($data);
        redirect('frontend_pelanggan');
    }
    public function addKeranjang($id_produk)
    {
        $produk = $this->Produk_model->get_by_id($id_produk);

        $data = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga_produk,
            'name'    => $produk->nama_produk,
        );
        $this->cart->insert($data);
        redirect('frontend_pelanggan');
    }



    public function keranjang()
    {
        $data['title'] = 'Keranjang';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['page'] = 'keranjang_pelanggan';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function read($id)
    {
        $row = $this->Pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pemesanan' => $row->id_pemesanan,
                'tanggal_pemesanan' => $row->tanggal_pemesanan,
                'total_pembayaran' => $row->total_pembayaran,
            );
            $data['title'] = 'Pemesanan';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pemesanan_pelanggan/pemesanan_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemesanan_pelanggan/create_action'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
            'total_pembayaran' => set_value('total_pembayaran'),
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pemesanan_pelanggan/pemesanan_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan', TRUE),
                'total_pembayaran' => $this->input->post('total_pembayaran', TRUE),
            );

            $this->Pemesanan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('pemesanan'));
        }
    }

    function hapus($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('pemesanan_pelanggan/keranjang');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('pemesanan_pelanggan/keranjang');
    }

    public function set_session_np()
    {
        $xxx = $_POST['session'];
        $this->session->set_userdata('nama_pemesan', $xxx);
        echo 'Session set!';
        return;
    }
    public function set_session_nm($xxx)
    {
        $this->session->set_userdata('no_meja', $xxx);
        echo 'Session set!';
        return;
    }

    public function buatPesanan()
    {
        $metode_bayar = $this->input->post('metode_pembayaran', TRUE);
        $bukti_transfer = $_FILES['bukti_transfer'];
        // var_dump($bukti_transfer["size"]); exit;
        if ($metode_bayar == "transfer bank" && $bukti_transfer["size"] == 0) {
            $this->session->set_flashdata('error', 'harus menyertakan bukti transfer');

            redirect(site_url('pemesanan_pelanggan/checkout'));
            exit;
        }
        if ($bukti_transfer == '') {
        } else {
            $config['upload_path'] = './assets/uploads/image/bukti_tf/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti_transfer')) {

                $bukti_transfer = $this->upload->data('file_name');
            } else {
                $bukti_transfer = null;
            }
        }

        // print_r($_POST);die;
        $apa = $this->ion_auth->user()->row();


        $i = 1;
        $total_item = $this->cart->total_items();
        $total_bayar = $this->cart->total();

        if ($total_item == 0) {

            $this->session->set_flashdata('error', 'Pilih dulu menunya ');
            redirect('pemesanan_pelanggan/keranjang');
        } else {
            // print_r($total_item);die;
            $data = array(
                'tanggal_pemesanan' => date('Y-m-d'),
                'total_pembayaran' => $total_bayar,
                'id_pelanggan' => $apa->id,
                'nama_pemesan' => cek_nama_user($apa->id),
                'no_meja' =>  NULL,
            );

            $id_trx = $this->Pemesanan_model->insert($data);
            $i = 1;

            foreach ($this->cart->contents() as $items) {

                $data_detail = array(
                    'id_pemesanan' => $id_trx,
                    'id_produk' => $items['id'],
                    'qty' => $items['qty'],
                    'total_harga' => $items['subtotal'],
                );
                $i++;

                $this->Detail_pemesanan_model->insert($data_detail);
            }

            $data_pembayaran = array(
                'id_pemesanan' => $id_trx,
                'metode_pembayaran' => $this->input->post('metode_pembayaran', TRUE),
                'status_pembayaran' => "pembayaran tertunda",
                'bukti_transfer' => $bukti_transfer,
            );

            $this->Pembayaran_model->insert($data_pembayaran);

            $this->cart->destroy();
            $this->session->set_flashdata('success', 'Pemesanan berhasil');
            redirect('pemesanan_pelanggan/histori');
        }
    }

    public function histori()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan/histori?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan_pelanggan/histori?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan_pelanggan/histori';
            $config['first_url'] = base_url() . 'pemesanan_pelanggan/histori';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesanan_model->total_rows_pelanggan($q);
        $pemesanan = $this->Pemesanan_model->get_limit_data_pelanggan($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan_pelanggan/histori';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function detail_histori($id)
    {

        $config['total_rows'] = $this->Detail_pemesanan_model->total_histori($id);
        $detail_pemesanan = $this->Detail_pemesanan_model->get_limit_histori($id);



        $data = array(
            'pemesanan_data' => $detail_pemesanan,

        );
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Detail Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan_pelanggan/detail_histori';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function upload_ulang($id)
    {
        $pemesanan = $this->db->query("SELECT id_pembayaran from pembayaran where id_pemesanan = '$id'")->row();
        $id_pembayaran = $pemesanan->id_pembayaran;

        $data = array(
            'id_pembayaran' => $id_pembayaran,

        );
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Detail Pemesanan' => '',
        ];

        $data['page'] = 'pemesanan_pelanggan/upload_ulang';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function upload_ulang_action()
    {
        $id_pembayaran = $this->input->post('id_pembayaran', TRUE);
        $bukti_transfer = $_FILES['bukti_transfer']['name'];

        $config['upload_path']          = './assets/uploads/image/bukti_tf/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'bukti_transfer' . time();

        $this->load->library('upload', $config);

        if (!empty($_FILES["bukti_transfer"]["name"])) {
            if ($this->upload->do_upload('bukti_transfer')) {

                $bukti_transfer = $this->upload->data('file_name');
            } else {
                $bukti_transfer = null;
            }
        }

        $data = array(
            'bukti_transfer' => $bukti_transfer,
        );

        $this->Pembayaran_model->update($id_pembayaran, $data);
        $this->session->set_flashdata('success', 'Upload ulang berhasil');
        redirect('pemesanan_pelanggan/histori');
    }

    public function berhasil()
    {
        $data['title'] = 'List Pemesanan';
        $id_user = $this->ion_auth->user()->row()->id;
        $data['data'] = $this->db->query("SELECT * from pemesanan where id_pelanggan='$id_user' order by id_pemesanan DESC")->result();
        $data['page'] = 'berhasil_pelanggan';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function berhasil_detail($id_pemesanan)
    {
        $data['title'] = 'List Pemesanan Detail';
        $data['data'] = $this->db->query("SELECT * from detail_pemesanan where id_pemesanan='$id_pemesanan' order by id_detail_pemesanan DESC")->result();
        $data['page'] = 'berhasil_pelanggan_detail';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function checkout()
    {
        // var_dump($_SESSION['success']); exit;

        $data['title'] = 'Pemesanan Konsumen';
        //$this->layout->set_privilege(1);
        $data['page'] = 'checkout_pelanggan';
        $this->load->view('template/pelanggan_pelanggan', $data);
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesanan', TRUE));
        } else {
            $data = array(
                'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan', TRUE),
                'total_pembayaran' => $this->input->post('total_pembayaran', TRUE),
            );

            $this->Pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('pemesanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Pemesanan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('pemesanan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Pemesanan_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function konfirmasi_pesanan($id_pemesanan)
    {

        // $data = array(
        //     'status_pembayaran' => "selesai",
        // );
        $data_pemesanan = array(
            'status_pemesanan' => "sedang diproses",
            'id_cheff' => $this->session->userdata("user_id"),
        );

        // $this->Pembayaran_model->update($id_pembayaran, $data);
        $this->Pemesanan_model->update($id_pemesanan, $data_pemesanan);

        $this->session->set_flashdata('success', 'Update Record Success');
        redirect(site_url('pemesanan_pelanggan/admin'));
    }
    public function selesaikan($id_pemesanan)
    {

        // $data = array(
        //     'status_pembayaran' => "selesai",
        // );
        $data_pemesanan = array(
            'status_pemesanan' => "selesai",
        );

        // $this->Pembayaran_model->update($id_pembayaran, $data);
        $this->Pemesanan_model->update($id_pemesanan, $data_pemesanan);

        $this->session->set_flashdata('success', 'Update Record Success');
        redirect(site_url('pemesanan_pelanggan/admin'));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal_pemesanan', 'tanggal pemesanan', 'trim|required');
        $this->form_validation->set_rules('total_pembayaran', 'total pembayaran', 'trim|required');

        $this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:17:18 */
/* http://harviacode.com */