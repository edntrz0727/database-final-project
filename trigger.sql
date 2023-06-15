/*DELIMITER //

CREATE TRIGGER before_insert_recommend
BEFORE INSERT ON RECOMMEND
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_recomID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM RECOMMEND;

    -- 生成新的 mediaID
    SET new_recomID = CONCAT('r', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.recommendID = new_recomID;

END //

DELIMITER ;

-- 預約設施
DELIMITER //

CREATE TRIGGER before_insert_EquipReserve
BEFORE INSERT ON E_RESERVATIOB
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_reservID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM E_RESERVATIOB;

    -- 生成新的 mediaID
    SET new_reservID = CONCAT('er', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.EreservationID = new_reservID;

END //

DELIMITER ;

-- 預約書
DELIMITER //

CREATE TRIGGER before_insert_BookReserve
BEFORE INSERT ON B_RESERVATIOB
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_reservID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM B_RESERVATIOB;

    -- 生成新的 mediaID
    SET new_reservID = CONCAT('br', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.BreservationID = new_reservID;

END //

DELIMITER ;*/

-- 新增筆記
DELIMITER //

CREATE TRIGGER before_insert_note
BEFORE INSERT ON READHISTORY
FOR EACH ROW
BEGIN
    DECLARE count INT;
    DECLARE new_noteID VARCHAR(20);

    -- 获取已存在的记录数量
    SELECT COUNT(*) INTO count FROM READHISTORY;

    -- 生成新的 mediaID
    SET new_noteID = CONCAT('n', LPAD(count + 1, 4, '0'));

    -- 设置新行的 mediaID 列值
    SET NEW.hisID = new_noteID;

END //

DELIMITER ;