-- 1. Liste des joueuses
/*
SELECT *
FROM P16_Player
WHERE Player_Gender = 'Woman';
*/
-- 2. Liste des joueurs dont le nom contient « vic » ou « ev »
/*
SELECT *
FROM P16_Player
WHERE Player_Last_Name LIKE '%vic%' OR Player_Last_Name LIKE '%ev%';
*/
-- 3. Liste des joueurs ayant gagné un Grand chelem
/*
SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_Gender, Player_Nationality, Result
FROM P16_Player p1 JOIN P16_Participate p2 ON p1.Player_ID = p2.Player_ID
WHERE Result = 'Champion';
*/
-- 4. Nombre de joueurs français
/*
SELECT COUNT(*)
FROM P16_Player
WHERE Player_Nationality = 'France';
*/
-- 5. Liste des joueurs ayant atteint les 1/4 en grand chelem
/*
SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_Gender, Player_Nationality
FROM P16_Player p1 JOIN P16_Participate p2 ON p1.Player_ID = p2.Player_ID
WHERE Result IN ('1/4 Finalist', '1/2 Finalist', 'Runner-up', 'Champion');
*/
-- 6. Liste des Grand Chelem remporté par un joueur et une joueuse de même nationalité
/* Je sais pas trop si ça marche mais ça me semble louche, pour moi ça ne marche pas du tout
SELECT gc.*, Player_First_Name, Player_Last_Name, Player_Gender, Player_Nationality, _Year, Category, Result
FROM P16_Grand_Slam gc JOIN P16_Participate pa ON gc.GC_ID = pa.GC_ID JOIN P16_Player pl ON pa.Player_ID = pl.Player_ID
WHERE Result = 'Champion' AND pa.Player_ID IN  (SELECT p1.Player_ID
                                            FROM P16_Player p1 JOIN P16_Player p2 ON p1.Player_Nationality = p2.Player_Nationality
                                            WHERE p1.Player_Gender = 'Man' AND p2.Player_Gender = 'Woman' );
*/
-- 7. Listes des joueurs ayant participé à un seul GC
/*
SELECT Player_First_Name, Player_Last_Name, Player_Nationality, GC_Name, _Year, Category, Result
FROM P16_Player pl JOIN P16_Participate pa ON pl.Player_ID = pa.Player_ID JOIN P16_Grand_Slam gc ON pa.GC_ID = gc.GC_ID
WHERE pa.Player_ID IN   (SELECT Player_ID
                        FROM P16_Participate
                        GROUP BY Player_ID
                        HAVING COUNT(*) = 1);
*/
-- 8. Résultats des joueurs canadiens
/*
SELECT Player_First_Name, Player_Last_Name, Player_Nationality, GC_Name, _Year, Category, Result
FROM P16_Player pl JOIN P16_Participate pa ON pl.Player_ID = pa.Player_ID JOIN P16_Grand_Slam gc ON pa.GC_ID = gc.GC_ID
WHERE Player_Nationality = 'Canada';
*/
-- 9. Nombre de joueurs par nation
/*
SELECT Player_Nationality, COUNT(*)
FROM P16_Player
GROUP BY Player_Nationality;
*/
-- 10. Joueurs ayant atteint ou gagné au moins 2 finales
/*
SELECT DISTINCT Player_First_Name, Player_Last_Name, Player_Nationality
FROM P16_Player pl JOIN P16_Participate pa ON pl.Player_ID = pa.Player_ID
WHERE pa.Player_ID IN   (SELECT Player_ID
                        FROM P16_Participate
                        WHERE Result IN ('Champion', 'Runner-up')
                        GROUP BY Player_ID
                        HAVING COUNT(*) > 1);
*/
