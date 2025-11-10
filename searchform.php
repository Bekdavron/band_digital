<form role="search" method="get" id="searchform" class="form-inline" action="<?php echo home_url( '/' ); ?>">
  <input class="form-control" type="search" name="s" id="s" placeholder="поиск"
    value="<?php echo get_search_query(); ?>" />
  <button class="btn btn-primary" type="submit">🔍</button>
</form>

