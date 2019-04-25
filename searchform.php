<?php
/**
 */

?>

<form class="search-form" action="/" method="get">
  <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
<!--  <input type="hidden" value="product" name="post_type" />-->
  <button class="btn-submit" type="submit"><i class="icon-search" alt="Search"></i></button>
</form>
