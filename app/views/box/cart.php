					<div class="modal-body">
						<table class="table table-striped tcart">
							<thead>
								<tr>
								  <th>Name</th>
								  <th>Basic Price</th>
								  <th>Quantity</th>
								  <th>Price</th>
								  <th>Weight</th>
								  <th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if($this->data['cart']['item'])
								foreach ($this->data['cart']['item'] as $key => $val)
								{
									echo "
									<tr id=\"cartItem{$key}\">
									  <td><a href=\"".SITE."item/{$val['seoname']}\">{$val['name']}</a></td>
									  <td>$ {$val['price']}</td>
									  <td class=\"cartQty\">{$val['quantity']}</td>
									  <td class=\"cartTpr\">$ {$val['totalprice']}</td>
									  <td class=\"cartTwg\">{$val['totalweight']} Kg</td>
									  <td>
                                            <a style=\"cursor:pointer\" onclick=\"minCart({$key});\">
                                                <i class=\"fa fa-minus\"></i>
                                            </a>
                                      </td>
									</tr>
									";
								}
								if($this->data['cart']['total'])
								echo "
								<tr>
								  <th></th>
								  <th>Total</th>
								  <th id=\"Qty\">{$this->data['cart']['total']['quantity']}</th>
								  <th id=\"Tpr\">$ {$this->data['cart']['total']['price']}</th>
								  <th id=\"Twg\">{$this->data['cart']['total']['weight']} Kg</th>
								  <th></th>
								</tr>
								";
								?>
								
							</tbody>
						</table>
					</div>
                    
