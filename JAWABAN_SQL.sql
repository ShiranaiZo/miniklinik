SELECT pasien.id, pasien.nama, COUNT(kunjungan) as total
FROM pasien, kunjungan
WHERE pasien.id = kunjungan.pasien_id
GROUP BY pasien.id
ORDER BY total DESC
LIMIT 5
