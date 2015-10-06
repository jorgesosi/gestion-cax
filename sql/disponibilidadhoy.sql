select nombre, apellido,celular from CAX.disponibilidad
JOIN CAX.miembro
ON disponibilidad.idmiembro=miembro.idmiembro
WHERE CURDATE() between fechaInicio AND fechaFin;