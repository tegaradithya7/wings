<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getProduct()
    {
        $query = $this->db->where('deleted', 0)->order_by('id', 'desc')->get('ms_product');
        return $query->result_array();
    }

    public function getProductId($id)
    {
        $query = $this->db->where('id', $id)->get('ms_product');
        return $query->row_array();
    }

    public function cekCart($user_id)
    {
        $query = $this->db->where('user_id', $user_id)->where('is_checkout', 0)->get('ms_cart');
        return $query->row_array();
    }

    function getCart($id)
    {

        $query = "	SELECT 
    					a.*
                    FROM 
                        ms_cart a 
                    WHERE 
                       a.is_checkout = 0 AND a.user_id =" . $id;

        $query = $this->db->query($query, array($id));
        return $query->row_array();
    }

    function getCartDetail($id)
    {

        $query = "	SELECT 
    					a.*,
                        b.*,
                        c.*
                    FROM 
                        ms_cart a 
					LEFT JOIN 
						ms_cart_detail b ON b.trx_code = a.trx_code
					LEFT JOIN 
						ms_product c ON c.id = b.product_id
                    WHERE 
                        a.is_checkout = 0 AND b.product_id != 0 AND a.user_id =" . $id;

        $query = $this->db->query($query, array($id));
        return $query->result_array();
    }

    function getHistory($id)
    {

        $query = "	SELECT 
    					a.*
                        
                    FROM    
                        ms_cart a 
                    WHERE 
                        a.is_checkout = 1 AND a.user_id =" . $id;

        $query = $this->db->query($query, array($id));
        return $query->result_array();
    }

    function getHistoryDetail($trx_code)
    {

        $query = "	SELECT 
    					a.*,
                        b.*
                    FROM 
                        ms_cart_detail a 
					LEFT JOIN 
						ms_product b ON b.id = a.product_id
                    WHERE 
                         a.product_id != 0 AND a.trx_code = '$trx_code'";

        $query = $this->db->query($query, array($trx_code));
        return $query->result_array();
    }
}
