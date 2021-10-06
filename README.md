Description
REQUIREMENTS: php version > 5.6, mysqli needed

0	app/www/ is a folder accessible from the web, app is parent folder, not accessible
1	fill auth data for Mysql DB in app/auth.json
2	CREATE table from console:
	cd app; php 1_create_table.php;
3	enter /index.html from the web and use

script app/www/check.php responsible for checking values without DB connection

script app/www/save.php checking values to be non empty, assumed thad check is done. It saves them and response with json for table data

index.html contain JS code needed

