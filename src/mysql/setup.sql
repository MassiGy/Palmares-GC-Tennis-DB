SHOW DATABASES;
DROP DATABASE IF EXISTS PalmaresGCTennis_Mysql;
CREATE DATABASE PalmaresGCTennis_Mysql;
USE  PalmaresGCTennis_Mysql;
STATUS;

SOURCE ./Modals/P16_Grand_Slam.sql;
SOURCE ./Modals/P16_Player.sql;
SOURCE ./Modals/P16_Participate.sql;
















