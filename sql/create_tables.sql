CREATE TABLE kayttaja(
  id SERIAL PRIMARY KEY,
  username varchar(50) NOT NULL,
  password varchar(50) NOT NULL
);

CREATE TABLE sarja(
  name varchar(50) PRIMARY KEY,
  published varchar(50),
  genre varchar(50),
  episodes INT NOT NULL,
  description varchar(1000)
);

CREATE TABLE kayttajansarja(
  kayttaja_id INTEGER REFERENCES kayttaja(id),
  sarja_name varchar(50) REFERENCES sarja(name),
  episodesseen INT NOT NULL,
  grade DECIMAL(2,1) NOT NULL,
  finished boolean NOT NULL,
  added DATE
);


