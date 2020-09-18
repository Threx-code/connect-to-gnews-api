# connect-to-gnews-api

THIS FILES WILL GUIDE YOU ON HOW TO SETUP THE APPLICATION

File structures

app (create a root folder with a name app. Download all the files and folder into the root folder)
1. assets (plugins, script)

2. system (config, core, inc, libs, controller, model,view)

3. .htaccess

4. Create_db.php

5. File-template.php

6. Index.php


7. Syspath.php

8. Table.php

INITIALIZING THE APPLICATION

1. Create a database ‘mtech_db’ by running http://127.0.0.1/app/create_db (this will create the database)

N.B you can use a different database name. However, you will need to update these information in system/config/config.php file and system/config/create_database.php file

2.  Create tables into the database by running http://127.0.0.1/app/table (this will create the tables)


RUNNING THE APPLICATION

These method have been tested and working perfectly. Through an end point
If you use option 

1. That’s a raw PHP, option 2 two fetches through Ajax call. Click on get news to fetch from the Gnews API

If you run below end-points, it will fetch from Gnews.io and also save the fetched data into the local database

1. Querying Gnews API
http://127.0.0.1/app/system/model/request.php

2. http://127.0.0.1/app/

