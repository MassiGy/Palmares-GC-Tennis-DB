package controllers

import (
	"fmt"
	"net/http"
	"sql-project/helpers"
	"strconv"
)

// this is not supposed to be working in production since deleting 
// a player will cause a bad refrencing error in our sql database.
// thus, MySql will reject it and send back an error.
// So if you want to verify this controller, first creat a new user
// then delete it and see if it works.

func Delete_player(res http.ResponseWriter, req *http.Request){

    // parse the req body, 
    err := req.ParseForm()

    // if err, send that back to the client
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }
    
    // make sure that there is an id in the req body
    id, err := strconv.Atoi(req.FormValue("Player_ID"));
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }

    // otherwise, delete the player by id
    err = helpers.Delete_player_by_id(id);
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }


    // redirect to the /players page
    http.Redirect(res, req, "/players", http.StatusSeeOther)
}
