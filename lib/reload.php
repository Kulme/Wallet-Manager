<?php require_once 'config.php'; require_once 'info.php'; ?>
<?php if($bitcoin->error){ echo "<p class='lead bg-warning'><strong>It seems error with the Bitcoin Daemon.<br>Bitcoin response message: " . $bitcoin->error . "<br><br>Please fix and try again.</strong></p>"; } else { ?>
<p class="lead"><strong>Main Address: <?php echo $main_address; ?></strong></p>
<p class="lead"><strong>Balance: <?php echo $wallet_info['balance']; ?> <?php echo $config['coin_symbol']; ?><?php if ($config['show_fiat'] === true) { $bitcoin_fiat = file_get_contents($price_url); echo " | ". $bitcoin_fiat; } ?></strong></p>
<p class="lead"><strong>Unconfirmed Balance: <?php echo $wallet_info['unconfirmed_balance']; ?> <?php echo $config['coin_symbol']; ?></strong></p>
<p class="lead"><strong>Connections: <?php echo $info['connections']; ?></strong></p>
<p class="lead"><strong>Current Transactions in Mempool: <?php echo $mempool_info['size']; ?></strong></p>
<p class="lead"><strong>Blocks Height: <?php echo $info['blocks']; ?></strong></p>
<p class="lead"><strong>Blockchain Height: <?php echo $blockchain_info['blocks']; ?></strong></p>
<?php } ?>