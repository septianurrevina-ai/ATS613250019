CREATE DATABASE IF NOT EXISTS ATS613250019;
USE ATS613250019;

DROP TABLE IF EXISTS member_019;
CREATE TABLE member_019 (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(34) NOT NULL,
    password VARCHAR(32) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    aktive ENUM('1','0') NOT NULL DEFAULT '1'
);

INSERT INTO member_019 (id, email, password, nama, aktive) VALUES
(1, 'nana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Revina Septianur P', '1');

DROP TABLE IF EXISTS mobil019;
CREATE TABLE mobil019 (
    no_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    nomor_kendaraan VARCHAR(12) NOT NULL,
    jenis_kendaraan ENUM('Sedan','Pickup','Truk','Bemo') NOT NULL,
    pemilik VARCHAR(50) NOT NULL,
    tahun_pembuatan CHAR(4) NOT NULL
);

INSERT INTO mobil019 (no_id, nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) VALUES
(1, 'D 1234 AB', 'Sedan', 'Revina Septianur P', '2020'),
(2, 'D 5678 CD', 'Pickup', 'Al Fanisa Basri', '2019'),
(3, 'D 9012 EF', 'Truk', 'Kelvin', '2018');
