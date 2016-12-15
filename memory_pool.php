<?php require_once './lib/config.php'; require_once './lib/info.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Kulme Wallet Manager">
	<meta name="author" content="Kulme">
	<link rel="icon" href="./favicon.ico">
	<title><?php echo $config['site_title']; ?> | Memory Pool</title>
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
              <a class="nav-link" href="./transaction_list.php">Transactions List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./memory_pool.php">Memory Pool <span class="sr-only">(current)</span></a>
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

      <div class="jumbotron">
		<h1 class="display-1">Memory Pool</h1>
		<p class="borderspace"></p>
		<p class="lead"><strong>Current Transaction in Memory Pool</strong></p>
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Transaction ID</th>
      </tr>
    </thead>
    <tbody>
<?php foreach($list_mempool as $list) {?>
        <td><a href="https://blockchain.info/tx/<?php echo $list; ?>" target="_blank"><?php echo $list; ?></a></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
      </div>

      <footer class="footer">
        <p>&copy; <?php echo $config['site_name']; ?> 2016 <?php if ($config['show_github'] === true) { echo "| <a href='https://github.com/Kulme/Wallet-Manager' target='_blank' class='text-primary'>Wallet Manager</a>"; } ?></p>
      </footer>

    </div>
</body>
</html>