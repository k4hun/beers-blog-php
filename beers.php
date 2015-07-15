<h2 class='h2-header' id='beers'>Beers</h2>
<div class='container'>
	<!-- <div class='row content-header'>
		<h1>
			<div class='col-md-2'><img height="100" src="assets/images/menu/beers.png" width="100" /></div>
			<div class='col-md-8 text-center' id='beers'>BEERS</div>
			<div class='col-md-2'><img height="100" src="assets/images/menu/beers.png" width="100" /></div>
		</h1>
	</div> -->

	<div class='beers-slider text-center'>
		<div class='slider-nav'>
			<a class="btn btn-default" href="javascript:setSlide(0)" id="slider-nav-0">1</a>
			<a class="btn btn-default" href="javascript:setSlide(1)" id="slider-nav-1">2</a>
			<a class="btn btn-default" href="javascript:setSlide(2)" id="slider-nav-2">3</a>
		</div>
		<div class='col-md-2 slider-side-left'><a class="btn btn-default" href="javascript:setSlide("prev")">&lt;</a></div>
		<div class='col-md-8'>
			<?php 
				$recent = Beer::getLimited(3); 
				$slide = 0;
				foreach ($recent as $val) {
					echo "<div class='slider-item' id='slide$slide'><img height='600' src='uploads/$val->photo_url' width='400' alt='slide1'/></div>";
					$slide++;
				}
			?>
			<!-- <div class='slider-item' id='slide0'><img height="600" src="uploads/<?php ?>" width="400" alt='slide1'/></div>
			<div class='slider-item' id='slide1'><img height="600" src="" width="400" alt='slide2'/></div>
			<div class='slider-item' id='slide2'><img height="600" src="" width="400" alt='slide3'/></div> -->
		</div>
		<div class='col-md-2 slider-side-right'><a class="btn btn-default" href="javascript:setSlide("next")">&gt;</a></div>
	</div>
</div>
<hr>
<h2 class='h2-header' id='history'>History</h2>
<div class='container'>
	<p>Donec congue, tellus in malesuada fermentum, sem dui tristique diam, sit amet posuere eros metus vitae augue. Vivamus metus sem, imperdiet nec lacinia vitae, ornare non erat. Aliquam pharetra, turpis ut ornare pellentesque, lectus odio semper nibh, non tristique massa arcu id ante. Vestibulum nisi libero, tempor nec dolor nec, tempus iaculis lorem. Phasellus mauris sapien, bibendum ut convallis quis, feugiat ac nibh. Donec lacinia eget mauris eu congue. Nulla at enim eget risus molestie efficitur nec et erat. Fusce at iaculis purus. Morbi eget finibus odio. Donec ac sodales lectus, id finibus felis. Proin tempor gravida arcu ut ultrices. Aliquam quis cursus risus. Vivamus nisi augue, congue nec faucibus eu, congue eu orci. Nulla pulvinar, nisi at pellentesque tincidunt, ligula ex pellentesque tortor, a iaculis ante quam at lectus.</p>
	<div class='text-center ingredients'>
		<div class='col-md-3'><img height="150" src="assets/images/ingredients/water.jpg" width="180" /></div>
		<div class='col-md-3'><img height="150" src="assets/images/ingredients/malts.jpg" width="180" /></div>
		<div class='col-md-3'><img height="150" src="assets/images/ingredients/hops.jpg" width="180" /></div>
		<div class='col-md-3'><img height="150" src="assets/images/ingredients/yeasts.jpg" width="180" /></div>
	</div>
</div>
<hr>
<h2 class='h2-header' id='tasted'>Already tasted</h2>