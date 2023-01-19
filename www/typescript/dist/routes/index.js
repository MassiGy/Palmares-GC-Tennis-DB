"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const router = express_1.default.Router();
const controllers = require("../controllers/index");
router.get("/", controllers.render_dashboard);
router.get("/tables", controllers.get_db_tables);
router.get("/tables/all", controllers.get_db_tables);
router.get("/tables/players", controllers.get_players_data);
router.get("/tables/grand_slams", controllers.get_grand_slam_data);
router.get("/tables/participations", controllers.get_participate_data);
router.all(controllers.get_not_found_page);
module.exports = router;
