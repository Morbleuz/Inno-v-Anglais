INSERT INTO `liste` (`id`, `theme`) VALUES
(1, 'Vie quotidienne'),
(2, 'Informatique');

INSERT INTO `mot` (`id`, `mot_anglais`, `mot_francais`) VALUES
(1, 'house', 'maison'),
(2, 'keyboard', 'clavier'),
(3, 'computer', 'ordinateur'),
(4, 'mouse', 'souris'),
(5, 'castle', 'château'),
(6, 'tree', 'arbre'),
(7, 'kitchen', 'cuisine'),
(8, 'bedroom', 'chambre'),
(9, 'software', 'logiciel'),
(10, 'swimming pool', 'piscine'),
(11, 'door', 'porte'),
(12, 'light', 'lumière'),
(13, 'monitor', 'moniteur'),
(14, 'graphic card', 'carte graphique');

INSERT INTO `mot_liste` (`mot_id`, `liste_id`) VALUES
(1, 1),
(2, 2),
(4, 2),
(7, 1),
(8, 1),
(9, 2),
(11, 1),
(12, 1),
(13, 2),
(14, 2);

INSERT INTO `test` (`id`, `niveau`, `lier_id`) VALUES
(1, 'Facile', 1),
(3, 'Facile', 2);
