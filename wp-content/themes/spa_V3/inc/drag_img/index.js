jQuery(document).ready(function($) {
	function changeBgColor(color){
		$('.wrap-black').each(function(){
			$(this).css('background',color);
		});
	}
	$(".bg-thums").on('click', "#color a", function() {
		color = $(this).data('color');
		changeBgColor(color);
	})
    $(".add_shape .drag_img").draggable({
        containment: "body",
        helper: "clone",
        revert: "invalid",


    });
	
    function recycleImage($item, $gallery) {
        if ($gallery.text() == 0)
            $item.clone().appendTo($gallery).parent().append("<p class='remove-img-ds'>X</p>").find(".drag_img").draggable({
				containment: $gallery,
			});
		
    }

    function customFunction(event, ui) {
		box_height = $(this).height();box_width = $(this).width();
      
		

    }


    $(".bg-detail ._imageMaps_area .wrap-black").droppable({
        accept: ".drag_img",
        activeClass: "active",
        hoverClass: "hover",
        tolerance: "fit",
        drop: function(event, ui) {
            recycleImage(ui.draggable, $(this));

        },
        over: function(event, ui) {
           
		   customFunction(event, ui)
        }
    });




    $('.bg-detail').on('click', ".remove-img-ds", function() {
        $(this).html('');
    });
    $('#close-popup,#opci-body').on('click', function(e) {
        $("#popup-khunghinh,#opci-body").hide();
    });
    $('._imageMaps_area').on('click', '.wrap-black p', function() {
        $(this).parent().html(" ");
    });

function popUpContentClick($img){
	$img.on('click', function(e) {
		$('._imageMaps_area').html($img).find('.wrap-black').droppable({
			accept: ".drag_img",
			activeClass: "active",
			hoverClass: "hover",
			tolerance: "fit",

			drop: function(event, ui) {
				recycleImage(ui.draggable, $(this));

			},
			over: function(event, ui) {
			
			   customFunction(event, ui)
			}
		});
		$("#popup-khunghinh,#opci-body").hide();
	});

}
    $('.bg-thums').on('click', ".bg-thum", function(e) {
		bg_ID = $(this).data("id");
        $('.bg-thum').removeClass('current');
        $(this).addClass('current');
        $('._imageMaps_area').find(".wrap-black").droppable({
            accept: ".drag_img",
            activeClass: "active",
            hoverClass: "hover",
            tolerance: "fit",

            drop: function(event, ui) {
                recycleImage(ui.draggable, $(this));

            },
            over: function(event, ui) {
                customFunction(event, ui);
            }
        });


        $.ajax({
            type: "post",
            dataType: "html",
            url: template_URL + "/inc/drag_img/popupContent.php",
            data: {
                ID: bg_ID,
            },
            context: this,
            beforeSend: function() {

            },
            success: function(response) {
                $('#popup-khunghinh').show().find("#content-popup").html(response).find('.cord_file').on('click', function(e) {
					popUpContentClick($(this));
				});
                $('#opci-body').show();
            },
            error: function(jqXHR, textStatus, errorThrown) {

                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        })
    });

    $('#checkout').on('click', function(e) {

        var ImgDesign = [];
        $('._imageMaps_area .wrap-khunghinh').find('.wrap-black').each(function(i) {
            ImgDsId = $(this).find('img').data('id');
            coords = $(this).data("coordinates");
            ImgDesign[i] = [ImgDsId, coords];

        });
        ImgBg = $('._image_bg').attr('src');

        $.ajax({
            type: "post",
            dataType: "html",
            url: "http://geminitee.com/design",
            data: {
                design: JSON.stringify(ImgDesign),
                background: JSON.stringify(ImgBg)
            },
            context: this,
            beforeSend: function() {

            },
            success: function(response) {
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {

                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        })

    });




    var textSearch = '';
    var page = 1;
    var limit = limit_value;
	
	

	var is_busy = false;
	var page = 1;
	var stopped = false;
	
    $('#search_img_icon').on('keypress', function(e) {
        if (e.keyCode == '13') {
			page = 1;
            textSearch = $(this).val();
            $.ajax({
                type: "post",
                dataType: "html",
                url: template_URL + "/inc/drag_img/getImgIcon.php",
                data: {
                    txt: textSearch,
                    page: page,
                    limit: limit
                },
                context: this,
                beforeSend: function() {
                    $('.add_shape').html('Loading...');
                },
                success: function(response) {

                    $('.add_shape').html(response).find(".drag_img").draggable({
                        containment: "body",
                        helper: "clone",
                        revert: "invalid",

                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {

                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            })

            return false;
        }
    });

    $('.add_shape').bind('scroll', function(e) {

        var elem = $(e.currentTarget);
		
        if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) {
			if (is_busy == true)  return false;
			if (stopped == true) return false;
			is_busy = true;
			page++;

            $.ajax({
                    type: "post",
                    dataType: "html",
                    url: template_URL + "/inc/drag_img/append_getImgIcon.php",
                    data: {
                        txt: textSearch,
                        page: page,
                        limit: limit
                    },
                    context: this,
                    beforeSend: function() {

                    },
                    success: function(response) {

                        $('.add_shape').append(response).find(".drag_img").draggable({
                            containment: "body",
                            helper: "clone",
                            revert: "invalid",

                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                        console.log('The following error occured: ' + textStatus, errorThrown);
                    }
                })
                .always(function() {
                    // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
                    //$loadding.addClass('hidden');
                    is_busy = false;
                });
            return false;
        }
    });

});