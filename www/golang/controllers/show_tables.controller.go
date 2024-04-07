package controllers

import (
	"fmt"
	"net/http"
	"sql-project/database"
)

func Show_tables_names(res_writer http.ResponseWriter, req *http.Request) {

	// use the handler to send up a query to our database
	rows, err := database.Db_handler.Query("SHOW TABLES;")
	if err != nil {
		panic(err)
	}
	// defer the rows byte stream close call
	defer rows.Close()

	// create an array of three slots that will hold up our rows
	// data
	tables := make([]database.Table, database.Tables_count)

	// iterate through the rows byte stream
	i := 0
	for rows.Next() {
		// each time, scan the table name to the right tables vect slot
		if i >= database.Tables_count {
			panic("too many rows")
		}
		err = rows.Scan(&(tables[i].Table_name))
        if err != nil {
            panic(err)
        } 
		// increment i to move to the following slot.
		i++
	}

    // otherwise, at end send to the client the tables
    response_string := "";
    for _, table := range tables {
        response_string += table.Table_name + "; \n";
    }

    fmt.Fprintf(res_writer, "%s", response_string);
}
