<?php  include'fuctions/config.php'; include'pages/header.php'; include 'pages/nav_menu.php'; ?>
	<header class="tep" id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '10'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h3>
							<h1 class="white typed"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '11'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-4">
					<div class="intro-table intro-table-first">
						<h5 class="white heading">Günlük Program</h5>
						<div class="owl-carousel owl-schedule bottom">		
		<?php	
			$i=0;
			$query = $db->query("SELECT * FROM gunun_pro", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				foreach( $query as $row ){
					
					if($i==0){print "<div class='item'>";}
					print "	
						<div class='schedule-row row'>
							<div class='col-xs-6'>
								<h5 class='regular white'>".$row['egzersiz']."</h5>
							</div>
							<div class='col-xs-6 text-right'>
								<h5 class='white'>".$row['bas_saat']." - ".$row['son_saat']."</h5>
							</div>
						</div>";
					$i++;
					if($i==3){print "</div>"; $i=0;}
					
				}if($i!=0){print "</div>";}
			}
				
		?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Kampanya</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular">Deneme Üyeliğini</h4>
							<h4 class="white heading small-pt">Hemen Başlat</h4>
							<a href="#" data-toggle="modal" data-target="#modal1"  class="btn btn-white-fill expand">Başvur</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-table intro-table-third">
						<h5 class="white heading">Müşteri Yorumları</h5>
						<div class="owl-testimonials bottom">
<?php		
			$query = $db->query("SELECT * FROM yorumlar order by id desc", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				$say=0;
				foreach( $query as $row ){
					
					if($say<=2){
						
						if($row['gg_gm']==1){
									$querytt = $db->query("SELECT * FROM log_uye WHERE kullaniciadi = '".$row['kullanici-adi']."'")->fetch(PDO::FETCH_ASSOC);if ( $querytt ){ 
							
							print "<div class='item'>
										<h4 class='white heading content'>".$row['yorum']."</h4>
										<h5 class='white heading light author'>".ucwords($querytt['adi_soy'])."</h5>
										</div>"; $say++;
						}}
					}
					
	
				}
			}
?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '2'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h2>
				<h4 class="light muted"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '12'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h4>
			</div>
			<div class="row services">
<?php		
			$query = $db->query("SELECT * FROM hizmetler", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				foreach( $query as $row ){
					if($row['gg_gm']==0){}else{
					print "<div class='col-md-4'>
					<div class='service'>
						<div class='icon-holder'>
							<img src='".$row['ikonu']."' alt='' class='icon'>
						</div>
						<h4 class='heading'>".$row['cesit']."</h4>
						<p class='description'>".$row['aciklamasi']."</p>
					</div>
				</div>
					";}
				}
			}	
		?>
		</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '3'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h2>
				<h4 class="light muted"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '13'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h4>
			</div>
			<div class="row">		
		<?php		
			$query = $db->query("SELECT * FROM egitmenler", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				foreach( $query as $row ){
					if($row['gg_gm']==0){}else{
					print "	
					<div class='col-md-4'>
					<div class='team text-center'>
						<div class='cover' style= \" background:url('".$row['ant_url']."'); background-size:cover; \">
							<div class='overlay text-center'>
								<h3 class='white'>".$row['fiyat']." ₺</h3>
								<h5 class='light light-white'>".$row['seans_say']." Seans/Ay</h5>
							</div>
						</div>
						<img src='".$row['res_url']."' width=\"120px\" height=\"120px\" alt='Image' class='avatar'>
						<div class='title'>
							<h4>".$row['isim']."</h4>
							<h5 class='muted regular'>".$row['uzmanlik']."</h5>
						</div>
						
					</div>
				</div>";
				}}
			}
				
		?>
			</div>
		</div>
	</section>
	<section id="pricing" class="section">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top white"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '4'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h2>
				<h4 class="light white"><?php $query = $db->query("SELECT * FROM icer_e WHERE id = '14'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?></h4>
			</div>
			<div class="row no-margin">
				<div class="col-md-7 no-padding col-md-offset-5 pricings text-center">
					<?php	
			$query = $db->query("SELECT * FROM paket_fiyat", PDO::FETCH_ASSOC);
			if ( $query->rowCount() ){
				foreach( $query as $row ){
					$activex=$row['actv'];
					if($activex==1){$active='active';}
					else{$active='';}
					if($row['zaman']==1){$zaman="Ay";}else{$zaman="Yıl";}
					print "	
					<div class='pricing'>
						<div class='box-main $active ' data-img='".$row['res_re']."'>
							<h4 class='white'>".$row['aciklama']."</h4>
							<h4 class='white regular light'>".$row['fiyat']."₺ <span class='small-font'>/ $zaman</span></h4>
							<i class='info-icon icon_question'></i>
						</div>
						<div class='box-second $active '>
							<ul class='white-list text-left'>
								".$row['icerik']."
							</ul>
						</div>
					</div>";
					$i=1;
				}
			}
?>		
				</div>
			</div>
		</div>
	</section>
<?php include 'pages/twitter.php'; include 'pages/pop_up_menu.php'; include 'pages/under_nav.php'; include 'pages/footer.php'; ?>