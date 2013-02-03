<?php
include('yakimbi.php');

$db = new Yakimbi();
$db->connectToDatabase();
$db->selectDatabase();

$content = '';

 if(isset($_POST['mode']))
 {
 	 $mode = $_POST['mode'];
 	 
 	 if($mode == 'add_fav')
 	 {
 	 	$val = $_POST['id'];
 	 	$title = $_POST['title'];
 	 	$data = explode('-', $val);
 	 	
 	 	$image_server =  $data[0];
 	 	$image_id =  $data[1];
 	 	$image_secret =  $data[2];
 	 	
 	 	$process = $db->insert_favourite($image_server,$image_id,$image_secret);
 	 	if($process)
 	 	{
 	 		$content = '<a href="javascript:" title="Remove from your favourite" class="remove_favorite" id="'.$val.'" rel="'.$title.'" onclick="remove_favorite(this);">
							<img src="images/fav.png" alt="Fav"/>
					    </a>';
 	 	}
 	 	else 
 	 	{
 	 		$content = '<a href="javascript:" title="Add this to your favourite" class="add_favorite" id="'.$val.'" rel="'.$title.'" onclick="add_favorite(this);">
							<img src="images/default_fav.png" alt="Add to Fav"/>
			            </a>';
 	 	}
 	 	
 	 	echo $content;
 	 	
 	 }
 	 
 	 
 	 if($mode == 'remove_fav')
 	 {
 	 	$val = $_POST['id'];
 	 	$title = $_POST['title'];
 	 	$data = explode('-', $val);
 	 
 	 	$image_server =  $data[0];
 	 	$image_id =  $data[1];
 	 	$image_secret =  $data[2];
 	 
 	 	$process = $db->remove_favourite($image_server,$image_id,$image_secret);
 	 	if($process)
 	 	{
 	 		$content = '<a href="javascript:" title="Add this to your favourite" class="add_favorite" id="'.$val.'" rel="'.$title.'" onclick="add_favorite(this);">
							<img src="images/default_fav.png" alt="Add to Fav"/>
			            </a>';
 	 	}
 	 	else
 	 	{
 	 		$content = '<a href="javascript:" title="Remove from your favourite" class="remove_favorite" id="'.$val.'" rel="'.$title.'" onclick="remove_favorite(this);">
							<img src="images/fav.png" alt="Fav"/>
					    </a>';
 	 	}
 	 
 	 	echo $content;
 	 
 	 }
 	 
 	 if($mode == 'remove_my_fav')
 	 {
 	 	$id = $_POST['id'];
 	 	$process = $db->remove_my_favourite($id);
 	 	if($process)
 	 	{
 	 		return true;
 	 	}
 	 	else
 	 	{
 	 		return false;
 	 	}
 	 
 	 }
 	 
 	 
 	 if($mode == 'add_desc')
 	 {
 	 	$id = $_POST['id'];
 	 	$text = $db->get_text($id);
 	 	$process = '<textarea name="text_'.$id.'" id="text_'.$id.'">'.$text.'</textarea>
 	 			    <input type="hidden" name="favid_'.$id.'" id="favid_'.$id.'" value="'.$id.'"/>
 	 			    <input type="button" name="btn_'.$id.'" onclick="save_desc(\''.$id.'\');" value="Save"></button>';
 	 	echo $process;
 	 
 	 }
 	 
 	 if($mode == 'save_desc')
 	 {
 	 	$id = $_POST['id'];
 	 	$text = $_POST['text'];
 	 	$process = $db->add_description($text,$id);
 	 
 	 }
 	 
 	 
 
 }
 
 