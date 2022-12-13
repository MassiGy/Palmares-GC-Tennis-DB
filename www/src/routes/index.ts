import express, { Router } from "express";

const router: Router = express.Router();
const controllers = require("../controllers/index");

router.get("/", controllers.render_dashboard);
router.get("/tables", controllers.get_db_tables);
router.get("/tables/all", controllers.get_db_tables);
router.get("/tables/players", controllers.get_players_data);
router.get("/tables/grand_slams", controllers.get_grand_slam_data);
router.get("/tables/participations", controllers.get_participate_data);

router.all(controllers.get_not_found_page);

module.exports = router;
