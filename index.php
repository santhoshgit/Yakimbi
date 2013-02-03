<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    	<title>Yakimbi</title>
    	<link rel="stylesheet" type="text/css" href="css/main.css"/>
    	<link rel="stylesheet" type="text/css" href="css/fancybox.css?v=2.1.4" media="screen" />
    </head>
	<body>
	  
	   <h1>YAKIMBI</h1>
	   <h2>All Photos</h2>
	   <div class="but"><a href="index.php" class="linkit">View all Photos</a><a href="favourite.php" class="linkit">My Favorite</a></div>
	
		<div id="wrapper">
		
		<?php
			include('yakimbi.php');
			
			$db = new Yakimbi();
			$db->connectToDatabase();
			$db->selectDatabase();
			
			include('lib/flickr_api.php');	
		
			$flickr = new Flickr();
			$photos = $flickr->peopleGetPublicPhotos('69148745@N02');
			
			$photo_list = $photos['photos'];
			shuffle($photo_list);
			$mylist=  array_slice($photo_list,0,20);
			//print_r($mylist);
			echo '<div id="columns">';
			
			foreach($mylist as $photo) 
			{
				//print_r($photo);
				
				$url = $flickr->getPhotoURL($photo); 
				$link_url = $flickr->getPhotoURL($photo,'b');
				
				$desc = $photo['title'];
				$server   = $photo['server'];
				$id   = $photo['id'];
				$secret   = $photo['secret'];
				$photo = $server.'-'.$id.'-'.$secret;
				
				echo '<div class="pin">
					        <a href="'.$link_url.'" class="fancybox"><img src="'.$url.'" width="150" height="150"/></a>
					        <p>'.substr($desc,0,15).'</p>
							<p id="id_'.$photo.'">'.$db->get_fav_link($server,$id,$secret,$desc).'</p>
					   </div>';
			}
			echo '</div>';
		
		?>
		</div>
	</body>	
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="js/common.js"></script>
