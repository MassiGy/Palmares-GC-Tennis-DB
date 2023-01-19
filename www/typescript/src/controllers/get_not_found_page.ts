import { Request, Response } from "express";


module.exports.get_not_found_page = (req: Request,res: Response) => {
    res.render("404.ejs");
}