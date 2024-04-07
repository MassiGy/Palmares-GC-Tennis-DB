package database

import (
	"database/sql"
	"os"

	"github.com/go-sql-driver/mysql"
)

// create a constants that will represent
// our database connection credentials.
const (
	DB_NAME    = "PalmaresGCTennis_Mysql"
	DB_USER    = "massigy"
	DB_ADDRESS = "127.0.0.1:3306"
	DB_NETWORK = "tcp"
)

// create our mysql config object
var myql_config_obj = mysql.Config{
	DBName:               DB_NAME,
	User:                 DB_USER,
	Passwd:               os.Getenv("DB_PASSWORD"),
	Net:                  DB_NETWORK,
	Addr:                 DB_ADDRESS,
	AllowNativePasswords: true,
}

// create our mysql formated connection string (make it globaly visible)
var Mysql_connection_string = myql_config_obj.FormatDSN()

// declare a database handler variable as global
var Db_handler *sql.DB

// declare a global database related structs and keys

var Tables_count = 3

type Table struct {
	Table_name string
}

type Player struct {
	Player_ID          int
	Player_First_Name  string
	Player_Last_Name   string
	Player_Gender      string
	Player_Nationality string
	Player_ATP_Rank    int
}

type Participation struct {
}

type Grand_slam struct {
	GC_ID       int
	GC_Name     string
	GC_Location string
	GC_Ground   string
	GC_Creation int
}
