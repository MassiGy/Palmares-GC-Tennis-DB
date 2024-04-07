package controllers

import "net/http"





func Get_add_player_form(res http.ResponseWriter, req * http.Request){
    // just redirect to /add_player.html so as the file server kicks in
    http.Redirect(res, req, "/add_player.html", http.StatusSeeOther)
}
