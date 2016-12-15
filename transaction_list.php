<?php require_once './lib/config.php'; require_once './lib/transaction_list.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Kulme Wallet Manager">
	<meta name="author" content="Kulme">
	<link rel="icon" href="./favicon.ico">
	<title><?php echo $config['site_title']; ?> | Transaction List</title>
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/style.css" rel="stylesheet">
	<script src="./js/clipboard.min.js"></script>
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/ie10-viewport-bug-workaround.js"></script>
</head>

<body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./transaction_list.php">Transactions List <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./memory_pool.php">Memory Pool</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./send_coins.php">Send Coins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./dump_private_key.php">Dump Private Key</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./get_raw_transaction.php">Get Raw Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./broadcast_transaction.php">Broadcast Transaction</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo $config['site_name']; ?></h3>
      </div>

		<h1 class="display-1">Transactions List</h1>
		<p class="borderspace"></p>
		<p class="lead"><strong>Last Transactions</strong></p>
		<?php if($bitcoin->error){ echo "<p class='lead bg-warning'><strong>It seems error with the Bitcoin Daemon.<br>Bitcoin response message: " . $bitcoin->error . "<br><br>Please fix and try again.</strong></p>"; } else { ?>
	</div>
	<div class="tx">
	<table class="table table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<th class="col-xs-1">Time</th>
				<th class="col-xs-1">Type</th>
				<th class="col-xs-3">Address</th>
				<th class="col-xs-1">Amount</th>
				<th class="col-xs-1">Confirmations</th>
				<th class="col-xs-5">Transaction ID</th>
			</tr>
		</thead>
	<tbody>
		<?php foreach($transaction_list as $list) {?>
		<tr>
		<td class="col-xs-1"><?php $times = $list['time']; echo date('d/m/Y', $times); ?></td>
		<td class="col-xs-1"><?php echo $list['category']; ?></td>
		<td class="col-xs-3"><?php echo $list['address']; ?></td>
		<td class="col-xs-1"><?php echo $list['amount']; ?></td>
		<td class="col-xs-1"><?php echo $list['confirmations']; ?></td>
		<td class="col-xs-5"><a href="https://blockchain.info/tx/<?php echo $list['txid']; ?>" target="_blank"><?php echo $list['txid']; ?></a></td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
	<?php } ?>
	</div>

	<div class="container">
      <footer class="footer">
        <p>&copy; <?php echo $config['site_name']; ?> 2016 <?php if ($config['show_github'] === true) { echo "| <a href='https://github.com/Kulme/Wallet-Manager' target='_blank' class='text-primary'>Wallet Manager</a>"; } ?></p>
      </footer>
	</div>

</body>
</html>