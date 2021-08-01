<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
<script>
//alert(window.screen.width);
if (window.screen.width<=736){ 
$(".dropdown-toggle").attr("data-toggle", "dropdown");
}
//if (window.screen.width>736){
//$(".dropdown-toggle").attr("data-toggle", "");
//}

$('.iconfontnew').click(function(){
        $('.linknew').toggleClass('show');
    });
$('.iconfontnew2').click(function(){
        $('.linknew2').toggleClass('show');
    });

</script>




<!--视频start-->
	<div class="show_div_body" id="video_div">
		<div class="show_div">
			<div class="close_btn" onClick="hide_video()">×</div>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/gaNs41N6Snc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
	<!--视频end-->
	<script>
		function show_video(){
			document.getElementById("video_div").style.display = "block";
			document.getElementById("myVideo").play();
		}
		function hide_video(){
			document.getElementById("video_div").style.display = "none";
			document.getElementById("myVideo").pause();
		}	</script>


  <script>
    $('.logo-slider').slick({
      slidesToShow:4,
      slidesToScroll:1,
      dots:true,
      arrows:true,
      autoplay:true,


    });
  </script>