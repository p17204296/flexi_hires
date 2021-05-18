<?php

//include('partials/indexHeader.php');
$this->view("partialsIndexHeader",$data);
// Commit Test
?>

<!-- Hero & Category Search Section Starts-->
<section class="text-align-center main-content-index">
  <article class="main-head-index">
    <h1>FLEXI-HIRES - Find the perfect freelance services for your business</h1>
  </article>

  <a href="search.html" class="index1-btn">Search Services Available</a>

  <article class="main-head-index2">
    <h2 class="reveal-hero1">A whole world of freelance talent at your fingertips</h2>
    <ul>
      <li><h6 class="reveal-hero2">&#11088; The best platform for every budget</h6></li>
      <li><p class="reveal-hero3">Find high-quality services at every price point. No hourly rates, just project-based pricing.</p></li>

      <li><h6 class="reveal-hero4">&#11088; Quality work done quickly</h6></li>
      <li><p class="reveal-hero5">Find the right freelancer to begin working on your project within minutes.</p></li>

      <li><h6 class="reveal-hero6">&#11088; 24/7 support</h6></li>
      <li><p class="reveal-hero7">Questions? Our round-the-clock support team is available to help anytime, anywhere.</p><a href="search.html" class="index2-btn reveal-hero8">Click Here to Get Started!</a></li>

    </ul>

  </article>

</section>
<!-- Hero & Category Search Section Ends -->
</section>


  <!-- Category Section Starts-->
  <section class="categories">
    <h2 class="text-align-center reveal-h2">Categories</h2>

    <div class="container">

      <article class="cat-boxes float-container">
        <a href="search.html?q=SEO">
          <img src="<?=ASSETS?>images/seo@2x.webp" alt="SEO Category" class="responsive-img curve-img">
          <h3 class="cat-deco float-cat-text purple-text text-align-center">SEO & SEM</h3>
        </a>
      </article>
      <article class="cat-boxes float-container">
        <a href="search.html?q=videography">
          <img src="<?=ASSETS?>images/videography@1x.jpg" alt="videography Category" class="responsive-img curve-img">
          <h3 class="cat-deco float-cat-text purple-text text-align-center">Videography</h3>
        </a>
      </article>
      <article class="cat-boxes float-container">
        <a href="search.html?q=content-writing">
          <img src="<?=ASSETS?>images/content-writing@2x.webp" alt="Content Writing Category" class="responsive-img curve-img">
          <h3 class="cat-deco float-cat-text purple-text text-align-center ">Content Writing</h3>
        </a>
      </article>
    </div>
  </section>
  <!-- Category Section Ends -->

  <!-- Explore Section Starts-->
  <section class="explore-section">
    <h2 class="text-align-center">Explore Categories</h2>
    <div class="container">

      <article class="explore-boxes">
        <img src="<?=ASSETS?>images/content-writing@2x.webp" alt="Content Writing Category" class="explore-img responsive-img curve-img">
        <div class="explore-info">
          <h3>Content Writing</h3>
          <p class="cat-details">Content Writing Freelancers available...</p>
          <br>
          <a href="search.html?q=content-writing" class="btn explore-btn">Search Category</a>
        </div>
      </article>

      <article class="explore-boxes">
        <img src="<?=ASSETS?>images/content-writing@2x.webp" alt="Videography Category" class="explore-img responsive-img curve-img">
        <div class="explore-info">
          <h3>Web Development</h3>
          <p class="cat-details">Web Developer Freelancers available...</p>
          <br>
          <a href="search.html?q=web-development" class="btn explore-btn">Search Category</a>
        </div>
      </article>

      <article class="explore-boxes">
        <h3>Videography</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <br>
        <a href="search.html" class="btn explore-btn">Search Category</a>
      </article>

      <article class="explore-boxes">
        <h3>Consulting</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <br>
        <a href="search.html?q=consulting" class="btn explore-btn">Search Category</a>
      </article>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </section>
  <!-- Explore Section Ends -->


<?php


//include('partials/footer.php');
$this->view("partialsFooter",$data);

?>
