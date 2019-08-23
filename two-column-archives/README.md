# How to break The Loop into 2 columns on a WordPress Archive Page
For those times when your designer makes you do these things.

I added a lot of spacing to make this easier to read.
It uses the HTML 5 Blank theme. (http://html5blank.com)

Explanation:
* Line 19 starts the count at 1.
* Line 20 sets the stop point at the total number of posts per page (in the WordPress settings, 10 is the default).
* Line 21 alters the total count in the case of the blog having fewer than the posts per page in the entire blog (<10 as a default).
* Line 22 sets the halfway point, accounting for any odd numbers. (For example, the halfway of 10 would be 5 but the halfway of 7 would be 4.)
* Line 23 starts The Loop.
* Line 24 adds the column start if it is the first post of the 1st or 2nd column.
* Line 50 adds the column end if it is the halfway post or the last post on the page.
* Line 51 increments the count.
* Lines 52/53/64 are the standard WordPress Loop close.