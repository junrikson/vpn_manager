<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}
function init_user_id($status, $user_id){
if (!empty($user_id)) :
?>

<h4 class="alert_info">Selamat datang di Control Panel</h4>

<article class="module width_full">
	<header><h3>PROSES MEMBELI :</h3></header>
    <div class="module_content" style="text-align:center;">
    <a href="./clientarea.php?action=addaccount" class="cool_button" style="color: #C30" target="_blank">REQUEST ACCOUNT</a><span class="arrow_box">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <a href="./clientarea.php?action=viewaccounts" class="cool_button" style="color: #C30; margin-left: 30px" target="_blank">MAKE INVOICE</a><span class="arrow_box">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <a href="./clientarea.php?action=invoices" class="cool_button" style="color: #C30; margin-left: 30px" target="_blank">PAYMENTS</a>
    </div>		
</article>

<article class="module width_3_quarter">
	<header><h3>Your Referral Code :</h3></header>
    <p style="font-weight:bold; margin-left: 20px">Bagikan link ini ke teman-teman anda :</p>
	<div class="module_content">
		<fieldset>
			<input type="text" readonly="readonly" value="<?php echo HOMEPAGE.'index.php?r='.$user_id; ?>">
		</fieldset>
	</div>					
</article>

<article class="module width_quarter">
			<header><h3>Bank Support</h3></header>
            <div align="center">
			<span style="font-weight:bold"><br/><img src="./member/images/bni.png" width="120" height="40" /><br/>BNI - 0284593197<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/><img src="./member/images/bca.png" width="120" height="40" /><br/>BCA - 7865135301<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/></span>
            </div>
			<footer>				
			</footer>
</article>        

<?php endif; } ?>
		
		