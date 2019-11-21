# premier-blog-en-PHP
- The project is to develop a professional blog. This website is divided into two large groups of pages:

1 - pages useful to all visitors;
Users can post comments on articles in the blog, which will be posted after validation by an admin. 

2 - pages to administer the blog.
The admin can drop articles and see the complete list of registered users.
the admin must validate the comments in the database and pass 'confirmed' to '1' for the comments to be edited.


# Need
- Composer
- PHP7

# Procedure to install the application:
* Download and unzip the files in the web folder of your server.

* import the .sql files present in the folder (premier-blog-en-PHP / sql) to create the tables and enter your data in your database.

do not forget to rename the connection information to your database in premier-blog-en-PHP / App / config / dev.php

    
* Open the Terminal, enter the application folder and start the installation via Composer:
    `` composer install``. The dependencies will be downloaded.

# Informations
- use of the bootstrap theme : "Clean-blog" 

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/c5fc3477e04e44b78487155908e3135f)](https://www.codacy.com/manual/al-grumpy/premier-blog-en-PHP?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=al-grumpy/premier-blog-en-PHP&amp;utm_campaign=Badge_Grade)
