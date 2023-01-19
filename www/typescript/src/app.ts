import * as dotenv from "dotenv";
dotenv.config({ path: __dirname + "/.env" });

import express, { Express } from "express";
import path from "path";

const app: Express = express();
const ejs_mate = require("ejs-mate");
const PORT: number = Number(process.env.PORT) || 3000;
const apiRoutes = require("./routes/index");

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.engine("ejs", ejs_mate);
app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));
app.use(express.static(path.join(__dirname, "/assets")));

app.use("/", apiRoutes);

app.listen(PORT, () => {
  console.log("Listening on post " + String(PORT));
});
