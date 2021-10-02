(function( $ ) {
	'use strict';
	$(document).ready( function(){
		$('#fl_select_page').on('change', function(){
			if (this.selectedIndex) return; //not `Select All`
			$(this).find('option:gt(0)').prop('selected', true);
			$(this).find('option').eq(0).prop('selected', false);
		});
		$('#fl_select_post').on('change', function() {
			if (this.selectedIndex) return; //not `Select All`
			$(this).find('option:gt(0)').prop('selected', true);
			$(this).find('option').eq(0).prop('selected', false);
		});
		$('#fl_form_submit_btn').click(function(e){
			$('.fl_app_id_err').text("");
			$('.fl_page_add_err').text(" ");
			var filter =/^[0-9]+([,.][0-9]+)?$/g;
			var filter_add= /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
			var app_id = $('#fl_app_id').val();
			var page_add = $('#fl_page_add').val();
			var  int1 = 0;
			if(app_id == '' ||  app_id == undefined){
				$('.fl_app_id_err').text("Please enter  app id ");
				int1 = 1;
			}else if(!filter.test(app_id)){
				$('.fl_app_id_err').text("Please enter correct app id ");
				int1 = 1;
			}
			if(page_add == '' ||  page_add == undefined){
				$('.fl_page_add_err').text("Please enter facebook page address ");
				int1 = 1;
			}else if(!filter_add.test(page_add)){
				$('.fl_page_add_err').text("Please enter correct  facebook page address ");
				int1 = 1;
			}
			if(	int1 == 1){
				e.preventDefault();
			} 
		});
	});
})( jQuery );
