import { Request, Response } from "express";
const { mysql_connection } = require("../config/mysql.conf");
const { grand_slam_table } = require("../constants/grand_slam_table");

module.exports.get_grand_slam_data = (req: Request, res: Response) => {
  let query_string = `
  SELECT DISTINCT * 
  FROM ${grand_slam_table.name}
  ;
`;

  mysql_connection.query(query_string, (err: Error, data: any) => {
    if (err) res.status(500).render("500.ejs");

    const query_colomns = grand_slam_table.colomns;

    const payload = { colomns: query_colomns, data: data, filled: true };

    res.render("dashboard", { payload });
  });
};
