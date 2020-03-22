<body>
<div class="preloader">
	<img src="img/loader.gif" alt="Preloader image">
</div>	
<nav class="navbar">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></a></li>
					<li><a href="#services"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '2'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></a></li>
					<li><a href="#team"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '3'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></a></li>
					<li><a href="#pricing"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '4'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></a></li>
					<?php if(isset($_SESSION['lo_log'])){echo '<li><a href="login.php"class="btn btn-blue">Bilgilerim</a></li>';}else{echo '<li><a href="#" data-toggle="modal" data-target="#sing_in1" class="btn btn-blue">Giriş Yap</a></li>';}?>
					
				</ul>
			</div>
		</div>
	</nav>