<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    	<title>Yakimbi</title>
    	<link rel="stylesheet" type="text/css" href="css/main.css"/>
    	<link rel="stylesheet" type="text/css" href="css/fancybox.css?v=2.1.4" media="screen" />
    </head>
	<body>
	  
	   <h1>YAKIMBI</h1>
	   <h2>My Favorite</h2>
	   <div class="but"><a href="index.php" class="linkit">View all Photos</a><a href="favourite.php" class="linkit">My Favorite</a></div>
	
		<div id="wrapper">
		
		<?php
			include('yakimbi.php');
			
			$db = new Yakimbi();
			$db->connectToDatabase();
			$db->selectDatabase();
			
			include('lib/flickr_api.php');	
		
			$flickr = new Flickr();
			$my_fav = $db->get_favorite();

			echo '<div id="columns">';
			foreach($my_fav as $photo) 
			{
				//print_r($photo);
				if(is_array($photo))
				{
					$url = $flickr->getPhotoURL($photo); 
					$link_url = $flickr->getPhotoURL($photo,'b');
					
					$desc = $photo['title'];
					$server   = $photo['server'];
					$id   = $photo['id'];
					$secret   = $photo['secret'];
					$fav_id   = $photo['fav_id'];
					$photo = $server.'-'.$id.'-'.$secret;
					
					echo '<div class="pin" id="photo_'.$fav_id.'">
						        <a href="'.$link_url.'" class="fancybox"><img src="'.$url.'" width="150" height="150"/></a>
						        <p id="desc_'.$fav_id.'">'.substr($desc,0,15).'</p>
								<p id="field_'.$fav_id.'">
								   <span id="del_'.$fav_id.'"><a href="javascript:" onclick="remove_favorite_complete(\''.$fav_id.'\');">Delete</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								   <span id="add_desc_'.$fav_id.'"><a href="javascript:" onclick="add_description(\''.$fav_id.'\');">Description</a></span>
						        </p>
							    <p id="desc_field_'.$fav_id.'">
									
								</p>
						   </div>';
				}
			}
			echo '</div>';
		
		?>
		</div>
	</body>	
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="js/common.js"></script>
