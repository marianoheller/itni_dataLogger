
## CANCEL ENSAYOS WITHOUT CURRENT LASTPINGS
UPDATE ensayo a JOIN ( SELECT id,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diffAux FROM ensayo HAVING diffAux>(5*60) OR diffAux<(-5*60) ) b ON a.id = b.id SET a.t_fin = a.lastPing


mysql --user=root --password=toor --database=inti_datalogger --execute="UPDATE ensayo a JOIN ( SELECT id,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diffAux FROM ensayo HAVING diffAux>(5*60) OR diffAux<(-5*60) ) b ON a.id = b.id SET a.t_fin = a.lastPing"






##update lastPing
UPDATE ensayo a 
JOIN ( 
    SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
    FROM ensayo
    HAVING diff = (
        SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
        FROM ensayo
        HAVING diffAux<(5*60)
        AND diffAux>= 0
        AND t_fin IS NULL
        )
) b 
ON a.id = b.id
SET a.lastPing = a.t_fin