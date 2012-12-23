topup-malawi
============

A prototype of how a phone topup/airtime website could work in Malawi, where I've found no way to top-up my phone online.
I've started this project as a demonstration of how a site like this could work. I'm putting the source code on GitHub and would be delighted if anyone wanted to take up the baton (I'm going back to the UK in four weeks).

1. Requirements
---------------

To get started with this website, you will need 
1) a PHP web server like Apache
2) a MySQL database and a user account you can use

2. Configuration
----------------

First, you will need to run db/topup.sql on your MySQL database to recreate the requisite database. Next, copy db/sample_db.php to db/db_cfg.php and configure it with your own MySQL details. Finally, enable the shortcut <? php tags. That's it, at this point!
