To install the application follow the instructions

#####################################
Make DB as below
#####################################

Login mysql with priv user and execute as below example"

1. Create the db
MariaDB [(none)]> create database itracker;
Query OK, 1 row affected (0.002 sec)

2. Create User
MariaDB [(none)]> CREATE USER 'itracker'@'localhost' IDENTIFIED BY 'fantastic@itracker';
Query OK, 0 rows affected (0.059 sec)

3. Grant access control of DB
MariaDB [(none)]> GRANT ALL PRIVILEGES ON itracker.* TO 'itracker'@'localhost';
Query OK, 0 rows affected (0.001 sec)

4. Apply changes
MariaDB [(none)]> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.018 sec)

MariaDB [(none)]> exit
Bye

#####################################
Make config file changes
#####################################

1. Make changes in mftracker-v01/config/db_config.php

   # vi mftracker/mftracker-v01/config/db_config.php

2. Run the php file mftracker/mftracker-v01/installer/default_user_table.php to make default tables 

   # php mftracker/mftracker-v01/installer/default_user_table.php

3. Make files to apache/nginx writable

   # chown -R apache:apache mftracker/mftracker-v01/cache
   # chown -R nginx:nginx mftracker/mftracker-v01/cache
   # chown -R apache:apache mftracker/mftracker-v01/log
   # chown -R nginx:nginx mftracker/mftracker-v01/log   

4. Change the values in mftracker-v01/config/global.php

5. Change the encrypted code to any other. However, maintain the approx same lenght. (mftracker-v01/config/encrypted_code.php)

6. Change the same code in mftracker-v01/scripts/nav_download_cron.sh, run this cron daily via cronjob to update NAV on daily basis.

#####################################
Add administrator account
#####################################

Open the portal and register first user as administrator, this user is having by default admin rights and different page.
