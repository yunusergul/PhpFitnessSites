<?php   
$yorsa=0;		
$queryuyy = $db->query("SELECT * FROM yorumlar", PDO::FETCH_ASSOC);
			if ( $queryuyy->rowCount() ){
				foreach( $queryuyy as $rowuyy ){
					if($rowuyy['ad_co']==0){
						$yorsa++;
					}
				}
			}
	?>