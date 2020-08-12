<?php
//$listid

$basic = 0;
    if($resmem['totquery']>0) {
	foreach($resmem as $valmem) {
 		if(!empty($valmem['memberid'])) {
			
	
	    $resCountry = $objlogic->get_Country($valmem['countryid']);
		
		
		if($valmem['cityid'] != 0){
		$resCit = $objlogic->getOnlyCity($valmem['countryid'],$valmem['cityid']);
		}
		
		if($valmem['locid'] != 0){
		$resLoc = $objlogic->getOnlyLoc($valmem['cityid'],$valmem['locid']);
		}
		
		
	if(!empty($valmem['spotlightimagesm'])) {
		
	  			$imgsrc =  $domainname.$FldMem.$valmem['memberid']."/".$valmem["spotlightimagesm"];
		       
	}elseif(!empty($valmem['mylogo'])) {
		
	  			$imgsrc =  $domainname.$FldMem.$valmem['memberid']."/".$valmem["mylogo"];
	}
	else {
		$imgsrc = $domainname."img/user1.png";
	}		



	
	if($valmem["iscompany"] == 1){
		
		$iscompany = "Y";
		//$memurl = $domainname.'memberview_'.$objlogic->MakeSEOURL($valmem["companyname"]).'_'.$valmem['memberid'].'.html';	
		
		$memurl = $domainname.$objlogic->MakeSEOURL($valmem["companyname"]).'/memid'.$valmem['memberid'];
		
		
		$una = $valmem["companyname"];

		
	}else{
	
	 $resCompany = $objlogic->get_Members($valmem['parentid']);
	 $companyurl = $domainname.$objlogic->MakeSEOURL($resCompany[0]["companyname"]).'/memid'.$resCompany[0]['memberid'];		
	 $memurl = $domainname.$objlogic->MakeSEOURL($valmem["name"]).'/memid'.$valmem['memberid'];
	 $una = $valmem["name"];
	
	}
	
	
	
	$resCountry = $objlogic->get_Country($valmem['countryid']);
	
	
			if($valmem["planid"] == 3){
				$ribbon = "gold";
				$membership = "Platinum Member";
			}elseif($valmem["planid"] == 2){
				$ribbon = "silver";
				$membership = "Diamond Member";
			}else{
				$ribbon = "bronze";
				$membership = "Gold Member";
			}
			
	
	//$memurl = $domainname.'dealers_'.$objlogic->MakeSEOURL($una).'_'.$valmem['id'].'.html';
	
	$basic++;
	
	
	
	

	

?>


  <div class="portfolio-item bollywood col-md-4 col-sm-6 col-xs-6">
    <div class="thumbnail">
    
      
      <div class="ribbon <?php echo $ribbon; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $membership; ?>"><span class="i-<?php echo $ribbon; ?>"></span></div>
      <a href="<?php echo $memurl; ?>" class="profile-pic"><img src="<?php echo $imgsrc; ?>" class="img-responsive img-thumbnail" alt="..."></a>
      
      <div class="caption">
        
        <h3 style="font-size:1.2em;"><a href="<?php echo $memurl; ?>"><?php echo $una; ?></a></h3>
        
       
         <p class="i-location"><?php echo strtoupper($resCountry[0]["country"]); if($valmem['cityid'] != 0){ echo " - ".strtoupper($resCit[0]["city"]); } if($valmem['locid'] != 0){ echo " - ".strtoupper($resLoc[0]["location"]); }?> </p>

         <p style="font-size:1em; text-transform:none; letter-spacing:normal; color:#666666;"><?php echo substr(strip_tags($valmem['aboutmem']),0,182); ?> ...</p>
         
         <p class="i-inr price"><a href="<?php echo $memurl; ?>" class="btn btn-luxury" style="padding: 8px !important;"><span>View More</span></a></p> 
                
                
      </div>
      
      
    </div>
  </div>
  
  <?php
          
		  
		   }
        }
	}
   ?> 
  
  
