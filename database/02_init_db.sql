INSERT INTO film(name, start_date, end_date, pg, director, stars, genre, duration, description, production, img_href)
VALUES (
  "Социальная сеть",
  "2014-01-01",
  "2020-01-01",
  12,
  "Дэвид Финчер",
  "Джесси Айзенберг, Эндрю Гарфилд, Джастин Тимберлэйк, Арми Хаммер, Макс Мингелла, Рашида Джонс, Бренда Сонг, Руни Мара, Брайан Бартер, Джозеф Маццелло",
  "Драма",
  "01:56:00",
  "В фильме рассказывается история создания одной из самых популярных в Интернете социальных сетей — Facebook. Оглушительный успех этой сети среди пользователей по всему миру навсегда изменил жизнь студентов-однокурсников гарвардского университета, которые основали ее в 2004 году и за несколько лет стали самыми молодыми мультимиллионерами в США.",
  "США",
  "http://www.obzorkino.tv/wp-content/gallery/socialnetwork/poster.jpg"
);

INSERT INTO film(name, start_date, end_date, pg, director, stars, genre, duration, description, production, img_href)
VALUES (
  "Умница Уилл Хантинг",
  "2012-01-01",
  "2018-01-01",
  16,
  "Гас Ван Сент",
  "Мэтт Дэймон, Робин Уильямс, Бен Аффлек, Стеллан Скарсгард, Джон Майтон, Рэйчел Маджоровски, Коллин МакКоли, Кейси Аффлек, Коул Хаузер, Мэтт Мерсье",
  "Драма",
  "02:06:00",
  "Уилл Хантинг — 20-летний вундеркинд из Бостона, который то и дело ввязывается в неприятные истории. И когда полиция арестовывает его за очередную драку, профессор математики берет его под свою опеку, но при одном условии: Уилл должен пройти курс психотерапии. Сеансы «перевоспитания», начавшиеся с недоверия, постепенно перерастают в дружбу между Уиллом и его наставником.",
  "США",
  "https://www.film.ru/sites/default/files/movies/posters/Good-Will-Hunting-4.jpg"
);

INSERT INTO account(email, firstname, lastname, reg_date, token, role, password)
VALUES (
  "admin@admin.ru",
  "admin",
  "admin",
  "2017-01-01",
  "812542c4-fcdc-491c-99e5-3f4bf270431f",
  "ADMIN",
  "d033e22ae348aeb5660fc2140aec35850c4da997"
);

INSERT INTO event(name, date, time, duration, description, img_href)
VALUES (
  "Стендап Данилы Поперечного",
  "2018-04-30",
  "20:00:00",
  "01:00:00",
  "После продолжительного перерыва, Поперечный возвращается на сцену стендап комедии со своей новой программой и вновь отправляется в тур по городам России, СНГ и Прибалтики.
Тур охватит 31 город, в том числе большие выступления в Москве (Крокус Сити Холл) и Санкт-Петербурге (Ледовый Дворец).
Свежая порция чернухи, сарказма, нарушений табу и отборной ненависти настаивались для вас больше года. Как крайне вонючий, но крайне дорогой сыр, Поперечный возвращается с крайне специфической программой, которая придется по вкусу далеко не каждому. Однако, пропускать это событие — все равно, что оскорблять чувства верующих. Верующих в то, что однажды Поперечный вернётся в их город с новыми шутками…",
  "https://pp.userapi.com/c847121/v847121264/33614/uvw7wuRUow0.jpg"
);

INSERT INTO event(name, date, time, duration, description, img_href)
VALUES (
  "КАРАВАДЖО: ДУША И КРОВЬ",
  "2018-07-22",
  "19:00:00",
  "01:35:00",
  "«Караваджо: Душа и кровь» — увлекательный фильм-выставка, посвящённый творчеству и судьбе великого художника Микеланджело Меризи да Караваджо. Повествование в фильме ведётся из крупнейших музеев Италии, где собрана уникальная коллекция работ реформатора. В ленте представлены картины «Мальчик, укушенный ящерицей», «Больной Вакх», «Призвание апостола Матфея», «Юдифь и Олоферн», «Медуза», «Давид с головой Голиафа», «Семь деяний милосердия». При этом создатели фильма не только раскрывают тайны творчества Караваджо, но также ярко иллюстрируют ключевые моменты биографии великого художника, который навсегда изменил историю европейского искусства.",
  "https://scontent-frt3-2.cdninstagram.com/vp/b3411585e17d956258350015b497849e/5B4DF9A4/t51.2885-15/e35/27880254_1595519680564080_3851489932455444480_n.jpg"
);

INSERT INTO hall(name, seat_count, row_count)
VALUES ("зал 1", 16, 4);

INSERT INTO session(date, time, film_id, hall_id)
VALUES ("2018-05-12", "10:00:00", 1, 1);
INSERT INTO session(date, time, film_id, hall_id)
VALUES ("2018-05-12", "13:00:00", 1, 1);
INSERT INTO session(date, time, film_id, hall_id)
VALUES ("2018-05-09", "16:00:00", 1, 1);
INSERT INTO session(date, time, film_id, hall_id)
VALUES ("2018-05-09", "19:00:00", 1, 1);
INSERT INTO session(date, time, film_id, hall_id)
VALUES ("2018-05-09", "22:00:00", 1, 1);

INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (1, 1, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (2, 1, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (3, 1, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (4, 1, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (1, 2, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (2, 2, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (3, 2, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (4, 2, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (1, 3, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (2, 3, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (3, 3, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (4, 3, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (1, 4, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (2, 4, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (3, 4, 'FREE', 100, 1);
INSERT INTO session_info(seat_number, row, status, cost, session_id)
VALUES (4, 4, 'FREE', 100, 1);