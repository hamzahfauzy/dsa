CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE role_routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    route_path VARCHAR(100) NOT NULL,
    CONSTRAINT fk_role_routes_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_user_roles_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_user_roles_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL,
    execute_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin VARCHAR(100) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_hp VARCHAR(100) NOT NULL,
    kelas VARCHAR(100) NOT NULL,
    is_active VARCHAR(100) NOT NULL
);

CREATE TABLE penyakit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(100) NOT NULL,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE gejala (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penyakit_id INT NOT NULL,
    kode VARCHAR(100) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    bobot DOUBLE(11,3) NOT NULL,
    CONSTRAINT fk_gejala_penyakit_id FOREIGN KEY (penyakit_id) REFERENCES penyakit(id) ON DELETE CASCADE
);

CREATE TABLE pilihan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    skor DOUBLE(11,3) NOT NULL
);

CREATE TABLE penilaian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    hasil_cf_id INT DEFAULT NULL,
    hasil_ds_id INT DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_penilaian_hasil_cf_id FOREIGN KEY (hasil_cf_id) REFERENCES penyakit(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_hasil_ds_id FOREIGN KEY (hasil_ds_id) REFERENCES penyakit(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE penilaian_gejala (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penilaian_id INT NOT NULL,
    gejala_id INT DEFAULT NULL,
    pilihan_id INT DEFAULT NULL,
    skor DOUBLE(11,3) DEFAULT NULL,
    CONSTRAINT fk_penilaian_gejala_penilaian_id FOREIGN KEY (penilaian_id) REFERENCES penilaian(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_gejala_pilihan_id FOREIGN KEY (pilihan_id) REFERENCES pilihan(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_gejala_gejala_id FOREIGN KEY (gejala_id) REFERENCES gejala(id) ON DELETE CASCADE
);