SELECT paginaRemitente, fingerprint, count(*)
FROM traking_records
GROUP BY paginaRemitente, fingerprint



SELECT paginaRemitente, count(*)
FROM traking_records
GROUP BY paginaRemitente




MADIAUTOS
/*** OBTERNER LISTA DE LOS RESGISTROS A EDITAR AMBOS CAMPOS ***/
SELECT wp_posts.ID,wp_posts.post_date,wp_postmeta.post_id,wp_postmeta.meta_key,wp_postmeta.meta_value FROM wp_posts,wp_postmeta WHERE wp_posts.post_date < '2018-06-30 23:59:59' AND wp_posts.ID = wp_postmeta.post_id AND wp_postmeta.meta_key LIKE "%feat%" ORDER BY wp_posts.post_date DESC
/*** selecccionar CAMPO POR CAMPO YA QUE SON DIFERRENTES ***/
SELECT wp_posts.ID,wp_posts.post_date,wp_postmeta.post_id,wp_postmeta.meta_key,wp_postmeta.meta_value FROM wp_posts,wp_postmeta WHERE wp_posts.post_date < '2018-06-30 23:59:59' AND wp_posts.ID = wp_postmeta.post_id AND wp_postmeta.meta_key='feat1' ORDER BY wp_posts.post_date DESC
/*** update ***/


UPDATE wp_postmeta AS b
INNER JOIN wp_posts AS g ON b.post_id = g.ID AND g.post_date < '2018-06-30 23:59:59'
SET b.meta_value = 'Si'
WHERE  g.ID = b.post_id AND b.meta_key='_featured'


UPDATE wp_postmeta AS b
INNER JOIN wp_posts AS g ON b.post_id = g.ID AND g.post_date < '2018-06-30 23:59:59'
SET b.meta_value = 'a:1:{s:8:"featured";s:2:"Si";}'
WHERE  g.ID = b.post_id AND b.meta_key='feat1'
