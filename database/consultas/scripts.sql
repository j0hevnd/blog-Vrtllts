-- 1.	Productos más vendidos, por cada producto listar del más vendido al menos vendido.:
-- Código de Producto	Sumatoria total Cantidades 	Sumatoria valor Venta	Sumatoria Total Costo
--

Select sku as 'codigo de producto', count(nombre_item) as 'Sumatoria total Cantidades ', 
SUM(precio_unitario) AS 'Sumatoria valor venta', SUM(costo_unitario) AS 'Sumatoria Total Costo', nombre_item 
from facturacion_detalle group by sku order by count(nombre_item) desc;

-- 2. Ventas generales por Cliente, debe estar ordenado primero por fecha del más antiguo al más nuevo
--    y por cada fecha de venta mayor a menor:
-- 	Fecha Venta Doc Cliente	Nombre Cliente	Consecutivos de venta	Total Venta	Total Cantidad	Total IVA
-- * Los consecutivos deben estar agrupados de la siguiente manera (FACT-1, FACT-2, FACT-3 etc)

SELECT CONCAT(f.fecha_realizacion, ' ', f.hora_realizacion) AS 'Fecha de venta', t.documento AS 'Doc Cliente', 
CONCAT(t.nombre, ' ', t.apellido ) AS 'Nombre Cliente',
CONCAT(f.fact_prefijo,'-', f.fact_consecutivo) AS 'Consecutivos de venta',
SUM(fd.precio_unitario) AS 'Total Venta', COUNT(*) AS 'Total Cantidad',
SUM((fd.iva * fd.cantidad)) as 'Total IVA'
FROM tercero t
INNER JOIN  facturacion f ON t.es_cliente = 1 AND f.id_tercero = t.id_tercero
INNER JOIN facturacion_detalle fd ON f.id_factura = fd.id_factura 
GROUP BY fd.id_factura
ORDER BY f.fecha_realizacion ASC, f.fact_prefijo DESC, f.fact_consecutivo ASC;