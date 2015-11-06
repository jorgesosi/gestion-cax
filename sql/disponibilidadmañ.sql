select nombre, apellido,celular from CAX.disponibilidad
JOIN CAX.miembro
ON disponibilidad.idmiembro=miembro.idmiembro
WHERE (CURDATE() + INTERVAL 1 DAY) between fechaInicio AND fechaFin;