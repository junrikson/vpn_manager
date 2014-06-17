<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}

function init_user_id($status, $member_id){	
if (!empty($member_id)) :
	if ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'duplicate'){
		echo '<h4 class="alert_error">Username telah digunakan! Coba ganti dengan username lain.</h4>';	
	}
	elseif ($status == 'max'){
		echo '<h4 class="alert_error">5 akun anda masih dalam keadaan pending. Mohon tunggu aktivasi atau hubungi salah satu kontak yang tersedia.</h4>';	
	}
?>

<article class="module width_full">
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=addpayment" method="post" >
			<header><h3>Add Payment</h3></header>            
				<div class="module_content">
                		<fieldset style="width:48%; float:left; margin-right:3%;">
							<label>Tanggal</label>
							<input name="payment_date" class="inputDate" id="inputDate" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" style="width:60%; -webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
border: 1px solid #BBBBBB;
height: 20px;
color: #666666;
-webkit-box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
-moz-box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
padding-left: 10px;
background-position: 10px 6px;
margin: 0;
display: block;
float: left;
width: 92%;
margin: 0 10px;" />
						</fieldset>
                        <fieldset style="width:48%; float:left;">
                            <label>Bank</label>
							<select style="width:92%;" name="bank">
                            	<option value="others" selected="selected">Others</option>
                                <option value="BNI">BNI - 0284593197</option>
                                <option value="BCA">BCA - 7865135301</option>
							</select>
						</fieldset>
						<fieldset style="width:99%; float:left;">
                        	<label>Alasan</label>
							<input type="hidden" style="width:92%;" name="reason" value="others" />
							<input type="text" style="width:92%;" value="Pembayaran Lainnya" disabled="disabled" readonly="readonly" />';
						</fieldset>
                        <fieldset style="width:99%; float:left;">
                        	<label>Jumlah (Rupiah)</label>
							<input type="text" style="width:92%;" name="price" />';						
						</fieldset>	
                        <fieldset style="width:99%; float:left;">
                        	<label>Pengirim</label>
							<input type="text" style="width:92%;" name="sender" placeholder="Contoh : BNI - 0284593197 a/n AGNES MONICA" value="Others" />
						</fieldset>
                        <fieldset style="width:99%; float:left;">
                        	<label>Keterangan</label>							
                            <textarea style="width:92%;" name="details" ></textarea>';
						</fieldset>
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Submit" class="alt_btn">
				</div>
			</footer>
            </form>                    
		</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;    
<?php endif; } ?>		