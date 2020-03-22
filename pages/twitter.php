<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">		
		<?php							
			$querytw = $db->query("SELECT * FROM tw_tk order by id desc", PDO::FETCH_ASSOC);
			if ( $querytw->rowCount() ){
				$say=0;
				foreach( $querytw as $rowtw ){
					if($say<3){
						$say++;
					print "	<div class=\"item text-center\">
							<i class=\"icon fa fa-twitter\"></i>
							<h4 class=\"white light\">".$rowtw['twt']."</h4>
							<h4 class=\"light-white light\">".$rowtw['twt_tk']."</h4></div>";}}}?>			
					</div>
				</div>
			</div>
		</div>
	</section>