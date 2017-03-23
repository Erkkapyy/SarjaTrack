INSERT INTO kayttaja (name, password) VALUES ('admin', 'admin');
INSERT INTO kayttaja (name, password) VALUES ('pleb', 'pleb');
INSERT INTO sarja (name, published, genre, episodes, description) VALUES ('hellsing ultimate', '1.2.2006', 'toiminta, jännitys, kauhu', 10, 'kuvaus');
INSERT INTO kayttajansarja (kayttaja_id, sarja_name, episodesseen, grade, finished, added) VALUES (1, 'hellsing ultimate', 10, 8.2, true, current_date);

