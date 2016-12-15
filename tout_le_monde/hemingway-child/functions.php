<?php
function exclude_category($query) {
  if ( $query->is_home )
    $query->set('cat', '-2049');
  return $query;
}
add_filter('pre_get_posts', 'exclude_category');
?>