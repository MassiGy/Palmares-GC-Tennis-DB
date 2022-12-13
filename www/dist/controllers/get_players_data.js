"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const { mysql_connection } = require("../config/mysql.conf");
const { player_table } = require("../constants/player_table");
module.exports.get_players_data = (req, res) => {
    let query_string = `
  SELECT DISTINCT * 
  FROM ${player_table.name}
  ;
`;
    mysql_connection.query(query_string, (err, data) => {
        if (err)
            res.status(500).render("500.ejs");
        const query_colomns = player_table.colomns;
        const payload = { colomns: query_colomns, data: data, filled: true };
        res.render("dashboard", { payload });
    });
};
