/*INSERT INTO `BOOK` (`ISBN`, `title`, `writer`, `company`, `translator`, `publishDate`, `edition`, `subjecthead`, `language`, `state`) VALUES
	("123", "test", "test", "test", "test", "test", "test", "test", "test", "test"),
	("test2", "test2", "test2", "test2", "test2", "test2", "test2", "test2", "test2", "test2");

INSERT INTO `READER` (`libraryID`, `studentID`, `name`, `school`, `password`,  `phone`, `address`, `email`) VALUES
	("1111111", "4056951D", "tom", "NTNU", "123456", "0984521", "123456", "123@123");*/

INSERT INTO `LIBRARY` (`Lname`, `school`, `address`, `phone`, `url`) VALUES
	("Gongguan", "NTNU", "AAABBB", "0277495687", "www.ntnu.edu.tw");

INSERT INTO `EQUIPMENT` (`equipID`, `name`, `Lname`, `state`) VALUES
	("56456", "roomA", "GongGuan", "free");