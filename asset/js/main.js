var addicon      = '<li class="kefu-add"><div class="icon-item"><span class="icon-title">图标标题</span><input name="iconTitle[]" style="width:400px"><span class="dtl">(7个汉字之内，否则会换行)</span></div> <div class="icon-item"><span class="icon-title">图标链接</span><input class="large-text code" style="width:400px" name="iconUrl[]" ><span class="dtl">(设置图标的跳转链接)</span></div> <div class="icon-item"><span class="icon-title">图标图片</span><input class="large-text code" style="width:400px" name="iconImg[]"><span class="dtl">(输入图片地址，必须为透明的正方形图片，建议大小为40*40)</span></div></li>';

var addQQ        = '<li class="kefu-add">标题<input name="qqTitle[]"><span class="dtl">(5个汉字之内，否则标题会换行，标准图标形式下不设置则不显示)</span> QQ号码<input class="large-text code" id="QQ_1" style="width:126px" name="qq[]"  ></li>';

var addWang      = '<li class="kefu-add">账号：<input name="wangwang[]"> 昵称：<input name="wangwangTitles[]"><span class="dtl">(大图标时不设置则不显示，小图标时不设置则显示旺旺号。)</span></li>';
var addWangInter = '<li class="kefu-add">账号：<input name="wangwangInter[]"> 昵称：<input name="wangwangInterTitles[]"> </li>';

var addSkype     = '<li class="kefu-add">帐号:<input name="skype[]"> 昵称:<input name="skypeTitles[]"></li>';

jQuery(function(){
	jQuery("#btnAddIcon").click(function(){
        jQuery("#iconLi").append(addicon);
     })
     
     jQuery(".btnDelIcon").click(function(){
        jQuery(this).parents("li").remove();
	 })
	 
    jQuery("#btnAddQQ").click(function(){
        jQuery("#qqLi").append(addQQ);
     })
     
     jQuery(".btnDelQQ").click(function(){
        jQuery(this).parents("li").remove();
     })
	 
	jQuery("#btnAddWang").click(function(){
        jQuery("#wangwangLi").append(addWang);
     })
	   
	jQuery("#btnAddwangwangInter").click(function(){
    	jQuery("#wangwangInterLi").append(addWangInter);
	 })
	 
	 jQuery("#btnAddSkype").click(function(){
        jQuery("#skypeLi").append(addSkype);
     })
	 
	 jQuery("#updateInfo").click(function(){
		jQuery("#updateInfoDiv").slideToggle("slow");
	 })
	 var style = jQuery("input[name=theme]:checked");
	 var tradition = jQuery(".qq-cus-tradition");
	 var modern = jQuery(".qq-cus-modern");
	 if (style.val() == 1) {
	 	tradition.show();
	 	modern.hide();
	 }else{
	 	tradition.hide();
	 	modern.show();
	 }
	 jQuery("input[name=theme]").on('click' , function(event) {
	 	if (jQuery(this).val() == 1) {
	 		tradition.show();
	 		modern.hide();
	 	}else{
	 	tradition.hide();
	 	modern.show();
	 }
	 });
	
	
})

 jQuery(document).ready(function(){
		jQuery('.rm_options').slideDown();
		
		jQuery('.kefu_section h3').click(function(){		
			if(jQuery(this).parent().next('.rm_options').css('display')=='none')
				{	jQuery(this).removeClass('inactive');
					jQuery(this).addClass('active');
					jQuery(this).children('img').removeClass('inactive');
					jQuery(this).children('img').addClass('active');
					
				}
			else
				{	jQuery(this).removeClass('active');
					jQuery(this).addClass('inactive');		
					jQuery(this).children('img').removeClass('active');			
					jQuery(this).children('img').addClass('inactive');
				}
				
			jQuery(this).parent().next('.rm_options').slideToggle('slow');	
		});
});

/*tab*/
jQuery(document).ready(function($){
	$('.setting-set li').click(function(){
		var tab = $(this).attr('data-id');

		$('.setting-set li').css({'background-color':'rgb(255, 255, 255)', 'color':'rgb(0, 0, 0)'});
		$(this).css({'background-color':'#0073aa', 'color':'#fff'});

		$('.kefu_tab').hide();
		$('#' + tab).show();
	});
});