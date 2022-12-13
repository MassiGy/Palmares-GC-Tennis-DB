"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
module.exports.render_dashboard = (req, res) => {
    const payload = { colomns: null, data: null, filled: false };
    res.render("dashboard", { payload });
};
