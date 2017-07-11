/* Final Project, Gabriel Popa, Deliverable 5e:
Produce a list containing the street and city of all properties that have been rented at least once.
*/

SELECT PROP_T.PROP_STREET, PROP_T.PROP_CITY
FROM PROP_T, RENTAL_AGREEMENT_T
WHERE PROP_T.PROP_ID = RENTAL_AGREEMENT_T.PROP_ID
GROUP BY PROP_T.PROP_ID 
HAVING COUNT(RENTAL_AGREEMENT_T.PROP_ID) > 0;


/* OUTPUT FROM ABOVE QUERY:


mysql> SOURCE FINAL_PROJECT_QUERY_DELIVERABLE5E.SQL;
+-------------------+--------------+
| PROP_STREET       | PROP_CITY    |
+-------------------+--------------+
| 10 Any Street     | Waterville   |
| 5 Grove Street    | North Conway |
| 100 Rte 12        | Lincoln      |
| Rte 16            | Jackson      |
| 20 Main St        | Falmouth     |
| 15 Central Street | Falmouth     |
| 5 Seapit Road     | Falmouth     |
| 10 Harbor Ave     | Falmouth     |
| 70 Galloupes Pt.  | Swampscott   |
+-------------------+--------------+
9 rows in set (0.14 sec)


*/