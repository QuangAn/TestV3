 <?php
$txtSearch = $_POST['txt'];
$limit = $_POST['limit'];
$URL = 'http://geminitee.com';
$json_img_map = file_get_contents('http://geminitee.com/background?q='.$txtSearch.'&start=0&limit='.$limit);
$arr_img_map = json_decode($json_img_map, true);
$data = $arr_img_map['data'];
$total_record = count($data);

?>


<?php 
		if($total_record){
			for($i=0; $i<count($data);$i++){
				$url_bg = $data[$i]['img_select'];
				$cord_file = $data[$i]['cord_file'];

		?>
		<div class="bg-thum" data-id="<?php echo $data[$i]['_id']; ?>">
			<img class="_image_maps _image_bg" alt="" src="<?php echo $url_bg; ?>" />
		</div>
		<?php }}else echo "No Result !"; ?>