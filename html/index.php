<?php
	if (isset($_COOKIE["referral"])){
  		$referral = $_COOKIE["referral"];
  	}
	else{
		$referral = '0';
	}
  	if(array_key_exists('r', $_GET)){
		$referral = filter_input(INPUT_GET, 'r', FILTER_SANITIZE_STRING);		
	}
	setcookie("referral",$referral, time()+3600*24, "/");	
	include_once 'config.php';
	include_once 'header.php';
?>
	<div class="main" id="container">
	<div class="content">	
		<div class="content_top section" id="section-1">  
			<div class="wrap">                                  		
				<div class="banner_desc">
                <p class="flip"><span style="color: #FF0; font-weight: bold;">KLIK >>&nbsp;&nbsp; CHAT WITH US &nbsp;&nbsp;<< KLIK</span><br/><marquee style="font-size: 12px;">~ Untuk TRIAL klik Account ==> Daftar ==> Login ==> Add New Account (TRIAL 4 - 24 Jam) ==> Tunggu akunnya diaktifkan. ~ Harap Tinggalkan Pesan di <a href="https://www.facebook.com/vpnku.net" style="color: #EDF;" target="_blank">Facebook</a> jika tidak ada admin yang online.</marquee></p>
				<div class="panel">
					<iframe src="./chat/index.php" height="100%" width="100%"></iframe>
                </div>
            		<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article><p>Rp 50.000,- dengan akses ke 3 Server (Indonesia, Singapore, US)</p> <img src="./images/clouds.png"  alt="" /> </article>
							<article><p>Mendukung koneksi baik melalui VPN maupun SSH</p> <img src="./images/system.png"  alt="" /> </article>
							<article><p>Support Special VPN (VPN melalui jalur SSH)</p> <img src=".//images/slider-img3.png"  alt="" /> </article>
							<article><p>Dapatkan 40 % komisi hanya dengan membagikan link VPNku</p> <img src="./images/slider-img4.png"  alt="" /> </article>
						</div>
                 	</div>
            	 	<script src="./js/jquery.wmuSlider.js"></script> 
					<script type="text/javascript" src="./js/modernizr.custom.min.js"></script> 
					<script>
       					$('.example1').wmuSlider();         
   					</script> 	   
   						         	      
            		<div class="dropdown-buttons"> 
				   	</div>          		
                 	<div class="quote_button">
                  	 	<a class="popup-with-zoom-anim" href="#small-dialog">Download Aplikasi v3.3</a>
				<div style="text-align: center;"><span style="font-size: 12px; color: #000; font-weight: bold;"><br/><?php 
					$File = "counter.txt"; 
					$handle = fopen($File, 'r+') ; 
					$data = fread($handle, 512) ; 
					echo $data; 
					fclose($handle) ; 
		 			?> Times Downloaded</span>
				</div>
                  	 	<div id="small-dialog" class="mfp-hide">
					    	<div class="priceing-tabel">
								<div class="priceing-header">
									<h4>Windows</h4>
								</div>
								<ul>
									<li><a href="./download.php?os=winxp">Windows XP</a></li>
									<li><a href="./download.php?os=winvista">Windows Vista</a></li>
									<li><a href="./download.php?os=win7">Windows 7</a></li>
									<li><a href="./download.php?os=win8">Windows 8/8.1</a></li>
								</ul>
							</div>
						</div>
               		</div>                
             	</div>
          	</div>
        	<div class="comment_icons">
            	<ul>
                	<li><a class="comments" href="#"> <span>34 Comments</span> </a></li>
                	<li><a class="email" href="#"> <span>86 Shares</span> </a></li>
                	<li><a class="like" href="#"> <span>225 Likes</span> </a></li>
            	</ul>
          	</div>
     	</div>
                       
   		<div class="about_desc section" id="section-2"> 
        	<div class="wrap">            
            	<div class="section group example">
					<div class="col_1_of_2 span_1_of_2" align="justify">
						<h3>Apa yang anda dapatkan di VPNku ?</h3>
						<p><span style="font-weight:bold">Amankan privasi anda dengan koneksi internet terenkripsi menggunakan VPNku! VPNku (Virtual Private Network-ku) merupakan layanan VPN terbaik dengan harga yang terjangkau. </span></p>
						<ul type="disc" style="list-style-type: disc;  ">
							<li style="margin: 1em 0;"><span style="font-weight:bold; font-style:italic">Akses internet yang terblokir. </span>Dengan VPNku, anda dapat mengakses website yang terblokir oleh provider anda.</li>
							<li style="margin: 1em 0;"><span style="font-weight:bold; font-style:italic">Mengunjungi website yang hanya dapat diakses oleh negara tertentu.</span> Contohnya website yang mengharuskan pengguna berasal dari US, dengan VPNku anda dapat mengakses semua website menggunakan VPNku server US.</li>
							<li style="margin: 1em 0;"><span style="font-weight:bold; font-style:italic">Bermain Game yang mengharuskan anda berdomisili di negara tertentu. </span>Misalnya Game Singapore/US yang tidak dapat diakses oleh IP yang berasal dari Indonesia.</li>
							<li style="margin: 1em 0;"><span style="font-weight:bold; font-style:italic">Keamanan yang tinggi. </span>Setiap koneksi menggunakan VPNku dienkripsi menggunakan DH-2048 dan beberapa enkripsi yang selalu diupdate sesuai dengan standar keamanan yang terbaru. Dengan tingkat keamanan ini, aktifitas internet anda menjadi lebih aman dari penyusup.</li>
						</ul>
		 			</div>
					<div class="col_1_of_2 span_1_of_2" align="justify">
						<ul type="disc" style="list-style-type: disc"><li><span style="font-weight:bold; font-style:italic">Anonymous.</span> VPNku membuat indentitas anda menjadi aman dan tidak dapat dikenali, termasuk negara asal, dan daerah tempat anda mengakses internet.</li>
                           <li style="margin: 1em 0;"><span style="font-weight:bold; font-style:italic">Koneksi internet yang lebih stabil.</span> Server yang terhubung dengan VPNku menggunakan jaringan bawah laut yang terhubung ke sebagian besar Datacenter yang ada di Dunia. Dengan koneksi VPNku, aktifitas internet anda akan semakin cepat dan stabil tergantung website tujuan anda.</li>
							<li style="margin: 1em 0;"><span style="font-weight:bold; font-style:italic">Kontak Servis yang cepat dan handal.</span> Setiap permasalahan anda akan ditangani dan dipandu kurang dari 12 jam dan jika dibutuhkan VPNku Team siap melakukan remote sesuai dengan masalah anda. Setiap member yang tergabung juga dapat mengkonsultasikan masalah umum mengenai Komputer dan Internet secara gratis.</li>
						</ul>
                        <p><span style="font-weight:bold; font-style:italic"><br/>NB : Akses internet gratis bukan merupakan tujuan dari VPN, akses internet gratis merupakan Bug yang ada pada provider yang dapat ditutup kapan saja. VPNku menjual jasa VPN bukan Internet gratis.</span></p>
					</div>
				</div>	        
        	</div>             
     	</div>  
       	  
   		<div class="features section" id="section-3">      	      	      	   	
     		<h2>How to Buy?</h2>
       	   
       	    	 
       	    <div class="browser">  	       
       	   	    <div id="mySliderTabsContainer">
	               <div id="mySliderTabs">
	               		<ul>
	                		<li><a class="cloud_icon" href="#mother"><i class="cloud_icon"> 1</i></a></li>
	                		<li><a class="cross" href="#parks">  <i class="cross"> 2</i> </a></li>
	                		<li><a class="bubble" href="#theOffice"><i class="bubble"> 3</i></a></li>
	                		<li><a class="right_arrow" href="#southPark"> <i class="right_arrow"> 4</i></a></li>
	              		</ul>
	              		<div id="mother" align="center">
                        <a href="./register.php" target="blank_"><div class="arrow_box" style="width: 600px; padding-bottom: 100px; padding-top: 100px; font-size:45px; font-weight:bolder; margin-bottom: 50px;">Melakukan Pendaftaran</div></a>
             			</div>
	      				<div id="parks" align="center">
              			<a href="./clientarea.php" target="blank_"><div class="arrow_box" style="width: 600px; padding-bottom: 100px; padding-top: 100px; font-size:45px; font-weight:bolder; margin-bottom: 50px;">Request Akun</div></a>
                        </div>
	          			<div id="theOffice" align="center">
	          			<a href="./clientarea.php" target="blank_"><div class="arrow_box" style="width: 600px; padding-bottom: 100px; padding-top: 100px; font-size:45px; font-weight:bolder; margin-bottom: 50px;">Melakukan Pembayaran</div></a>
                        </div>
	          			<div id="southPark" align="center">
	          			<a href="./clientarea.php" target="blank_"><div class="arrow_box" style="width: 600px; padding-bottom: 100px; padding-top: 100px; font-size:45px; font-weight:bolder; margin-bottom: 50px;">Berbagi Link Referral</div></a>
                        </div>             
	      			</div>
	      			<div class="clear"></div>
	     		</div>
     		</div>
     		<link rel="stylesheet" href="./css/jquery.sliderTabs.min.css">
			<script src="./js/jquery.sliderTabs.min.js"></script> 
			<script>
			$(document).ready(function(){
				var tabs = $("div#mySliderTabs").sliderTabs({
					autoplay:5000,

				  	indicators: true,
				  	panelArrows: true,
				  	panelArrowsShowOnHover: true
				});      
				/*      $("#mySliderTabsContainer").resizable({
				        maxHeight: 200,
				        minHeight: 200,
				        maxWidth: 605
				      });
				*/
				prettyPrint();
			});
				
			$(document).delegate(".nav-list li a", "click", function(){
				$(this).parent().siblings().removeClass("active");
				$(this).parent().addClass("active");
			});	
			</script>
		
  		</div>  
	</div>
	</div>
   
  	<div class="footer section"  id="section-4">
  	<div class="wrap">
    	<div class="section group example">
			<div class="col_1_of_2 span_1_of_2">
				<div class="footer_logo">
					<img src="./images/logo.png" alt="" />
				</div>
				<p>Dapatkan informasi update terbaru dan promosi dari VPNku dengan berlangganan email. Masukkan alamat email anda di bawah ini dan Submit.</p>
             	<div class="search_box"> 		    		 	
					<form>
						<input type="text" class="textbox" value="Subscribe email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subscribe email';}">
						<input type="submit" value="">
					</form>
				</div>
		 	</div>
			<div class="col_1_of_2 span_1_of_2">
				<div class="social_icons">
					<ul>
				    	<li><a class="rss" href="#"></a> </li>
				     	<li><a class="dribble" href="#"></a> </li>
				    	<li><a class="twitter" href="https://twitter.com/vpnku.net" target="_blank"> </a> </li>
				      	<li><a class="facebook" href="https://www.facebook.com/vpnku.net" target="_blank"> </a> </li>
				     	<div class="clear"></div>
				 	</ul>
				</div>
			</div>
         	<div>
            	<img src="./images/bb.jpg" style="border-style:solid; border: #F00 medium solid;" />
         	</div>   
     	</div>
   	</div>		
	</div> 
<?php
	include_once 'footer.php';
?>