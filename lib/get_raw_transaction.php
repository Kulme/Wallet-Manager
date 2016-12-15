<?php
	
	include_once 'config.php';
	include_once 'btc.php';
	$bitcoin = new Bitcoin($config['rpc_user'], $config['rpc_pass'], $config['rpc_host'], $config['rpc_port']);
	
	if ($config['rpc_ssl'] === true) {
		$bitcoin->setSSL($config['rpc_ssl_ca']);
	}
	
	$get_raw_transaction = $_GET['txid'];
	
	$result_raw_transaction = $bitcoin->getrawtransaction($get_raw_transaction);
	
	if($bitcoin->error){
		echo "<p class='lead bg-danger'><strong><u>ERROR!</u><br>" . $bitcoin->error . "</strong></p>";
	} else {
	echo "<textarea id='result' class='form-control' rows='12' readonly>$result_raw_transaction</textarea>";
	echo "<button type='button' class='btn btn-primary btn-lg btn-block' data-clipboard-action='copy' data-clipboard-target='#result'>Copy To Clipboard</button>";
	}