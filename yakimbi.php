<?php

/**
 * DB Connection File
 */

class Yakimbi 
{
    var $host="localhost";
    var $username="root";    
    var $password="";
    var $database="gallery";
    var $myconn;
    var $myip; 
    
    function __construct()
    {
    	$this->myip = $_SERVER["REMOTE_ADDR"];
    }

    function connectToDatabase() 
    {

        $conn= mysql_connect($this->host,$this->username,$this->password);
        if(!$conn)
        {
            die ("Cannot connect to the database");
        }

        else
        {
            $this->myconn = $conn;
        }

        return $this->myconn;

    }

    function selectDatabase()
    {
        mysql_select_db($this->database);  

        if(mysql_error()) 
        {
            echo "Cannot find the database ".$this->database;
        }
    }

    function closeConnection() 
    {
        mysql_close($this->myconn);
    }
    
    
    function insert_favourite($image_server,$image_id,$image_secret)
    {
    	$sql = 'INSERT INTO favorite (favorite_image_id,favorite_image_server,favorite_image_secret,favorite_user_ip) VALUES ("'.$image_id.'","'.$image_server.'","'.$image_secret.'","'.$this->myip.'")';
    	$res = mysql_query($sql);
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    	
    }
    
    
    function remove_favourite($image_server,$image_id,$image_secret)
    {
    	$sql = 'DELETE FROM favorite WHERE favorite_image_id = "'.$image_id.'" AND favorite_user_ip = "'.$this->myip.'"';
    	$res = mysql_query($sql);
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    	
    }
    
    function get_fav_link($image_server,$image_id,$image_secret,$desc)
    {
    	$list = array();
    	$content = '';
    	$photo = $image_server.'-'.$image_id.'-'.$image_secret;
    	$sql = 'SELECT favorite_image_id FROM favorite WHERE favorite_user_ip = "'.$this->myip.'"';
    	$res = mysql_query($sql);
    	while($fav_list = mysql_fetch_array($res)){ $list[] .= $fav_list['favorite_image_id']; }
    	$check = in_array($image_id, $list);
    	if($check)
    	{
    		$content = '<a href="javascript:" title="Remove from your favourite" class="remove_favorite" id="'.$photo.'" rel="'.$desc.'" onclick="remove_favorite(this);">
							<img src="images/fav.png" alt="Fav" />
					    </a>';
    	}
    	else 
    	{
    		$content = '<a href="javascript:" title="Add this to your favourite" class="add_favorite" id="'.$photo.'" rel="'.$desc.'" onclick="add_favorite(this);">
							<img src="images/default_fav.png" alt="Add to Fav" />
			            </a>';
    	}
    	
    	return $content;
    	 
    }
    
    function get_my_fav_link($image_server,$image_id,$image_secret,$desc)
    {
    	$list = array();
    	$content = '';
    	$photo = $image_server.'-'.$image_id.'-'.$image_secret;
    	$sql = 'SELECT favorite_image_id FROM favorite WHERE favorite_user_ip = "'.$this->myip.'"';
    	$res = mysql_query($sql);
    	while($fav_list = mysql_fetch_array($res)){ $list[] .= $fav_list['favorite_image_id']; }
    	$check = in_array($image_id, $list);
    	if($check)
    	{
    		$content = '<a href="javascript:" title="Remove from your favourite" class="remove_favorite" id="'.$photo.'" rel="'.$desc.'" onclick="remove_favorite_complete(this);">
							<img src="images/fav.png" alt="Fav" />
					    </a>';
    	}
    	else 
    	{
    		$content = '<a href="javascript:" title="Add this to your favourite" class="add_favorite" id="'.$photo.'" rel="'.$desc.'" onclick="add_favorite(this);">
							<img src="images/default_fav.png" alt="Add to Fav" />
			            </a>';
    	}
    	
    	return $content;
    	 
    }
    
    
    function get_favorite()
    {
    	$list = array();
    	$content = '';
    	$sql = 'SELECT favorite_id,favorite_image_id,favorite_image_server,favorite_image_secret,favorite_image_title FROM favorite WHERE favorite_user_ip = "'.$this->myip.'"';
    	$res = mysql_query($sql);
    	while($fav_list = mysql_fetch_array($res))
    	{ 
    		$list[] .= array_push($list, array('id' => $fav_list['favorite_image_id'],'secret' => $fav_list['favorite_image_secret'],'server' =>  $fav_list['favorite_image_server'],'title' =>  $fav_list['favorite_image_title'],'fav_id' =>  $fav_list['favorite_id']));
    	}
    	return $list;
    }
    
    function remove_my_favourite($id)
    {
    	$sql = 'DELETE FROM favorite WHERE favorite_id = "'.$id.'"';
    	$res = mysql_query($sql);
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    
    function add_description($text,$id)
    {
    	$sql = 'UPDATE favorite SET favorite_image_title = "'.$text.'" WHERE  favorite_id = "'.$id.'"';
    	$res = mysql_query($sql);
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    
    function get_text($id)
    {
    	$text = '';
    	$sql = 'SELECT favorite_image_title FROM favorite WHERE favorite_id = "'.$id.'"';
    	$res = mysql_query($sql);
    	$result = mysql_fetch_array($res);
		$text = $result['favorite_image_title']; 
    	return $text;
    }
    

}

?>