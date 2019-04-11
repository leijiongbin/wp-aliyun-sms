var kefuTO = window.setTimeout(function(){

	jQuery("#kefu-kefuDv").hover(function(){
		if(isLeft=="left"){ 
			jQuery(this).stop().animate({"left":"0"});
		}else{
			jQuery(this).stop().animate({"right":"0"});
		}
	},function(){
		if(isIn){
			if(isLeft=="left"){
				jQuery(this).stop().animate({"left":"-109"});
			}else{
				jQuery(this).stop().animate({"right":"-109"});
			}
		}
		
	});
	var cuservqrcodebox = jQuery(".kefu-qrcode-box");
	jQuery("#qq-kefu-qrCode").hover(function(){
		if (cuservqrcodebox.attr("pos") == "2") {
			cuservqrcodebox.css("left","-200px").show();
		}else{
			cuservqrcodebox.css("right","-200px").show();
		}
		
	},function(){
		cuservqrcodebox.hide();
	})
	},1000);
jQuery(function() {
	jQuery("#kefu-mobile-cus-mask").css({
		width: jQuery(window).width()+'px',
		height: jQuery(window).height()+'px'
	});
	jQuery("#kefu-mobile-cus").on('click', function(event) {
		jQuery(this).addClass('kefu-mobile-btn-hide');
		jQuery("#kefu-cus-box").addClass('kefu-cus-box-show');
		jQuery("#kefu-mobile-cus-mask").show();
	});
	jQuery("#kefu-mobile-cus-mask").on('click touchstart touchmove', function(event) {
		jQuery(this).hide();
		jQuery("#kefu-mobile-cus").removeClass('kefu-mobile-btn-hide');
		jQuery("#kefu-cus-box").removeClass('kefu-cus-box-show');
	});
});
function backUp(){
	jQuery('body,html').animate({scrollTop:0},500);  
}