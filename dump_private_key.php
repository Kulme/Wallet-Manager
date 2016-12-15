<?php require_once './lib/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Kulme Wallet Manager">
	<meta name="author" content="Kulme">
	<link rel="icon" href="./favicon.ico">
	<title><?php echo $config['site_title']; ?> | Dump Private Key</title>
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
              <a class="nav-link" href="./memory_pool.php">Memory Pool</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./send_coins.php">Send Coins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./dump_private_key.php">Dump Private Key <span class="sr-only">(current)</span></a>
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
		<h1 class="display-1">Private Key</h1>
		<p class="borderspace"></p>
		<p class="lead"><strong>Dump Address Private Key</strong></p>
	<form>
		<div class="form-group">
			<input id="coin_address" type="text" placeholder="<?php echo $config['coin_name']; ?> Address" class="form-control">
		</div>
			<p class="lead"><button type="button" class="btn btn-outline-primary" onclick="dump_key()">Dump Private Key</button></p>
	</form>
			<p id="result_key" class="lead"></p>
	</div>

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
function dump_key() {
  var xhttp = new XMLHttpRequest();
  addr = document.getElementById("coin_address").value;
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("result_key").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "./lib/dump_private_key.php?address="+addr, true);
  xhttp.send();
}
</script>

      <footer class="footer">
        <p>&copy; <?php echo $config['site_name']; ?> 2016 <?php if ($config['show_github'] === true) { echo "| <a href='https://github.com/Kulme/Wallet-Manager' target='_blank' class='text-primary'>Wallet Manager</a>"; } ?></p>
      </footer>

    </div>
</body>
</html>