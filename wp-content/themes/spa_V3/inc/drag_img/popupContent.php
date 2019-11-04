<?php 
	$id = $_POST['ID'];
	$imgWidthFull = 5000;
	$imgheightFull = 5700;
	$query = "http://geminitee.com/background?q=".$id;
	$json_img_map = file_get_contents($query);
	$arr_img_map = json_decode($json_img_map, true);
	$data = $arr_img_map['data'][0];
	
	$img_select = $data['img_select'];
	$cord_file = $data['cord_file'];
	
?>

	<div id="color">
		Background Color : <a href="#" data-color="red">Red</a> | <a href="#" data-color="blue">Blue</a> | <a href="#" data-color="Yellow">Yellow</a> | <a href="#" data-color="Orange">Orange</a>
		 | <a href="#" data-color="Black">Black</a> | <a href="#" data-color="White">White</a>
	</div>
	<br />
	<?php 
		for($i=0; $i < count($cord_file)-1;$i++){
			$cord = $cord_file[$i]; 
	?>
<div class="cord_file" data-id="<?php echo $data["_id"]; ?>">
	<img class="_image_maps _image_bg" alt="" src="<?php echo $img_select; ?>" />
				
	<div class="wrap-khunghinh">
		<?php
			for($j=0; $j<count($cord);$j++){
				$left = (($cord[$j][0])*100)/$imgWidthFull;
				$top = (($cord[$j][1])*100)/$imgheightFull;
				$right = (($cord[$j][2])*100)/$imgWidthFull;
				$bottom = (($cord[$j][3])*100)/$imgheightFull;
				$width = $right - $left;
				$height = $bottom - $top;	
		?>		
		<div data-color="#000" data-coordinates="['<?php echo $cord[$j][0]; ?>','<?php echo $cord[$j][1]; ?>','<?php echo $cord[$j][2]; ?>','<?php echo $cord[$j][3]; ?>']" data-id="<?php echo $j; ?>" class="wrap-black" style="left:<?php echo $left; ?>%;top:<?php echo $top; ?>%;width:<?php echo $width; ?>%;height:<?php echo $height; ?>%;">
						
		</div>
		<?php } ?>
	</div>
</div>
	<?php } ?>
