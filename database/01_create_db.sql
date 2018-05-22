CREATE TABLE film (
  id              INT           PRIMARY KEY AUTO_INCREMENT,
  name            VARCHAR(255)  NOT NULL,
  start_date      DATE          NOT NULL,
  end_date        DATE          NOT NULL,
  pg              INT           NOT NULL,
  director        VARCHAR(250)  NOT NULL,
  stars           VARCHAR(2500) NOT NULL,
  genre           VARCHAR(255)  NOT NULL,
  duration        TIME          NOT NULL,
  description     VARCHAR(2500) NOT NULL,
  production      VARCHAR(250)  NOT NULL,
  img_href        VARCHAR(1000) NOT NULL
)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE event (
  id              INT           PRIMARY KEY AUTO_INCREMENT,
  name            VARCHAR(255)  NOT NULL,
  date            DATE          NOT NULL,
  time            TIME          NOT NULL,
  duration        TIME          NOT NULL,
  description     VARCHAR(2500) NOT NULL,
  img_href        VARCHAR(1000) NOT NULL
)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE account (
  id              INT           PRIMARY KEY AUTO_INCREMENT,
  email           VARCHAR(255)  NOT NULL,
  firstname       VARCHAR(255)  NOT NULL,
  lastname        VARCHAR(255)  NOT NULL,
  reg_date        DATE          NOT NULL,
  token           VARCHAR(1000) NOT NULL,
  role            VARCHAR(255)  NOT NULL,
  password        VARCHAR(255)  NOT NULL
)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE hall (
  id              INT           PRIMARY KEY AUTO_INCREMENT,
  name            VARCHAR(255)  NOT NULL,
  seat_count      INT           NOT NULL,
  row_count       INT           NOT NULL
)
  DEFAULT CHARACTER SET = utf8;

CREATE TABLE session (
  id              INT           PRIMARY KEY AUTO_INCREMENT,
  date            DATE          NOT NULL,
  time            TIME          NOT NULL,
  cost            DOUBLE        NOT NULL,
  film_id         INT           NOT NULL,
  hall_id         INT           NOT NULL
)
  DEFAULT CHARACTER SET = utf8;

ALTER TABLE session
  ADD FOREIGN KEY (film_id) REFERENCES film (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE session
  ADD FOREIGN KEY (hall_id) REFERENCES hall (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

CREATE TABLE session_info (
  id              INT               PRIMARY KEY AUTO_INCREMENT,
  seat_number     INT           NOT NULL,
  row             INT           NOT NULL,
  status          VARCHAR(255)  NOT NULL,
  cost            DOUBLE        NOT NULL,
  session_id      INT           NOT NULL
)
  DEFAULT CHARACTER SET = utf8;
ALTER TABLE session_info
  ADD FOREIGN KEY (session_id) REFERENCES session (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

CREATE TABLE ticket (
  id              INT           PRIMARY KEY AUTO_INCREMENT,
  session_info_id INT           NOT NULL,
  account_id      INT           NOT NULL,
  paid            TINYINT(1)    NOT NULL
)
  DEFAULT CHARACTER SET = utf8;
ALTER TABLE ticket
  ADD FOREIGN KEY (session_info_id) REFERENCES session_info (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
ALTER TABLE ticket
  ADD FOREIGN KEY (account_id) REFERENCES account (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

