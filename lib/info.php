<?php
	
	include_once 'config.php';
	include_once 'btc.php';
	$bitcoin = new Bitcoin($config['rpc_user'], $config['rpc_pass'], $config['rpc_host'], $config['rpc_port']);
	
	if ($config['rpc_ssl'] === true) {
		$bitcoin->setSSL($config['rpc_ssl_ca']);
	}
	
	$info = $bitcoin->getinfo();
	
	$main_address = $bitcoin->getaccountaddress('');
	
	$wallet_info = $bitcoin->getwalletinfo();
	
	$list_mempool = $bitcoin->getrawmempool();
	
	$mempool_info = $bitcoin->getmempoolinfo();
	
	$blockchain_info = $bitcoin->getblockchaininfo();
	
	$btc_amount = $wallet_info['balance'];
	$fiat_type = $config['fiat_type'];
	$price_url = "http://codacoin.com/api/public.php?request=convert&type=btctofiat&input=$btc_amount&symbol=enabled&decimal=2&exchange=average&currency=$fiat_type&denom=bitcoin";