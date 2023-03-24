<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model', 'dm');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('ms_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        echo $data['user']['username'] . ', Selamat Kamu berhasil Login!';
    }

    public function home()
    {
        $data['getProduct'] = $this->dm->getProduct();
        $data['title'] = 'Semua Produk';
        $this->load->view('templates/home_header', $data);
        $this->load->view('dashboard-produk', $data);
        $this->load->view('templates/home_footer');
    }

    public function detailProduct($id)
    {
        $data['getProductId'] = $this->dm->getProductId($id);
        $data['title'] = 'Detail Produk';
        // print_r($data);
        // die;
        $this->load->view('templates/home_header', $data);
        $this->load->view('detail-produk', $data);
        $this->load->view('templates/home_footer');
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function addCart()
    {
        $trx_code   = 'TRX' . '-' . $this->generateRandomString(8);
        $user_id    = $this->session->userdata('id');
        $produk_id  = $this->input->post('produk_id');
        $quantity   = $this->input->post('quantitas');

        $getPrice = $this->db->get_where('ms_product', ['id' => $produk_id])->row_array();
        $total_price = $quantity * $getPrice['price'];

        //check keranjang user ada atau ga
        $cekCart = $this->db->get_where('ms_cart', ['user_id' => $user_id, 'is_checkout' => 0])->row_array();
        if (empty($cekCart)) {
            $data = array(
                'trx_code'    => $trx_code,
                'user_id'     => $user_id,
                'total_price' => $total_price,
                'is_checkout' => 0
            );
            $this->db->insert('ms_cart', $data);
            $datas = array(
                'trx_code'    => $trx_code,
                'product_id'  => $produk_id,
                'qty'         => $quantity,
                'price'       => $getPrice['price'],
                'total_price' => $total_price,
            );
            $this->db->insert('ms_cart_detail', $datas);
        } else {
            $cart_detail = $this->db->get_where('ms_cart_detail', ['trx_code' => $cekCart['trx_code'], 'product_id' => $produk_id])->row_array();
            if (!empty($cart_detail)) {
                $data = array(
                    'total_price' => $cekCart['total_price'] + $total_price
                );
                $this->db->where('trx_code', $cekCart['trx_code']);
                $this->db->update('ms_cart', $data);

                $new_quantity = $cart_detail['qty'] + $quantity;
                $new_total_price = $new_quantity * $getPrice['price'];
                $data = array(
                    'qty'         => $new_quantity,
                    'total_price' => $new_total_price
                );
                $this->db->where('id', $cart_detail['id']);
                $this->db->update('ms_cart_detail', $data);
            } else {
                $data = array(
                    'total_price' => $cekCart['total_price'] + $total_price
                );
                $this->db->where('trx_code', $cekCart['trx_code']);
                $this->db->update('ms_cart', $data);

                $datas = array(
                    'trx_code'    => $cekCart['trx_code'],
                    'product_id'  => $produk_id,
                    'qty'         => $quantity,
                    'price'       => $getPrice['price'],
                    'total_price' => $total_price,
                );
                $this->db->insert('ms_cart_detail', $datas);
            }
        }
        redirect('dashboard/home');
    }

    public function getCart($id)
    {
        $data['getCart'] = $this->dm->getCart($id);
        $data['getCartDetail'] = $this->dm->getCartDetail($id);
        // print_r($data['getCart']);
        // die;
        $data['title'] = 'Keranjang Saya';
        $this->load->view('templates/home_header', $data);
        $this->load->view('dashboard-cart', $data);
        $this->load->view('templates/home_footer');
    }

    public function checkoutProduct($id)
    {
        $data = array(
            'is_checkout' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('ms_cart', $data);

        redirect('dashboard/home');
    }

    public function getHistory($id)
    {
        $data['getHistory'] = $this->dm->getHistory($id);
        // print_r($data['getHistory']);
        // die;
        $data['title'] = 'History Pesanan Saya';
        $this->load->view('templates/home_header', $data);
        $this->load->view('dashboard-history', $data);
        $this->load->view('templates/home_footer');
    }

    public function historyDetail($trx_code)
    {
        $data['getHistoryDetail'] = $this->dm->getHistoryDetail($trx_code);
        // print_r($data['getHistory']);
        // die;
        $data['title'] = 'History Detail Pesanan Saya';
        $this->load->view('templates/home_header', $data);
        $this->load->view('dashboard-history-detail', $data);
        $this->load->view('templates/home_footer');
    }
}
