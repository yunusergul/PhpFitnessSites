	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Deneme Derslerimize Katılın!</h3>
					<h5 class="light regular light-white">Tamamen Ücretsiz Derslerimize Katılın.</h5>
					<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue ripple trial-button">Hızlı Kayıt</a>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Çalışma Saatleri <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Hafta İçi</h5>
							<h3 class="regular white"><?php $query = $db->query("SELECT * FROM calisma_saat WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['bas_saat'];}?> - <?php $query = $db->query("SELECT * FROM calisma_saat WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['son_saat'];}?></h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Hafta Sonu</h5>
							<h3 class="regular white"><?php $query = $db->query("SELECT * FROM calisma_saat WHERE id = '2'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['bas_saat'];}?> - <?php $query = $db->query("SELECT * FROM calisma_saat WHERE id = '2'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['son_saat'];}?></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2017 All Rights Reserved. Powered by BBzen</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="<?php $query = $db->query("SELECT * FROM icer_e WHERE id = '5'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php $query = $db->query("SELECT * FROM icer_e WHERE id = '6'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php $query = $db->query("SELECT * FROM icer_e WHERE id = '7'")->fetch(PDO::FETCH_ASSOC);if ( $query ){echo $query['icc'];}?>"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>