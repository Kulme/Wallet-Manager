<?php
	
	include_once 'config.php';
	include_once 'btc.php';
	$bitcoin = new Bitcoin($config['rpc_user'], $config['rpc_pass'], $config['rpc_host'], $config['rpc_port']);
	
	if ($config['rpc_ssl'] === true) {
		$bitcoin->setSSL($config['rpc_ssl_ca']);
	}
	
	$address = $_GET['address'];
	
	$dump_private_key = $bitcoin->dumpprivkey($address);
	
	if($bitcoin->error){
		echo "<p class='lead bg-danger'><strong><u>ERROR!</u><br>" . $bitcoin->error . "</strong></p>";
	} else {
	echo "<p class='lead'><strong><u>Below is your $config[coin_name] address private key</u></strong></p>";
	echo "<span id='result' class='input-group-addon'><strong>$dump_private_key</strong></span>";
	echo "<button type='button' class='btn btn-primary btn-lg btn-block' data-clipboard-action='copy' data-clipboard-target='#result'>Copy To Clipboard</button>";
	}