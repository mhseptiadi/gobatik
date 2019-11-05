<?php

namespace Models;
use Resources;

class Cart extends Base
{
	public function __construct()
    {
        parent::__construct();	
	}
	
	/* data structure
	$this->data['cart'][''] = ;
	$this->data['cart']['item'][{itemId}]['name'] = {str};
	$this->data['cart']['item'][{itemId}]['quantity'] = {int};
	$this->data['cart']['item'][{itemId}]['price'] = {int};
	$this->data['cart']['item'][{itemId}]['totalprice'] = {int};
	$this->data['cart']['item'][{itemId}]['totalweight'] = {int};
	* 
	$this->data['cart']['total']['quantity'] = {int};
	$this->data['cart']['total']['price'] = {int};
	$this->data['cart']['total']['weight'] = {int};
	*/
	
	public function get()
	{
		return $this->session->getValue('cart');
	}
	
	public function set($cart)
	{
		return $this->session->setValue('cart',$cart);
	}
	
	public function del()
	{
		return $this->session->deleteValue('cart');
	}

	public function getPostCountry()
    {
        return $this->db->select()->from($this->config['prefix'].'postCountry')->getAll(); 
    }
    
    public function checkout($data,$post)
    {
        $query1 = $this->db->insert($this->config['prefix'].'cart', array(
            'accountId'     => $data['account']->accountId,
            'item'          => json_encode($data['cart']['item']),
            'total'         => json_encode($data['cart']['total'])
        )); 
        
        $cartId = $this->db->insertId();
        
        $query2 = $this->db->insert($this->config['prefix'].'shipping', array(
            'accountId'     => $data['account']->accountId,
            'cartId'  =>  $cartId,
            'name'  =>  $post['name'],
            'email'  =>  $post['email'],
            'telephone'  =>  $post['telephone'],
            'address'  =>  $post['address'],
            'country'  =>  $post['country'],
            'state'  =>  $post['state'],
            'city'  =>  $post['city'],
        )); 
        
        $shippingId = $this->db->insertId();
        
        if($query1 != 1 || $query2 != 1){
            header('Location:'.SITE.'error/message/transaction failed');
            die();
        }
        
        header('Location:'.SITE.'cart/payment/'.$cartId.'-'.$shippingId);
        
        //~ foreach ($data['cart']['item'] as $key => $val)
        //~ {
            //~ $current = $this->db->select('stock')->from($this->config['prefix'].'item')->where('itemId', '=', $key)->getOne();
            //~ $newStock = $current->stock - $val['quantity'];
            //~ $this->db->update('table_name', array('name' => 'jhon gmail', 'email' => 'jhon@gmail.com'), array('id' => 6)); 
        //~ }
        
    }

}
