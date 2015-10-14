<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="S E A R C H" />
<input type="submit" class="submit search-button" value="<?php echo esc_attr_x( '', 'submit button', 'bow' ); ?>" />
</form>