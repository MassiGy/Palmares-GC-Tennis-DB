import mysql from "mysql";

import * as dotenv from "dotenv";
dotenv.config({ path: __dirname+'/.env' });



const mysql_connection = mysql.createConnection({
  host: String(process.env.DB_HOST),
  user: String(process.env.DB_USER),
  password: String(process.env.DB_PASSWORD),
  database: String(process.env.DB_NAME),
});

mysql_connection.connect();

exports.mysql_connection = mysql_connection;
