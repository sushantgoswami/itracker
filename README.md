To install the application foolw the instructions

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

1. Make changes in mftracker/config/db_config.php

   # vi mftracker/mftracker-v01/config/db_config.php

2. Run the php file mftracker/mftracker-v01/installer/default_user_table.php to make default tables 

   # php mftracker/mftracker-v01/installer/default_user_table.php

3. Make files to apache/nginx writable

   # chown -R apache:apache mftracker/mftracker-v01/cache
   # chown -R nginx:nginx mftracker/mftracker-v01/cache
   # chown -R apache:apache mftracker/mftracker-v01/log
   # chown -R nginx:nginx mftracker/mftracker-v01/log   

#####################################
