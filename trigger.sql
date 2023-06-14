DELIMITER //

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