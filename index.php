<?php

function initialize_db()
{
	$link = mysqli_connect("127.0.0.1", "root", "root");
	if($link)
	{
		if($link->select_db("test") === false)
		{
			if($link->query("CREATE DATABASE test DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci") === true)
			{
				$link->select_db("test");
				$link->query("CREATE TABLE `accounts` (`id` int(11) NOT NULL,`name` varchar(255) NOT NULL,`amount` double NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1");
				$link->query("INSERT INTO `accounts` (`id`, `name`, `amount`) VALUES(0, 'pucara_1', 1000),(1, 'pucara_2', 0)");
			}
			else die("Could not create database: " . $link->error);
		}
		$link->close();
	}
	else
	{
		die("Please set the correct username and password for the database.");
	}
}

session_start();
initialize_db();
$result = null;
if(!isset($_SESSION['msg'])) $_SESSION['msg'] = "";
if($link = mysqli_connect("127.0.0.1", "root", "root", "test"))
{
	$result = mysqli_query($link,"SELECT * from accounts");
	$link->close();
}
?>

<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Pucara Information Security</title>	

		<meta name="keywords" content="security, pentest, research, red team, infosec, it, technology, threat, hacker, hackers, vulnerabilities, exploit, zero day, 0 day, consulting, pentesting" />
		<meta name="description" content="Offer Cybersecurity Consulting and Integrated Information Security : made up of hackers, advisors, who all share the same passion.">
		<meta name="author" content="Pucara Information Security">

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
		<link rel="manifest" href="site.webmanifest">
		<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#0b1d37">
		<meta name="theme-color" content="#ffffff">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.min.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">
		
		<link rel="stylesheet" href="css/digital/digital-agency-2-dark.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/skin-digital-agency-2.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	</head>
<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': false, 'stickyStartAt': 1, 'stickyHeaderContainerHeight': 100}">
				<div class="header-body border-top-0 bg-color-dark box-shadow-none">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column header-column-logo">
								<div class="header-row">
									<div class="header-logo">
										<a href="index.html">
											<img alt="Pucara Information Security" width="232" height="80" src="img/logos/logo_dark.png">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column header-column-nav-menu justify-content-end w-100">
								<div class="header-row">
									<div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown-primary">
														<a class="nav-link text-capitalize font-weight-semibold custom-text-3" href="#">
															Home
														</a>
													</li>
													<li class="dropdown-primary">
														<a class="nav-link text-capitalize font-weight-semibold custom-text-3 active" href="#">
															Accounts
														</a>
													</li>
													<li class="dropdown-primary">
														<a class="nav-link text-capitalize font-weight-semibold custom-text-3" href="#">
															My Orders
														</a>
													</li>
													<li class="dropdown-primary">
														<a class="nav-link text-capitalize font-weight-semibold custom-text-3" href="#">
															Customer Service
														</a>
													</li>
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
					</div>
				</div>
			</header>
				<section class="page-header page-header-modern page-header-background bg-color-dark p-relative z-index-1" data-plugin-lazyload data-original="img/digital/digital-agency-2/bg/page-header-bg-dark.jpg">
					<span class="custom-circle custom-circle-1 bg-color-light custom-circle-blur " data-="fadeInLeftShorter" data--delay="400"></span>
					<span class="custom-circle custom-circle-2 bg-color-primary " data-="zoomIn" data--delay="500"></span>
					<span class="custom-circle custom-circle-3 bg-color-primary " data-="zoomIn" data--delay="600"></span>
					<div class="container">
					<style>
					table {
					  border-collapse: collapse;
					}

					table, th, td {
					  height: 50px;
					  vertical-align: center;
					  padding-left:10px;
					  border: 3px solid white;
					}

					td {
					  height: 50px;
					  vertical-align: center;
					  padding-left:10px;
					}
					</style>
					<center><h1  class="custom-text-10 font-weight-bolder">Pucara's First Vulnerable Bank of Hackers</h1></center>
						<div class="row mt-5">
							<div class="col">
								<ul class="breadcrumb breadcrumb-light custom-title-with-icon-primary d-block">
									<li><a href="#">Home Banking</a></li>
									<li class="active">Accounts</li>
								</ul>
								<table style="width:100%;">
								  <tr>
								    <th style="color:#fa4759">Account ID</th>
								    <th style="color:#fa4759">Account Name</th> 
								    <th style="color:#fa4759">Balance</th>
								    <th style="color:#fa4759">Transfer</th>
								  </tr>
								  <?php while($obj = $result->fetch_assoc()){?>
								  <tr>
								    <td><?php echo(htmlspecialchars($obj['id'], ENT_QUOTES));?></td>
								    <td><?php echo(htmlspecialchars($obj['name'], ENT_QUOTES));?></td> 
								    <td><?php echo(htmlspecialchars($obj['amount'], ENT_QUOTES));?></td>
								    <td>
								    <form action="transfer.php" method="POST" enctype="multipart/form-data" style="margin-right:0px;margin:0px; padding:0px; display:inline;">
								    <input type="text" value="0" style="width:60px;margin-right:0px" name="amount">
								    <input type="hidden" value="<?php echo(($obj['id'] == 0) ? 0 : 1)?>" name="from">
								    <input type="hidden" value="<?php echo(($obj['id'] == 0) ? 1 : 0)?>" name="to">
								    <input type="submit" value="Transfer" style="margin-right:0px;margin:0px; padding:0px; display:inline;">
								    </form>
								    </td>
								  </tr>
								  <?php } 
								  $result->close();
								  ?>
								</table>
							</div>
						</div><hr>
						<center><h1 class="custom-text-8 font-weight-bolder" style="color:#fa4759"><?php echo(htmlentities($_SESSION['msg']));$_SESSION['msg'] = "";?></h1></center>
					</div>
				</section>
</html>