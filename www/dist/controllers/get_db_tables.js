"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const { mysql_connection } = require("../config/mysql.conf");
module.exports.get_db_tables = (req, res) => {
    let query_string = "SHOW TABLES;";
    mysql_connection.query(query_string, (err, data) => {
        if (err)
            res.status(500).render("500.ejs");
        const query_colomns = ["Table Name"];
        const payload = { colomns: query_colomns, data: data, filled: true };
        res.render("dashboard", { payload });
    });
};
