"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const { mysql_connection } = require("../config/mysql.conf");
const { player_table } = require("../constants/player_table");
const { grand_slam_table } = require("../constants/grand_slam_table");
const { participate_table } = require("../constants/participate_table");
module.exports.get_participate_data = (req, res) => {
    let query_string = `
    SELECT DISTINCT * 
    FROM ${player_table.name}
    NATURAL JOIN ${participate_table.name}
    NATURAL JOIN ${grand_slam_table.name}
    ;
  `;
    mysql_connection.query(query_string, (err, data) => {
        if (err)
            res.status(500).render("500.ejs");
        const query_colomns = participate_table.join_colomns;
        const payload = { colomns: query_colomns, data: data, filled: true };
        res.render("dashboard", { payload });
    });
};
