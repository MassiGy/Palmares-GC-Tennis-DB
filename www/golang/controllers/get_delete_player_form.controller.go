package controllers

import "net/http"

func Get_delete_player_form(res http.ResponseWriter, req * http.Request){
    // just redirect to /delete_player.html so as the file server kicks in
    http.Redirect(res, req, "/delete_player.html", http.StatusSeeOther)
}

