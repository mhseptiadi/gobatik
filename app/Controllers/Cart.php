<?php
namespace Controllers;
use Resources, Models;

class Cart extends Base
{    
	public function __construct()
    {
        parent::__construct();
	}	
	
    public function index()
    {   
        if(empty($this->data['account']))
        $this->redirect('login?r=cart');
        $this->data['postCountry'] = $this->cart->getPostCountry();
        
		$this->output('cart',$this->data);
        
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
	    
    
    public function payment()
    {
    }
    public function checkout()
    {
        $this->cart->checkout($this->data,$_POST);
    }
    
    public function get($type)
    {
        if($type == 'table')
        $this->output('box/cart');
        if($type == 'quantity')
        echo isset($this->data['cart']['total']['quantity'])?$this->data['cart']['total']['quantity']:0;
        if($type == 'price')
        echo isset($this->data['cart']['total']['price'])?$this->data['cart']['total']['price']:0;
    }
    
    public function min()
    {   
		$args = array(
			'where' => array(
				array(
					'key' => 'itemId',
					'operand' => '=',
					'val' => $_POST['itemId'],
					'operand2' => null
				)
			)
		);
		$item = $this->item->get($args);
        
		$cart = $this->data['cart'];
        
        //~ echo '<pre>';print_r($cart);echo '</pre>';
        //~ 
        $oldquantity = isset($cart['item'][$_POST['itemId']]['quantity'])?$cart['item'][$_POST['itemId']]['quantity']:0;
		$newquantity = $oldquantity - 1;
        
        if($newquantity > 0){
            $cart['item'][$_POST['itemId']]['quantity'] = $newquantity;
            $cart['item'][$_POST['itemId']]['totalprice'] = $newquantity * $item[0]->sell;
            $cart['item'][$_POST['itemId']]['totalweight'] = $newquantity * $item[0]->weight;
            
            $item = $cart['item'][$_POST['itemId']];
            $item['itemId'] = $_POST['itemId'];
        }else{
            unset($cart['item'][$_POST['itemId']]);
            
            $item['itemId'] = $_POST['itemId'];
        }
        
        //S:total array
		$totalquantity = 0;
		$totalprice = 0;
		$totalweight = 0;
		foreach ($cart['item'] as $key => $val)
		{
			$totalquantity += $val['quantity'];
			$totalprice += $val['totalprice'];
			$totalweight += $val['totalweight'];
		}
		$cart['total']['quantity'] = $totalquantity;
		$cart['total']['price'] = $totalprice;
		$cart['total']['weight'] = $totalweight;
		//E:total array
        
		$this->cart->set($cart);
        
        $total = $cart['total'];
        
        echo json_encode(['item' => $item,'total' => $total]);
        die();
    }
    
    public function add()
    {   
		$args = array(
			'where' => array(
				array(
					'key' => 'itemId',
					'operand' => '=',
					'val' => $_POST['itemId'],
					'operand2' => null
				)
			)
		);
		$item = $this->item->get($args);

		$cart = $this->data['cart'];
		
		//S:item array
		$cart['item'][$_POST['itemId']]['name'] = $item[0]->name;
		$cart['item'][$_POST['itemId']]['seoname'] = $item[0]->seoname;
		$cart['item'][$_POST['itemId']]['price'] = $item[0]->sell;
		
		$oldquantity = isset($cart['item'][$_POST['itemId']]['quantity'])?$cart['item'][$_POST['itemId']]['quantity']:0;
		$newquantity = $oldquantity + $_POST['quantity'];
		$cart['item'][$_POST['itemId']]['quantity'] = $newquantity;
		
		$cart['item'][$_POST['itemId']]['totalprice'] = $newquantity * $item[0]->sell;
		
		$cart['item'][$_POST['itemId']]['totalweight'] = $newquantity * $item[0]->weight;
		//E:item array
		
		//S:cek stock db		
		if($item[0]->stock < $newquantity){
			$this->redirect($_POST['ref'].'?error=stock');
			die();
		}
		//S:cek stock db
				
		//S:total array
		$totalquantity = 0;
		$totalprice = 0;
		$totalweight = 0;
		foreach ($cart['item'] as $key => $val)
		{
			$totalquantity += $val['quantity'];
			$totalprice += $val['totalprice'];
			$totalweight += $val['totalweight'];
		}
		$cart['total']['quantity'] = $totalquantity;
		$cart['total']['price'] = $totalprice;
		$cart['total']['weight'] = $totalweight;
		//E:total array
		
		$this->cart->set($cart);
		
        if(isset($_POST['ref']))
		$this->redirect($_POST['ref']);
        die();
    }
}
