package main

import (
	"database/sql"
	"fmt"
	"net/http"
	"sql-project/controllers"
	"sql-project/database"
)

func main() {

	// declare an empty error message placeholder
	var err error

	// open up a sql connection to our database
	database.Db_handler, err = sql.Open("mysql", database.Mysql_connection_string)
	if err != nil {
		panic(err)
	}

	ping_response := database.Db_handler.Ping()
	if ping_response != nil {
		panic(ping_response)
	}

	fmt.Println("db connected, dbname = " + database.DB_NAME)

	// setup a fileserver with our views
	fileServer := http.FileServer(http.Dir("./views"))
	http.Handle("/", fileServer)

	// setup an http web server with some handler
	http.HandleFunc("/home", controllers.Home_page)
	http.HandleFunc("/tables", controllers.Show_tables_names)
	http.HandleFunc("/grand_slams", controllers.Get_all_grand_slams)

	// setup CRUD API endpoints for the Player table.

	// @Get(/player?id=.) : get one player
	http.HandleFunc("/player", controllers.Get_player)

	// @Get(/add_player_form) : get the add html form
	http.HandleFunc("/add_player_form", controllers.Get_add_player_form)
	// @Post(/player/add) : add a player to db
	http.HandleFunc("/player/add", controllers.Add_player)

	// @Get(/edit_player_form) : get the edit html form
	http.HandleFunc("/edit_player_form", controllers.Get_edit_player_form)
	// @Post(/player/edit) : edit a player from db
	http.HandleFunc("/player/edit", controllers.Edit_player)

	// @Get(/delete_player_form) : get the delete html form
	http.HandleFunc("/delete_player_form", controllers.Get_delete_player_form)
	// @Post(/player/delete) : delete a player from db
	http.HandleFunc("/player/delete", controllers.Delete_player)

	// @Get(/players) : get a relative amount of players data from db.
	http.HandleFunc("/players", controllers.Get_all_players)

	// listen and server
	fmt.Println("server started at localhost:3000")
	err = http.ListenAndServe(":3000", nil)
	if err != nil {
		panic(err)
	}
}
