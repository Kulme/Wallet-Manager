<?php
	
	include_once 'config.php';
	include_once 'btc.php';
	$bitcoin = new Bitcoin($config['rpc_user'], $config['rpc_pass'], $config['rpc_host'], $config['rpc_port']);
	
	if ($config['rpc_ssl'] === true) {
		$bitcoin->setSSL($config['rpc_ssl_ca']);
	}
	
	$address = $_GET['address'];
	$amount  = $_GET['amount'];
	
	$send_coin = $bitcoin->sendtoaddress($address, $amount);
	
	if($bitcoin->error){
		echo "<p class='lead bg-danger'><strong><u>ERROR!</u><br>" . $bitcoin->error . "</strong></p>";
	} else {
	echo "<p class='lead'><strong><u>Send $amount $config[coin_name] success!</u></strong></p>";
	echo "<span id='result' class='input-group-addon'><strong>$send_coin</strong></span>";
	echo "<button type='button' class='btn btn-primary btn-lg btn-block' data-clipboard-action='copy' data-clipboard-target='#result'>Copy To Clipboard</button>";
	}