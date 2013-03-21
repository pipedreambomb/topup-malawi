Topup
=====

I cooked up this site as a what-if project, since it was impossible to buy phone topups (vouchers that increase your phone's credit) online in Malawi. It made buying large amounts, e.g. the 10,000 MKw for a 5GB data bundle on TNM, a bit of a hassle as you'd have to go around town handing out large sums of cash to various street vendors who each had a few to sell. It also made running out of credit after dark unfortunate.

The result is this site, currently online at http://topup.georgenixon.co.uk. Most of it is the front end - style and presentation, some JavaScript, and the PHP to make orders. After that point, users are informed that it's just a demo and the rest of the site hasn't been written yet. 

It has some back end bits, like drawing the telco names and corresponding denominations of topups from a database and dynamically working out how to send the fewest codes to reach the target amount.

What is missing is handing off to PayPal or other online payment system, and then fulfilling the order when it is successful. There's no admin routing for adding topups etc, you'll have to do it straight into the database at present. It also doesn't check if the topups it wants to sell are in stock, or mark them as sold or write to the topups table at all.

1. Requirements
---------------

To get started with this website, you will need 
1) a PHP web server like Apache (mine is running PHP 5.3; I haven't tested on earlier versions)
2) a MySQL database and a user account you can use

2. Technologies
---------------

This project uses a few other open source projects:

+ [SimpleTest](http://www.simpletest.org/) - PHP unit testing.
+ [Bootstrap from Twitter](twitter.github.com/bootstrap/) - UI framework for nice buttons, layout etc.
+ [jQuery](http://jquery.com) - always.
+ [MeekroDB](http://www.meekro.com/) - simple to use MySQL library for PHP.

3. Installation
----------------

1. Run `db/topup.sql` on your MySQL database to recreate the requisite database.
2. Copy `db/sample_db.php` to `db/db_cfg.php` and change the values to your own MySQL details. 
3. Update or delete the Google Analytics code in the template `classes/Page.php` to your own account, because otherwise the usage stats will be sent to me!
4. Run the unit tests in your browser at `<site root>/tests/all_tests.php`. Hopefully they all pass; if not, you might need to check your Apache or MySQL setup.
