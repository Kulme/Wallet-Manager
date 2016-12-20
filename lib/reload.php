<?php require_once 'config.php'; require_once 'info.php'; ?>
<?php if($bitcoin->error){ echo "<p class='lead bg-warning'><strong>There was a problem while connecting to your $config[coin_name] Daemon.<br>$config[coin_name] response message: " . $bitcoin->error . "<br><br>Please fix and try again.</strong></p>"; } else { ?>
<p class="lead"><strong>Main Address: <?php echo $main_address; ?></strong></p>
<p class="lead"><strong>Balance: <?php echo $wallet_info['balance']; ?> <?php echo $config['coin_symbol']; ?><?php if ($config['show_fiat'] === true) { $bitcoin_fiat = file_get_contents($price_url); echo " | ". $bitcoin_fiat; } ?></strong></p>
<p class="lead"><strong>Unconfirmed Balance: <?php echo $wallet_info['unconfirmed_balance']; ?> <?php echo $config['coin_symbol']; ?></strong></p>
<p class="lead"><strong>Total Transactions: <?php echo $wallet_info['txcount']; ?></strong></p>
<p class="lead"><strong>Connections: <?php echo $total_connection; ?></strong></p>
<p class="lead"><strong>Total Transactions in Memory Pool: <?php echo $mempool_total['size']; ?></strong></p>
<p class="lead"><strong>Blocks Height: <?php echo $blockchain_info['blocks']; ?></strong></p>
<p class="lead"><strong>Blockchain Height: <?php echo $blockchain_info['headers']; ?></strong></p>
<p class="lead"><strong>Network Sent: <?php echo convert_byte($byte_recv_sent_info['totalbytessent']); ?></strong></p>
<p class="lead"><strong>Network Received: <?php echo convert_byte($byte_recv_sent_info['totalbytesrecv']); ?></strong></p>
<?php } ?>