CREATE TABLE testimoni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    deskripsi TEXT
);

INSERT INTO role_routes(role_id, route_path) VALUES (2, 'penilaian/report');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'crud/index?table=testimoni');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'testimoni/view');
INSERT INTO role_routes(role_id, route_path) VALUES (2, 'crud/create?table=testimoni');

ALTER TABLE mahasiswa ADD COLUMN status INT DEFAULT 1;