CREATE TABLE pembobotan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    gejala_id INT NOT NULL,
    gejala_pembanding_id INT NOT NULL,
    skor DOUBLE(11,3) NOT NULL
);

INSERT INTO roles(id, name) VALUES (3, 'Pakar');
INSERT INTO role_routes(role_id, route_path) VALUES (3, 'default/*');
INSERT INTO role_routes(role_id, route_path) VALUES (3, 'pembobotan/index');
INSERT INTO role_routes(role_id, route_path) VALUES (3, 'pembobotan/create');
INSERT INTO role_routes(role_id, route_path) VALUES (3, 'pembobotan/delete');