UPDATE ensayo a 
JOIN ( 
    SELECT id,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diffAux
    FROM ensayo
    HAVING diffAux>(5*60)
    OR diffAux<(-5*60)
) b 
ON a.id = b.id
SET a.t_fin = a.lastPing


mysql --user=[username] --password=[password] --database=[db name] --execute="DELETE FROM tbl_message WHERE DATEDIFF( NOW( ) ,  timestamp ) >=7"