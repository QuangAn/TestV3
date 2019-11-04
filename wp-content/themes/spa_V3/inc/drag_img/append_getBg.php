<?php
$txtSearch = $_POST['txt'];
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$limit = $_POST['limit'];
$start = ($limit * $page) - $limit;

$URL = 'http://geminitee.com';
$jsonbg = file_get_contents('http://geminitee.com/background?q='.$txtSearch.'&start='.$start.'&limit='.$limit);
$arrbg = json_decode($jsonbg, true);
$databg = $arrbg['data'];
$total_record = count($databg);

$j=$limit;
?>
<?php 
		
		if($total_record){
			for($i=0; $i<$total_record;$i++){
				$j++;
				$url_bg = $databg[$i]['img_select'];
				$cord_file = $databg[$i]['cord_file'];
		?>
		<div class="bg-thum" data-id="<?php echo $databg[$i]['_id']; ?>">
			<img class="_image_maps _image_bg" alt="" src="<?php echo $url_bg; ?>" />
		</div>
		<?php }} ?>