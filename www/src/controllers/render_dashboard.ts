import { Express, Request, Response } from "express";

module.exports.render_dashboard = (req: Request, res: Response) => {
  
  const payload = { colomns: null, data: null, filled: false };

  res.render("dashboard", { payload });
};
