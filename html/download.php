<?php
if(array_key_exists('os', $_GET)){
		$File = "counter.txt"; 
		$handle = fopen($File, 'r+') ; 
		$data = fread($handle, 512) ; 
		$count = $data + 1;
		fseek($handle, 0) ; 
		fwrite($handle, $count) ; 
		fclose($handle) ; 
		$os = filter_input(INPUT_GET, 'os', FILTER_SANITIZE_STRING);
		
		if($os == "winxp"){
			$file = '../vpnku_e.zip';
			if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
			}	
		}
		elseif($os == "winvista"){
			$file = '../vpnku_e.zip';
			if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
			}	
		}
		elseif($os == "win7"){
			$file = '../vpnku_e.zip';
			if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
			}	
		}
		elseif($os == "win8"){
			$file = '../vpnku_f.zip';
			if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
			}	
		}            	
	}
?>