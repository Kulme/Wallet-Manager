<?php

$config = array(
  // RPC Bitcoind
  'rpc_user'                  => 'rpcuser',
  'rpc_pass'                  => 'rpcpass',
  'rpc_host'                  => 'localhost',
  'rpc_port'                  => '8332',
  'rpc_ssl'                   => false,
  'rpc_ssl_ca'                => null,
  
  // Site info. I only use this for Bitcoin Wallet anyway
  'site_title'                => 'My Wallet Manager',
  'site_name'                 => 'My Wallet',
  'coin_name'                 => 'Bitcoin',
  'coin_symbol'               => 'BTC',
  
  // Link to Github author on footer
  'show_github'               => true,

  // show your balance to fiat. this only for BTC wallet. more info http://codacoin.com/api.php
  'show_fiat'                 => true,
  'fiat_type'                 => 'USD',
);