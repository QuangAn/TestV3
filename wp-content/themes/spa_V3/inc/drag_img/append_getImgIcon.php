<?php
$txtSearch = $_POST['txt'];
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$limit = $_POST['limit'];
$start = ($limit * $page) - $limit;

$URL = 'http://geminitee.com';
$json_img_icon = file_get_contents('http://geminitee.com/design?q='.$txtSearch.'&start='.$start.'&limit='.$limit);
$arr_img_icon = json_decode($json_img_icon, true);
$data_img_icon = $arr_img_icon['data'];
$total_record = count($data_img_icon);


	$j=$limit;
	for($i=0; $i<$total_record;$i+=3){
		$j+=3;
?>
							<div class="image_shape shape">

								<div class="col-4">
									<div class="label_img" id="label_img_<?php echo $j; ?>">
										<img class="drag_img " data-id="<?php echo $data_img_icon[$i]['_id']; ?>" id="drag<?php echo $j; ?>" alt="<?php echo $data_img_icon[$i]['title']; ?>" src="<?php echo $URL.$data_img_icon[$i]['image']; ?>">
									</div>
								</div>
								<?php if($i+1 < $total_record){ ?>
								<div class="col-4">
									<div class="label_img" id="label_img_<?php echo $j+1; ?>">
										<img class="drag_img " data-id="<?php echo $data_img_icon[$i+1]['_id']; ?>" id="drag<?php echo $j+1; ?>" alt="<?php echo $data_img_icon[$i+1]['title']; ?>" src="<?php echo $URL.$data_img_icon[$i+1]['image']; ?>">
									</div>
								</div>	
								<?php if($i+2 < $total_record){ ?>
								<div class="col-4">
									<div class="label_img" id="label_img_<?php echo $j+2; ?>">
										<img class="drag_img " data-id="<?php echo $data_img_icon[$i+2]['_id']; ?>" id="drag<?php echo $j+2; ?>" alt="<?php echo $data_img_icon[$i+2]['title']; ?>" src="<?php echo $URL.$data_img_icon[$i+2]['image']; ?>">
									</div>
								</div>		
							<?php }} ?>
							</div>
							<?php } ?>