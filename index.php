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
	<title><?php echo $config['site_title']; ?> | Home</title>
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
              <a class="nav-link active" href="./index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./transaction_list.php">Transactions List</a>
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
		<h1 class="display-1"><?php echo $config['coin_name']; ?> Status</h1>
		<p class="borderspace"></p>
		<div id="bitcoininfo">
		<?php if($bitcoin->error){ echo "<p class='lead bg-warning'><strong>It seems error with the Bitcoin Daemon.<br>Bitcoin response message: " . $bitcoin->error . "<br><br>Please fix and try again.</strong></p>"; } else { ?>
		<p class="lead"><strong>Main Address: <?php echo $main_address; ?></strong></p>
		<p class="lead"><strong>Balance: <?php echo $wallet_info['balance']; ?> <?php echo $config['coin_symbol']; ?><?php if ($config['show_fiat'] === true) { $bitcoin_fiat = file_get_contents($price_url); echo " | ". $bitcoin_fiat; } ?></strong></p>
		<p class="lead"><strong>Unconfirmed Balance: <?php echo $wallet_info['unconfirmed_balance']; ?> <?php echo $config['coin_symbol']; ?></strong></p>
		<p class="lead"><strong>Connections: <?php echo $info['connections']; ?></strong></p>
		<p class="lead"><strong>Blocks Height: <?php echo $blockchain_info['blocks']; ?></strong></p>
		<p class="lead"><strong>Blockchain Height: <?php echo $blockchain_info['headers']; ?></strong></p>
		</div>
		<p class="lead"><a class="btn btn-outline-primary" onclick="NewAddress()" role="button">Generate New Address</a></p>
		<p id="newaddress" class="lead"></p>
		<?php } ?>
	</div>

<script>
function coininfo(){
  $("#bitcoininfo").load("./lib/reload.php");
}
setInterval(function(){coininfo()}, 5000);
</script>

<script>
var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    console.log(e);
});

clipboard.on('error', function(e) {
    console.log(e);
});
</script>

<script>
function NewAddress() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("newaddress").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "lib/new_address.php", true);
  xhttp.send();
}
</script>

      <footer class="footer">
        <p>&copy; <?php echo $config['site_name']; ?> 2016 <?php if ($config['show_github'] === true) { echo "| <a href='https://github.com/Kulme/Wallet-Manager' target='_blank' class='text-primary'>Wallet Manager</a>"; } ?></p>
      </footer>

    </div>
</body>
</html>