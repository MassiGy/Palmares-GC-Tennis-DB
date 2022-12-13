"use strict";
const { render_dashboard } = require("./render_dashboard");
const { get_db_tables } = require("./get_db_tables");
const { get_players_data } = require("./get_players_data");
const { get_grand_slam_data } = require("./get_grand_slam_data");
const { get_participate_data } = require("./get_participate_data");
const { get_not_found_page } = require("./get_not_found_page");
module.exports = {
    render_dashboard,
    get_db_tables,
    get_players_data,
    get_grand_slam_data,
    get_participate_data,
    get_not_found_page,
};
