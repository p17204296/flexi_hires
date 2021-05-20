<?php

$this->view("partialsHeader", $data);
?>

<div class="body-background"> <!-- Background Color Starts -->

    <main class="container search-page">
        <h1>Search Results</h1>

        <article class="search-form">
            <input type="search" class="cat-search" name="search" id="searchQuery" aria-label="searchbar"
                   placeholder="Try 'videography' ">
            <button type="submit" class="index-search-btn btn-primary-col" name="button">Search</button>
        </article>

        <ul id="servicesList">

        </ul>

    </main>

</div> <!-- Background Color Ends -->

<?php


$this->view("partialsFooter", $data);

?>
