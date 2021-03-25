<?php include('partials/indexHeader.php');

?>

	<!-- Category Search Section Starts-->
	<section class="text-align-center main-content-index">
	<h1>FLEXI-HIRES - Find the perfect freelance services for your business</h1>
	<form class="cat-search" action="index.html" method="post">
		<input type="search" name="search" placeholder="Try 'web development' ">
		<input type="submit" name="submit" value="Search" class="index-search-btn btn-primary-col">
	</form>
	</section>
	<!-- Category Search Section Ends -->
</section>

<!-- Category Section Starts-->
	<section class="categories">
		<div class="container">
			<h2 class="text-align-center">Categories</h2>

			<div class="cat-boxes float-container">
				<a href="#">
					<img src="assets/images/seo@2x.webp" alt="SEO Category" class="responsive-img curve-img">
					<h3 class="cat-deco float-cat-text purple-text text-align-center">SEO & SEM</h3>
				</a>
			</div>
			<div class="cat-boxes float-container">
				<a href="#">
					<img src="assets/images/videography@1x.jpg" alt="videography Category" class="responsive-img curve-img">
					<h3 class="cat-deco float-cat-text purple-text text-align-center">Videography</h3>
				</a>
			</div>
			<div class="cat-boxes float-container">
				<a href="#">
					<img src="assets/images/content-writing@2x.webp" alt="Content Writing Category" class="responsive-img curve-img">
					<h3 class="cat-deco float-cat-text purple-text text-align-center ">Content Writing</h3>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
<!-- Category Section Ends -->

<!-- Explore Section Starts-->
	<section class="explore-section">
		<div class="container">
			<h2 class="text-align-center">Explore Categories</h2>

			<div class="explore-boxes">
				<img src="assets/images/content-writing@2x.webp" alt="Content Writing Category" class="explore-img responsive-img curve-img">
				<div class="explore-info">
					<h3>Content Writing</h4>
					<p class="cat-details">Content Writing Freelancers available</p>
					<br>
					<a href="#" class="btn btn-primary-col">View Category</a>
				</div>
			</div>

			<div class="explore-boxes">
				<img src="assets/images/content-writing@2x.webp" alt="Content Writing Category" class="explore-img responsive-img curve-img">
				<div class="explore-info">
					<h3>Content Writing</h4>
					<p class="cat-details">Content Writing Freelancers available</p>
					<br>
					<a href="#" class="btn btn-primary-col">View Category</a>
				</div>
			</div>


			<div class="explore-boxes">
				Box 2
			</div>
			<div class="explore-boxes">
				Box 3
			</div>
			<div class="explore-boxes">
				Box 4
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</section>
<!-- Explore Section Ends -->


<?php include('partials/footer.php'); ?>
