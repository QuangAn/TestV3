 jQuery(document).ready(function($) {

    var textSearchBg = '';
    var pageBg = 1;
    var limitBg = limitBg_value;
	
	

	var is_busy_bg = false;
	var pageBg = 1;
	var stopped_bg = false;
	
    $('#search_bg').on('keypress', function(e) {
        if (e.keyCode == '13') {
			pageBg = 1;
            textSearchBg = $(this).val();
            $.ajax({
                type: "post",
                dataType: "html",
                url: template_URL + "/inc/drag_img/getBg.php",
                data: {
                    txt: textSearchBg,
                    pageBg: pageBg,
                    limit: limitBg
                },
                context: this,
                beforeSend: function() {
                    $('.content-thumb').html('Loading...');
                },
                success: function(response) {

                    $('.content-thumb').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {

                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            })

            return false;
        }
    });

    $('.content-thumb').bind('scroll', function(e) {

        var elem = $(e.currentTarget);
		
        if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) {
			if (is_busy_bg == true)  return false;
			if (stopped_bg == true) return false;
			is_busy_bg = true;
			pageBg++;

            $.ajax({
                    type: "post",
                    dataType: "html",
                    url: template_URL + "/inc/drag_img/append_getBg.php",
                    data: {
                        txt: textSearchBg,
                        page: pageBg,
                        limit: limitBg
                    },
                    context: this,
                    beforeSend: function() {

                    },
                    success: function(response) {

                        $('.content-thumb').append(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                        console.log('The following error occured: ' + textStatus, errorThrown);
                    }
                })
                .always(function() {
                    is_busy_bg = false;
                });
            return false;
        }
    });

});