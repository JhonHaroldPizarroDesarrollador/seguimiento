SELECT paginaRemitente, fingerprint, count(*)
FROM traking_records
GROUP BY paginaRemitente, fingerprint



SELECT paginaRemitente, count(*)
FROM traking_records
GROUP BY paginaRemitente