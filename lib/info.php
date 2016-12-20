<?php
	
	include_once 'config.php';
	include_once 'btc.php';
	$bitcoin = new Bitcoin($config['rpc_user'], $config['rpc_pass'], $config['rpc_host'], $config['rpc_port']);
	
	if ($config['rpc_ssl'] === true) {
		$bitcoin->setSSL($config['rpc_ssl_ca']);
	}
	
	$main_address = $bitcoin->getaccountaddress('');
	
	$wallet_info = $bitcoin->getwalletinfo();
	
	$total_connection = $bitcoin->getconnectioncount();
	
	$mempool_total = $bitcoin->getmempoolinfo();
	
	$blockchain_info = $bitcoin->getblockchaininfo();
	
	$byte_recv_sent_info = $bitcoin->getnettotals();

	function convert_byte($size){
		$base = log($size) / log(1024);
		$suffix = array("Bytes", "KB", "MB", "GB", "TB");
		$f_base = floor($base);
		return round(pow(1024, $base - floor($base)), 1) . " " . $suffix[$f_base];
	}
	
	$btc_amount = $wallet_info['balance'];
	$fiat_type = $config['fiat_type'];
	$price_url = "http://codacoin.com/api/public.php?request=convert&type=btctofiat&input=$btc_amount&symbol=enabled&decimal=2&exchange=average&currency=$fiat_type&denom=bitcoin";