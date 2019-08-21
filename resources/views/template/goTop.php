<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript">
</script>
<script>
	$(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
			else $('#goTop').fadeOut();
		});
		$('#goTop').click(function () {
			$('body,html').animate({scrollTop: 0}, 'slow');
		});
	});
</script>

<!-- Back to TOP -->
<div id="goTop">
	<img src="images/scroll_up.png"> 
</div>