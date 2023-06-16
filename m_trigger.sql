/* media */

DELIMITER //

CREATE TRIGGER before_insert_media
BEFORE INSERT ON media
FOR EACH ROW
BEGIN
    DECLARE countm INT;
    DECLARE new_mediaID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO countm FROM media;

    -- 生成新的 mediaID
    SET new_mediaID = CONCAT('m', LPAD(countm + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.mediaID = new_mediaID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_insert_media
AFTER INSERT ON media
FOR EACH ROW
BEGIN
    DECLARE countmp INT;
    DECLARE new_librarymediaID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO countmp FROM media_place;

    -- 生成新的 librarymediaID
    SET new_librarymediaID = CONCAT('mp', LPAD(countmp + 1, 4, '0'));

    -- 插入新的 media_place 记录
    INSERT INTO media_place (librarymediaID, mediaID, Lname, number)
    VALUES (new_librarymediaID, NEW.mediaID, 'ntu圖書館', null);

END //

DELIMITER ;

/* media_place */

DELIMITER //

CREATE TRIGGER before_insert_media_place
BEFORE INSERT ON media_place
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_librarymediaID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM media_place;

    -- 生成新的 mediaID
    SET new_librarymediaID = CONCAT('mp', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.librarymediaID = new_librarymediaID;

END //

DELIMITER ;

/* journal */

DELIMITER //

CREATE TRIGGER before_insert_journal
BEFORE INSERT ON journal
FOR EACH ROW
BEGIN
    DECLARE countj INT;
    DECLARE new_journalID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO countj FROM journal;

    -- 生成新的 mediaID
    SET new_journalID = CONCAT('j', LPAD(countj + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.journalID = new_journalID;

END //

DELIMITER ;
DELIMITER //

CREATE TRIGGER after_insert_journal
AFTER INSERT ON journal
FOR EACH ROW
BEGIN
    DECLARE countjp INT;
    DECLARE new_libraryjournalID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO countjp FROM journal_place;

    -- 生成新的 librarymediaID
    SET new_libraryjournalID = CONCAT('jp', LPAD(countjp + 1, 4, '0'));

    -- 插入新的 media_place 记录
    INSERT INTO journal_place (libraryjournalID, journalID, Lname, number)
    VALUES (new_libraryjournalID, NEW.journalID, 'ntu圖書館', null);

END //

DELIMITER ;

/* journal_place */

DELIMITER //

CREATE TRIGGER before_insert_journal_place
BEFORE INSERT ON journal_place
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_libraryjournalID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM journal_place;

    -- 生成新的 mediaID
    SET new_libraryjournalID = CONCAT('jp', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.libraryjournalID = new_libraryjournalID;

END //

DELIMITER ;

/* db */

DELIMITER //

CREATE TRIGGER before_insert_db
BEFORE INSERT ON db
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_databaseID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM db;

    -- 生成新的 mediaID
    SET new_databaseID = CONCAT('db', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.databaseID = new_databaseID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_insert_db
AFTER INSERT ON db
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_buyID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM buy;

    -- 生成新的 buyID
    SET new_buyID = CONCAT('buy', LPAD(count + 1, 4, '0'));

    -- 插入新的记录到 buy 表
    INSERT INTO buy (buyID, databaseID, Lname)
    VALUES (new_buyID, NEW.databaseID, 'ntu圖書館');

END //

DELIMITER ;

/* buy */

DELIMITER //

CREATE TRIGGER before_insert_buy
BEFORE INSERT ON buy
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_buyID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM buy;

    -- 生成新的 buyID
    SET new_buyID = CONCAT('buy', LPAD(count + 1, 4, '0'));

    -- 设置新行的 buyID 列值
    SET NEW.buyID = new_buyID;

END //

DELIMITER ;

/* book */

DELIMITER //

CREATE TRIGGER after_insert_book
AFTER INSERT ON book
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_bookID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM book_place;

    -- 生成新的 bookID
    SET new_bookID = CONCAT('bk', LPAD(count + 1, 4, '0'));

    -- 插入新的 media_place 记录
    INSERT INTO book_place (ISBN, bookID, Lname, number)
    VALUES (NEW.ISBN, new_bookID, 'ntu圖書館', null);

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_update_book
AFTER UPDATE ON book
FOR EACH ROW
BEGIN
    IF NEW.state = '空閒' THEN
        -- 获取符合条件的e_reservation记录
        INSERT INTO b_borrow (libraryID, librarianID, ISBN, duedata, borrowdate, state)
        SELECT libraryID, 'ntnu0001', ISBN, DATE_ADD(CURDATE(), INTERVAL 30 DAY), CURDATE(), '借閱中'
        FROM b_reservation
        WHERE state = '預約成功' AND data = (
            SELECT MIN(data)
            FROM b_reservation
            WHERE ISBN = NEW.ISBN AND state = '預約成功'
        );
        UPDATE book set state = '借閱中' where ISBN = NEW.ISBN;
    END IF;
END //

DELIMITER ;

/* book_place */

DELIMITER //

CREATE TRIGGER before_insert_book_place
BEFORE INSERT ON book_place
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_bookID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM book_place;

    -- 生成新的 mediaID
    SET new_bookID = CONCAT('bk', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.bookID = new_bookID;

END //

DELIMITER ;

/* reader */

DELIMITER //

CREATE TRIGGER before_insert_reader
BEFORE INSERT ON reader
FOR EACH ROW
BEGIN
    DECLARE next_id INT;

    IF NEW.school = 'ntu' THEN
        SELECT COALESCE(MAX(SUBSTRING_INDEX(libraryID, 'ntu', -1)), 0) + 1 INTO next_id
        FROM reader
        WHERE school = 'ntu';
        SET NEW.libraryID = CONCAT('ntu', LPAD(next_id, 4, '0'));
    ELSEIF NEW.school = 'ntnu' THEN
        SELECT COALESCE(MAX(SUBSTRING_INDEX(libraryID, 'ntnu', -1)), 0) + 1 INTO next_id
        FROM reader
        WHERE school = 'ntnu';
        SET NEW.libraryID = CONCAT('ntnu', LPAD(next_id, 4, '0'));
    ELSEIF NEW.school = 'ntust' THEN
        SELECT COALESCE(MAX(SUBSTRING_INDEX(libraryID, 'ntust', -1)), 0) + 1 INTO next_id
        FROM reader
        WHERE school = 'ntust';
        SET NEW.libraryID = CONCAT('ntust', LPAD(next_id, 4, '0'));
    END IF;
END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_insert_reader
AFTER INSERT ON reader
FOR EACH ROW
BEGIN
    INSERT INTO permission (libraryID, queueID, sourcelimit, equiplimit)
    VALUES (NEW.libraryID, NEW.school, 5, 2);
END //

DELIMITER ;

/* b_borrow */

DELIMITER //

CREATE TRIGGER after_insert_b_borrow
BEFORE INSERT ON b_borrow
FOR EACH ROW
BEGIN
    UPDATE book set state = '借閱中' where ISBN = NEW.ISBN;
END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER before_insert_b_borrow
BEFORE INSERT ON b_borrow
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_bbID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM b_borrow;

    -- 生成新的 bbID
    SET new_bbID = CONCAT('bb', LPAD(count + 1, 4, '0'));

    -- 设置新行的 bbID 列值
    SET NEW.bbID = new_bbID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_update_b_borrow
AFTER UPDATE ON b_borrow
FOR EACH ROW
BEGIN
    IF NEW.state = '已過期' THEN
        insert into penalty(librarianID, libraryID, detail, state) 
        value (NEW.librarianID, NEW.libraryID, '遲還書,罰$100', '沒交付');
        UPDATE book set state = '沒還' where ISBN = NEW.ISBN;
    END IF;
    IF NEW.state = '已還書' THEN
        UPDATE book set state = '空閒' where ISBN = NEW.ISBN;
    END IF;
END //

DELIMITER ;

/* e_borrow */

DELIMITER //

CREATE TRIGGER after_insert_e_borrow
BEFORE INSERT ON e_borrow
FOR EACH ROW
BEGIN
    UPDATE equipment set state = '借閱中' where equipID = NEW.equipID;
END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER before_insert_e_borrow
BEFORE INSERT ON e_borrow
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_ebID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM e_borrow;

    -- 生成新的 bbID
    SET new_ebID = CONCAT('eb', LPAD(count + 1, 4, '0'));

    -- 设置新行的 bbID 列值
    SET NEW.ebID = new_ebID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_update_e_borrow
AFTER UPDATE ON e_borrow
FOR EACH ROW
BEGIN
    IF NEW.state = '已過期' THEN
        insert into penalty(librarianID, libraryID, detail, state) 
        value (NEW.librarianID, NEW.libraryID, '遲設施,罰$100', '沒交付');
    END IF;
    IF NEW.state = '已還書' THEN
        UPDATE equipment set state = '空閒' where equipID = NEW.equipID;
    END IF;
END //

DELIMITER ;

/* j_borrow */

DELIMITER //

CREATE TRIGGER after_insert_j_borrow
BEFORE INSERT ON j_borrow
FOR EACH ROW
BEGIN
    UPDATE journal set state = '借閱中' where journalID = NEW.journalID;
END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER before_insert_j_borrow
BEFORE INSERT ON j_borrow
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_jbID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM j_borrow;

    -- 生成新的 bbID
    SET new_jbID = CONCAT('jb', LPAD(count + 1, 4, '0'));

    -- 设置新行的 bbID 列值
    SET NEW.jbID = new_jbID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_update_j_borrow
AFTER UPDATE ON j_borrow
FOR EACH ROW
BEGIN
    IF NEW.state = '已過期' THEN
        insert into penalty(librarianID, libraryID, detail, state) 
        value (NEW.librarianID, NEW.libraryID, '遲雜誌,罰$100', '沒交付');
        UPDATE journal set state = 'miss' where journalID = NEW.journalID;
    END IF;
    IF NEW.state = '已還書' THEN
        UPDATE journal set state = 'Available' where journalID = NEW.journalID;
    END IF;
END //

DELIMITER ;

/* m_borrow */

DELIMITER //

CREATE TRIGGER after_insert_m_borrow
BEFORE INSERT ON m_borrow
FOR EACH ROW
BEGIN
    UPDATE media set state = '借閱中' where mediaID = NEW.mediaID;
END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER before_insert_m_borrow
BEFORE INSERT ON m_borrow
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_mbID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM m_borrow;

    -- 生成新的 bbID
    SET new_mbID = CONCAT('mb', LPAD(count + 1, 4, '0'));

    -- 设置新行的 bbID 列值
    SET NEW.mbID = new_mbID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_update_m_borrow
AFTER UPDATE ON m_borrow
FOR EACH ROW
BEGIN
    IF NEW.state = '已過期' THEN
        insert into penalty(librarianID, libraryID, detail, state) 
        value (NEW.librarianID, NEW.libraryID, '遲媒體,罰$100', '沒交付');
        UPDATE media set state = 'miss' where mediaID = NEW.mediaID;
    END IF;
    IF NEW.state = '已還書' THEN
        UPDATE media set state = 'Available' where mediaID = NEW.mediaID;
    END IF;
END //

DELIMITER ;

/* penalty */

DELIMITER //

CREATE TRIGGER before_insert_penalty
BEFORE INSERT ON penalty
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_penallyID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM penalty;

    -- 生成新的 mediaID
    SET new_penallyID = CONCAT('p', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.penallyID = new_penallyID;

END //

DELIMITER ;

/* equipment */

DELIMITER //

CREATE TRIGGER before_insert_equipment
BEFORE INSERT ON equipment
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_equipID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM equipment;

    -- 生成新的 mediaID
    SET new_equipID = CONCAT('e', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.equipID = new_equipID;

END //

DELIMITER ;
---
DELIMITER //

CREATE TRIGGER after_update_equipment
AFTER UPDATE ON equipment
FOR EACH ROW
BEGIN
    IF NEW.state = '空閒' THEN
        -- 获取符合条件的e_reservation记录
        INSERT INTO e_borrow (libraryID, librarianID, equipID, state)
        SELECT libraryID, 'ntnu0001', equipID, '借閱中'
        FROM e_reservation
        WHERE state = '預約成功' AND date = (
            SELECT MIN(date)
            FROM e_reservation
            WHERE equipID = NEW.equipID AND state = '預約成功'
        );
        UPDATE equipment set state = '借閱中' where equipID = NEW.equipID;
    END IF;
END //

DELIMITER ;

/* recommand */

DELIMITER //

CREATE TRIGGER after_update_manage
AFTER UPDATE ON manage
FOR EACH ROW
BEGIN
    IF NEW.state = '準核' THEN
        -- 将recommend表的数据插入到book表中
        INSERT INTO book (ISBN, title, writer, company, translator, publishDate, edition, subjecthead, language, state)
        SELECT r.ISBN, r.title, r.writer, r.company, r.translator, r.publishDate, r.edition, r.subjecthead, r.language, 'Available'
        FROM recommend r
        WHERE r.recommendID = NEW.recommendID;
    END IF;
END //

DELIMITER ;

/* news */

DELIMITER //

CREATE TRIGGER before_insert_news
BEFORE INSERT ON news
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_newID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM news;

    -- 生成新的 mediaID
    SET new_newID = CONCAT('n', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.newID = new_newID;

END //

DELIMITER ;

