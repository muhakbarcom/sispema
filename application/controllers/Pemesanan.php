<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
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
            $config['base_url'] = base_url() . 'pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan';
            $config['first_url'] = base_url() . 'pemesanan';
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

        $data['page'] = 'pemesanan/pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function detail($id_pesanan)
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan/detail?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan/detail?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan/detail';
            $config['first_url'] = base_url() . 'pemesanan/detail';
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

        $data['page'] = 'pemesanan/pemesanan_detail';
        $this->load->view('template/backend', $data);
    }

    public function admin()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan/admin?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan/admin?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan/admin';
            $config['first_url'] = base_url() . 'pemesanan/admin';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesanan_model->total_rows_admin($q);
        $pemesanan = $this->Pemesanan_model->get_limit_data_admin($config['per_page'], $start, $q);
        // print_r($pemesanan);
        // die;
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

        $data['page'] = 'pemesanan/pemesanan_admin';
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
        redirect('frontend');
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
        redirect('frontend');
    }



    public function keranjang()
    {
        $data['title'] = 'Keranjang';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['page'] = 'keranjang';
        $this->load->view('template/pelanggan', $data);
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

            $data['page'] = 'pemesanan/pemesanan_read';
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
            'action' => site_url('pemesanan/create_action'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
            'total_pembayaran' => set_value('total_pembayaran'),
        );
        $data['title'] = 'Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pemesanan/pemesanan_form';
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
        redirect('pemesanan/keranjang');
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
        redirect('pemesanan/keranjang');
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

    public function checkout()
    {

        // print_r($_POST);die;
        $apa = $this->ion_auth->user()->row();


        $i = 1;
        $total_item = $this->cart->total_items();
        $total_bayar = $this->cart->total();

        if ($total_item == 0) {

            $this->session->set_flashdata('error', 'Pilih dulu menunya ');
            redirect('pemesanan/keranjang');
        } else {
            // print_r($total_item);die;
            $data = array(
                'tanggal_pemesanan' => date('Y-m-d'),
                'total_pembayaran' => $total_bayar,
                'id_pelanggan' => $apa->id,
                'nama_pemesan' => $this->input->post("nama_pemesan"),
                'no_meja' =>  $this->input->post("no_meja"),
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
                'status_pembayaran' => "dalam proses",
            );

            $this->Pembayaran_model->insert($data_pembayaran);

            $this->cart->destroy();
            redirect('pemesanan/berhasil');
        }
    }

    public function berhasil()
    {
        $this->session->set_flashdata('success', 'Pemesanan berhasil');
        $data['title'] = 'Berhasil';
        //$this->layout->set_privilege(1);
        $data['page'] = 'berhasil';
        $this->load->view('template/pelanggan', $data);
    }

    // public function checkout()
    // {
    //     // var_dump($_SESSION['success']); exit;

    //     $data['title'] = 'Pemesanan Konsumen';
    //     //$this->layout->set_privilege(1);
    //     $data['page'] = 'checkout';
    //     $this->load->view('template/pelanggan', $data);
    // }

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
        redirect(site_url('pemesanan/admin'));
    }

    public function konfirmasi_pembayaran($id_pembayaran)
    {

        $data = array(
            'status_pembayaran' => "selesai",
        );

        // $data_pemesanan = array(
        //     'status_pemesanan' => "sedang diproses",
        //     'id_cheff' => $this->session->userdata("user_id"),
        // );

        $this->Pembayaran_model->update($id_pembayaran, $data);
        // $this->Pemesanan_model->update($id_pemesanan, $data_pemesanan);

        $this->session->set_flashdata('success', 'Update Record Success');
        redirect(site_url('pemesanan/admin'));
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
        redirect(site_url('pemesanan/admin'));
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