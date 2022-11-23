SHOW DATABASES;
DROP DATABASE IF EXISTS PalmaresGCTennis_Mysql;
CREATE DATABASE PalmaresGCTennis_Mysql;
USE  PalmaresGCTennis_Mysql;
STATUS;

SOURCE ./Modals/Grand_Slam.sql;
SOURCE ./Modals/Player.sql;
SOURCE ./Modals/Participate.sql;















