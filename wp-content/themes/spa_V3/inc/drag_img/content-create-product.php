<div class="wrap_module_product">
	<div class="checkout-btn"><h3><a id="checkout" href="#">CheckOut</a></h3></div>
    <div class="bg-thums col-3">
		<input class="img_search" id="search_bg" type="text" placeholder="Search" />
		<div class="content-thumb scroll_1">
		<?php 
			$limit_bg = 18;
			$URL = 'http://geminitee.com';
			$json_img_map = file_get_contents('http://geminitee.com/background');
			$arr_img_map = json_decode($json_img_map, true);
			$data = $arr_img_map['data'];
			$imgWidthFull = 5000;
			$imgheightFull = 5700;
	
			for($i=0; $i< count($data);$i++){
				$url_bg = $data[$i]['img_select'];
		?>
		<div class="bg-thum" data-id="<?php echo $data[$i]['_id']; ?>">
			<img class="_image_maps _image_bg" alt="" src="<?php echo $url_bg; ?>" />
		</div>
		<?php } ?>
		</div>
		<div id="popup-khunghinh" class="scroll_1">
			<h3>Background Layouts</h3>
			<div id="content-popup">
				
			</div>
			<p id="close-popup">X</p>
		</div>
		<div id="opci-body"></div>
    </div>
    <div class="bg-detail col-6">
			<?php
				$khunghinh1 = $data[0]['cord_file'][0];
				$URL_KH_1 = $data[0]['img_select'];
			?>
        <div  data-id="<?php echo $data[0]['_id']; ?>" class="_imageMaps_area">
            <img alt="" src="<?php echo $URL_KH_1; ?>" class="_image_maps _image_bg" />
					<div class="wrap-khunghinh">
						<?php 
							
							for($j=0;$j<count($khunghinh1);$j++){
								$left = (($khunghinh1[$j][0])*100)/$imgWidthFull;
								$top = (($khunghinh1[$j][1])*100)/$imgheightFull;
								$right = (($khunghinh1[$j][2])*100)/$imgWidthFull;
								$bottom = (($khunghinh1[$j][3])*100)/$imgheightFull;
								$width = $right - $left;
								$height = $bottom - $top;
											
						?>
						
						<div data-color="#000" data-coordinates="['<?php echo $khunghinh1[$j][0]; ?>','<?php echo $khunghinh1[$j][1]; ?>','<?php echo $khunghinh1[$j][2]; ?>','<?php echo $khunghinh1[$j][3]; ?>']" data-id="<?php echo $j; ?>" class="wrap-black" style="left:<?php echo $left; ?>%;top:<?php echo $top; ?>%;width:<?php echo $width; ?>%;height:<?php echo $height; ?>%;">
						</div>
						
						<?php } ?>
					</div>
        </div>
    </div>
    <div class="img-design col-3">
        <input class="img_search" id="search_img_icon" type="text" placeholder="Search" />
        <div class="add_shape scroll_1">

            <?php
								$limit = 18;
								$json_img_icon = file_get_contents($URL.'/design?start=0&limit='.$limit);
								$arr_img_icon = json_decode($json_img_icon, true);
								$data_img_icon = $arr_img_icon['data'];
							?>
            <?php  for($i=0; $i<count($data_img_icon);$i+=3){ ?>
            <div class="image_shape shape">
                <div class="col-4">
                    <div class="label_img " id="label_img_<?php echo $i; ?>">
                        <img class="drag_img "  data-id="<?php echo $data_img_icon[$i]['_id']; ?>" id="drag<?php echo $i; ?>" alt="<?php echo $data_img_icon[$i]['title']; ?>" src="<?php echo $URL.$data_img_icon[$i]['image']; ?>">
                    </div>
                </div>
				<div class="col-4">
                    <div class="label_img " id="label_img_<?php echo $i+1; ?>">
                        <img class="drag_img"  data-id="<?php echo $data_img_icon[$i+1]['_id']; ?>" id="drag<?php echo $i+1; ?>" alt="<?php echo $data_img_icon[$i+1]['title']; ?>" src="<?php echo $URL.$data_img_icon[$i+1]['image']; ?>">
                    </div>
                </div>
				<div class="col-4">
                    <div class="label_img " id="label_img_<?php echo $i+2; ?>">
                        <img class="drag_img "  data-id="<?php echo $data_img_icon[$i+2]['_id']; ?>" id="drag<?php echo $i+2; ?>" alt="<?php echo $data_img_icon[$i+2]['title']; ?>" src="<?php echo $URL.$data_img_icon[$i+2]['image']; ?>">
                    </div>
                </div>
            </div>
            <?php } ?>

		
        </div>
	
    </div>
</div>
<script>
	var template_URL = "<?php echo get_bloginfo('stylesheet_directory'); ?>";
	var limit_value = "<?php echo $limit; ?>" ;
	var limitBg_value = "<?php echo $limit_bg; ?>" ;

</script>