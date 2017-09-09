CREATE TABLE film (
  id          INT PRIMARY KEY AUTO_INCREMENT,
  name        VARCHAR(255)  NOT NULL,
  start_date  DATE          NOT NULL,
  end_date    DATE          NOT NULL,
  pg          INT           NOT NULL,
  director    VARCHAR(250)  NOT NULL,
  stars       VARCHAR(2500) NOT NULL,
  genre       VARCHAR(255)  NOT NULL,
  duration    TIME          NOT NULL,
  description VARCHAR(2500) NOT NULL,
  production  VARCHAR(250)  NOT NULL
) DEFAULT CHARACTER SET=utf8;

CREATE TABLE schedule (
  id      INT PRIMARY KEY AUTO_INCREMENT,
  film_id INT  NOT NULL,
  date    DATE NOT NULL
)DEFAULT CHARACTER SET=utf8;

CREATE TABLE session (
  id   INT PRIMARY KEY AUTO_INCREMENT,
  shedule_id INT NOT NULL,
  room_number INT NOT NULL,
  cost INT NOT NULL
)DEFAULT CHARACTER SET=utf8;

