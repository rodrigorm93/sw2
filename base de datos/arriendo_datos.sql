-- usuarios
INSERT INTO `users` (`id`, `rut`, `nombre`, `apellido`, `email`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '19.344.212-2', 'Boris', 'Mora', 'admin@ucm.cl', '$2y$10$aIZ6WaeH7CgP/EjyxmS3dOr20aG9cRsgnUMiXrBlyUZgBI80R6WxC', 'admin', 'wauQqwpd2JHTjS2zTKCONB5v8nA6n9kLdGKpiC4caQUCZyj0RWKSCMD79TKa', '2017-10-16 21:51:12', '2017-10-16 21:51:12'),
(2, '17.324.545-6', 'Flaco', 'Renegado', 'cliente@ucm.cl', '$2y$10$8fxHUBybt8ux4zVJ7eQmHOuZvLFJbilnnEMT65ei2Lw8dtqqN/qCS', 'cliente', '7uv9l8hMlDYDGl7k1CbvNwRckgD0Xivx0uOyOyZdXZeGWjNuzDZKTE1xVe7O', '2017-10-16 21:54:59', '2017-10-16 21:54:59'),
(3, '18938323-5', 'Fernanda', 'Fernandez', 'secretaria@ucm.cl', '$2y$10$tAoGISY0s4T0jikX4JCQpOBEGMDODSpmC34bDsMdenNU9eLcQ6aBy', 'secretaria', NULL, '2017-10-16 21:55:50', '2017-10-16 21:55:50'),
(5, '172232323-2', 'Constanza', 'Contreras', 'secretaria2@ucm.cl', '$2y$10$G9AAb3zvRTJd3mSQaL9Tv.dY15n6hwpi1DjstN882WEVcZNBX49jy', 'secretaria', NULL, '2017-10-18 04:03:02', '2017-10-18 04:03:02'),
(7, '1832832324-5', 'Alfonso', 'Patamala', 'cliente4@ucm.cl', '$2y$10$1Nx0CdeN4yMYKEg6vCyjgev0PxA6N63iIXsSUh8b8uKpOfJQoGkMa', 'cliente', NULL, '2017-10-18 05:04:06', '2017-10-18 05:04:06'),
(8, '1734234234-5', 'Susana', 'Castillo', 'cliente2@ucm.cl', '$2y$10$oy5hmF1Fe/6qo5By742VweZrk.v9wvF5MOO7XqR0tgPIFSvJ0mz8u', 'cliente', NULL, '2017-10-18 18:01:18', '2017-10-18 18:01:18'),
(9, '173626363-k', 'Pedro', 'Perez', 'cliente3@ucm.cl', '$2y$10$/IG1.odVPfrb1wXauGNT7.RIMMdaEDwkQdQlU1YyOkQzJy7E5FisG', 'cliente', NULL, '2017-10-18 18:03:40', '2017-10-18 18:03:40');



-- scretaria
INSERT INTO `secretaria` (`id_secretaria`, `anuncios_pend`) VALUES
(3, 2),
(5, 2);



--clientes
INSERT INTO `cliente` (`id_cliente`) VALUES
(2),
(7),
(8),
(9);



--contactos
INSERT INTO `contacto` (`id`, `medio`, `contacto`) VALUES
(5, 'facebook', 'https://www.facebook.com/ccontreras'),
(5, 'telefono', '887323273283'),
(7, 'facebook', 'https://www.facebook.com/apatamala'),
(7, 'telefono', '8556y3534543'),
(8, 'facebook', 'https://www.facebook.com/scasdsd'),
(8, 'telefono', '94238428374823'),
(9, 'facebook', 'https://www.facebook.com/pperez'),
(9, 'telefono', '9321931298424');