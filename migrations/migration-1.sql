INSERT INTO roles(id, name) VALUES (2, 'Guest');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'default/*');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'crud/index?table=penilaian');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'crud/delete?table=penilaian');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'penilaian/create');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'penilaian/view');