package controllers

import (
	"fmt"
	"net/http"
	"sql-project/helpers"
)





func Add_player(res http.ResponseWriter, req *http.Request){

    // parse the post request form data
    err := req.ParseForm();
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }


    // add our data as a new player to the database
    err = helpers.Insert_player(req);
    if err != nil {
        fmt.Fprintf(res, err.Error())
        return
    }

    // redirect to /players
    http.Redirect(res, req, "/players", http.StatusSeeOther)
}
