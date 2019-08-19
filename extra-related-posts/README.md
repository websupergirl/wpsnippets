# extra-related-posts
Modify the related posts function found in Elegant Themes Extra to exclude a category.
* original is found in wp-content/themes/Extra/includes/template-tags.php around line 1590
* new version should be placed into the functions file on the child theme and renamed as a new function
* single-post.php then needs to be copied to the child theme, replacing extra_get_post_related_posts() in $related_posts = extra_get_post_related_posts(); around line 172 with the name of your new function
  
Future ideas:
* Create checkbox on categories for client to be able to choose to exclude.
  
Note: Unfortunately the function isn't pluggable so options are limited in terms of implementation.

Added on 08182019: The related posts are limited to everything after 2017.
