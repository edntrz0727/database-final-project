/* reader */

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntnu0001","41071227H","SAStommy","ntnu","43129108ta","0912345678","ntnudrom1","41071227H@gapps.ntnu.edu.tw");
INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntnu0002","41147106S","cs0001","ntnu","12345678","0987654321","ntnudrom7","41147106S@gapps.ntnu.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntu0003","41123456S","John","ntu","87654321","0912345678","ntudrom2","41123456S@gapps.ntnu.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntust0004","41134567S","Emma","ntust","98765432","0987654321","ntustdrom3","41134567S@gapps.ntust.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntu0005","41145678S","Daniel","ntu","23456789","0912345678","ntudrom4","41145678S@gapps.ntu.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntust0006","41156789S","Olivia","ntust","34567890","0987654321","ntustdrom5","41156789S@gapps.ntust.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntu0007","41167890S","William","ntu","45678901","0912345678","ntudrom6","41167890S@gapps.ntu.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntnu0008","41178901S","Sophia","ntnu","56789012","0987654321","ntnudrom7","41178901S@gapps.ntnu.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntnu0009","41189012S","James","ntnu","67890123","0912345678","ntnudrom8","41189012S@gapps.ntnu.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntust0010","41190123S","Ava","ntust","78901234","0987654321","ntustdrom9","41190123S@gapps.ntnust.edu.tw");

INSERT INTO `reader`(`libraryID`, `studentID`, `name`, `school`, `password`, `phone`, `address`, `email`) 
VALUES ("ntu0011","41201234S","Liam","ntu","89012345","0912345678","ntudrom10","41201234S@gapps.ntu.edu.tw");


/* librarian */

INSERT INTO `librarian`(`librarianID`, `name`, `school`, `position`, `password`, `phone`, `address`, `email`, `salary`) 
VALUES ("ntnu0001","SAStommy","ntnu","receptioner", "43129108ta", "0912345678","ntnudrom1","41071227H@gapps.ntnu.edu.tw",20000);
INSERT INTO `librarian`(`librarianID`, `name`, `school`, `position`, `password`, `phone`, `address`, `email`, `salary`) 
VALUES ("ntnu0002","cs0001","ntnu","receptioner", "12345678", "0987654321","ntnudrom7","41147106S@gapps.ntnu.edu.tw",20000);

/* book */
INSERT IGNORE INTO book (ISBN, title, writer, company, translator, publishDate, edition, subjecthead, language, state)
VALUES
('9780596009205', 'Head First Design Patterns', 'Eric Freeman, Elisabeth Robson, Bert Bates, Kathy Sierra', 'OReilly Media', NULL, '2004-10-25', '1st Edition', 'Software Engineering', 'English', 'Available'),
('9780132350884', 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'Prentice Hall', NULL, '2008-08-11', '1st Edition', 'Software Development', 'English', 'Available'),
('9780134276715', 'The Pragmatic Programmer: Your Journey to Mastery', 'Andrew Hunt, David Thomas', 'Addison-Wesley Professional', NULL, '2019-09-20', '20th Anniversary Edition', 'Software Engineering', 'English', 'Available'),
('9780596517748', 'JavaScript: The Good Parts', 'Douglas Crockford', 'OReilly Media', NULL, '2008-05-01', '1st Edition', 'Web Development', 'English', 'Available'),
('9780321714114', 'Effective Java', 'Joshua Bloch', 'Addison-Wesley Professional', NULL, '2008-05-28', '2nd Edition', 'Java Programming', 'English', 'Available'),
('9780134685991', 'Refactoring: Improving the Design of Existing Code', 'Martin Fowler', 'Addison-Wesley Professional', NULL, '2018-10-29', '2nd Edition', 'Software Engineering', 'English', 'Available'),
('9781449325862', 'Learning Python', 'Mark Lutz', "OReilly Media", NULL, '2013-06-27', '5th Edition', 'Python Programming', 'English', 'Available'),
('9780132350881', 'Cracking the Coding Interview', 'Gayle Laakmann McDowell', 'CareerCup', NULL, '2015-07-01', '6th Edition', 'Interview Preparation', 'English', 'Available'),
('9781593276034', 'Eloquent JavaScript: A Modern Introduction to Programming', 'Marijn Haverbeke', 'No Starch Press', NULL, '2014-12-14', '2nd Edition', 'Web Development', 'English', 'Available'),
('9781491950357', 'Python Crash Course: A Hands-On, Project-Based Introduction to Programming', 'Eric Matthes', 'No Starch Press', NULL, '2019-05-06', '2nd Edition', 'Python Programming', 'English', 'Available'),
('9780135957059', 'Data Structures and Algorithms in Python', 'Michael T. Goodrich, Roberto Tamassia, Michael H. Goldwasser', 'Wiley', NULL, '2021-05-12', '1st Edition', 'Computer Science', 'English', 'Available'),
('9781492041510', 'Hands-On Machine Learning with Scikit-Learn, Keras, and TensorFlow', 'Aurélien Géron', "OReilly Media", NULL, '2019-09-19', '2nd Edition', 'Machine Learning', 'English', 'Available'),
('9781593275846', 'Automate the Boring Stuff with Python', 'Al Sweigart', 'No Starch Press', NULL, '2015-04-14', '2nd Edition', 'Python Programming', 'English', 'Available'),
('9780262033848', 'Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein', 'MIT Press', NULL, '2009-07-31', '3rd Edition', 'Computer Science', 'English', 'Available'),
('9780262533058', 'Deep Learning', 'Ian Goodfellow, Yoshua Bengio, Aaron Courville', 'MIT Press', NULL, '2016-11-18', '1st Edition', 'Deep Learning', 'English', 'Available'),
('9780134123837', 'Artificial Intelligence: A Modern Approach', 'Stuart Russell, Peter Norvig', 'Pearson', NULL, '2016-12-16', '3rd Edition', 'Artificial Intelligence', 'English', 'Available'),
('9780262039420', 'The Elements of Statistical Learning: Data Mining, Inference, and Prediction', 'Trevor Hastie, Robert Tibshirani, Jerome Friedman', 'Springer', NULL, '2016-06-17', '2nd Edition', 'Statistical Learning', 'English', 'Available'),
('9780262043274', 'Reinforcement Learning: An Introduction', 'Richard S. Sutton, Andrew G. Barto', 'MIT Press', NULL, '2018-11-08', '2nd Edition', 'Reinforcement Learning', 'English', 'Available'),
('9780262035613', 'Pattern Recognition and Machine Learning', 'Christopher M. Bishop', 'Springer', NULL, '2006-08-16', '1st Edition', 'Pattern Recognition', 'English', 'Available'),
('9781788839122', 'Mastering Ethereum', 'Andreas M. Antonopoulos, Gavin Wood', 'Packt Publishing', NULL, '2018-07-25', '1st Edition', 'Blockchain', 'English', 'Available'),
('9780262537568', 'Introduction to the Theory of Computation', 'Michael Sipser', 'MIT Press', NULL, '2012-02-22', '3rd Edition', 'Theory of Computation', 'English', 'Available'),
('9780262533059', 'Speech and Language Processing', 'Daniel Jurafsky, James H. Martin', 'Pearson', NULL, '2019-11-01', '3rd Edition', 'Natural Language Processing', 'English', 'Available'),
('9780262039246', 'Data Science for Business', 'Foster Provost, Tom Fawcett', 'MIT Press', NULL, '2013-07-29', '1st Edition', 'Data Science', 'English', 'Available'),
('9780596516178', 'Learning Perl', 'Randal L. Schwartz, Tom Phoenix, brian d foy', "OReilly Media", NULL, '2020-04-29', '8th Edition', 'Perl Programming', 'English', 'Available'),
('9781617292231', 'Grokking Algorithms: An Illustrated Guide for Programmers and Other Curious People', 'Aditya Bhargava', 'Manning Publications', NULL, '2016-05-25', '1st Edition', 'Algorithms', 'English', 'Available'),
('9780137135590', 'Operating System Concepts', 'Abraham Silberschatz, Peter B. Galvin, Greg Gagne', 'Wiley', NULL, '2008-07-24', '8th Edition', 'Operating Systems', 'English', 'Available'),
('9780262043731', 'Computer Networking: A Top-Down Approach', 'James F. Kurose, Keith W. Ross', 'Pearson', NULL, '2016-09-05', '7th Edition', 'Computer Networking', 'English', 'Available'),
('9780262033849', 'Introduction to the Theory of Computation', 'Michael Sipser', 'Cengage Learning', NULL, '2012-02-22', '3rd Edition', 'Theory of Computation', 'English', 'Available'),
('9781119533202', 'Python for Data Analysis', 'Wes McKinney', 'OReilly Media', NULL, '2017-09-27', '2nd Edition', 'Data Analysis', 'English', 'Available'),
('9780321812186', 'C++ Primer', 'Stanley B. Lippman, Josée Lajoie, Barbara E. Moo', 'Addison-Wesley Professional', NULL, '2012-08-06', '5th Edition', 'C++ Programming', 'English', 'Available'),
('9781593279288', 'Learn Python 3 the Hard Way', 'Zed A. Shaw', 'Addison-Wesley Professional', NULL, '2017-06-26', '1st Edition', 'Python Programming', 'English', 'Available'),
('9780321988232', 'Algorithms', 'Robert Sedgewick, Kevin Wayne', 'Addison-Wesley Professional', NULL, '2014-03-10', '4th Edition', 'Algorithms', 'English', 'Available'),
('9781491962299', 'Django for Beginners', 'William S. Vincent', 'Independently published', NULL, '2019-05-01', '1st Edition', 'Web Development', 'English', 'Available'),
('9781617295188', 'Deep Learning with PyTorch', 'Vishnu Subramanian', 'Manning Publications', NULL, '2020-11-23', '1st Edition', 'Deep Learning', 'English', 'Available'),
('9781617295560', 'Hands-On SQL', 'Namir Clement Shammas', 'Manning Publications', NULL, '2020-11-23', '1st Edition', 'SQL', 'English', 'Available'),
('9781617296185', 'Machine Learning Engineering', 'Andriy Burkov', 'Manning Publications', NULL, '2021-07-07', '1st Edition', 'Machine Learning', 'English', 'Available'),
('9781617297458', 'Grokking Artificial Intelligence Algorithms', 'Rishal Hurbans', 'Manning Publications', NULL, '2022-04-26', '1st Edition', 'Artificial Intelligence', 'English', 'Available'),
('9781788839962', 'Mastering Pandas for Finance', 'Michael Heydt', 'Packt Publishing', NULL, '2022-01-27', '1st Edition', 'Data Analysis', 'English', 'Available'),
('9781119363716', 'AWS Certified Solutions Architect Study Guide: Associate SAA-C02 Exam', 'Ben Piper, David Clinton', 'Sybex', NULL, '2020-03-13', '3rd Edition', 'Amazon Web Services', 'English', 'Available'),
('9781789955750', 'Hands-On Docker for Microservices with Python', 'Pankaj Sharma', 'Packt Publishing', NULL, '2019-08-29', '1st Edition', 'Docker', 'English', 'Available'),
('9781119590688', 'R for Data Science', 'Hadley Wickham, Garrett Grolemund', 'Wiley', NULL, '2016-12-29', '1st Edition', 'Data Science', 'English', 'Available'),
('9781491954386', 'Fluent Python', 'Luciano Ramalho', 'OReilly Media', NULL, '2015-08-20', '1st Edition', 'Python Programming', 'English', 'Available'),
('9781449331818', 'Learning JavaScript', 'Ethan Brown', 'OReilly Media', NULL, '2012-07-13', '3rd Edition', 'JavaScript', 'English', 'Available'),
('9781118907443', 'Blockchain Basics', 'Daniel Drescher', 'Wiley', NULL, '2017-11-20', '1st Edition', 'Blockchain', 'English', 'Available'),
('9781491989388', 'Natural Language Processing with PyTorch', 'Delip Rao, Brian McMahan', 'OReilly Media', NULL, '2019-07-16', '1st Edition', 'Natural Language Processing', 'English', 'Available'),
('9781593279288', 'Learn Python 3 the Hard Way', 'Zed A. Shaw', 'Addison-Wesley Professional', NULL, '2017-06-26', '1st Edition', 'Python Programming', 'English', 'Available'),
('9780321988232', 'Algorithms', 'Robert Sedgewick, Kevin Wayne', 'Addison-Wesley Professional', NULL, '2014-03-10', '4th Edition', 'Algorithms', 'English', 'Available'),
('9781491962299', 'Django for Beginners', 'William S. Vincent', 'Independently published', NULL, '2019-05-01', '1st Edition', 'Web Development', 'English', 'Available'),
('9781617295188', 'Deep Learning with PyTorch', 'Vishnu Subramanian', 'Manning Publications', NULL, '2020-11-23', '1st Edition', 'Deep Learning', 'English', 'Available'),
('9781617295560', 'Hands-On SQL', 'Namir Clement Shammas', 'Manning Publications', NULL, '2020-11-23', '1st Edition', 'SQL', 'English', 'Available'),
('9781617296185', 'Machine Learning Engineering', 'Andriy Burkov', 'Manning Publications', NULL, '2021-07-07', '1st Edition', 'Machine Learning', 'English', 'Available'),
('9781617297458', 'Grokking Artificial Intelligence Algorithms', 'Rishal Hurbans', 'Manning Publications', NULL, '2022-04-26', '1st Edition', 'Artificial Intelligence', 'English', 'Available'),
('9781788839962', 'Mastering Pandas for Finance', 'Michael Heydt', 'Packt Publishing', NULL, '2022-01-27', '1st Edition', 'Data Analysis', 'English', 'Available'),
('9781119363716', 'AWS Certified Solutions Architect Study Guide: Associate SAA-C02 Exam', 'Ben Piper, David Clinton', 'Sybex', NULL, '2020-03-13', '3rd Edition', 'Amazon Web Services', 'English', 'Available'),
('9781789955750', 'Hands-On Docker for Microservices with Python', 'Pankaj Sharma', 'Packt Publishing', NULL, '2019-08-29', '1st Edition', 'Docker', 'English', 'Available'),
('9781119590688', 'R for Data Science', 'Hadley Wickham, Garrett Grolemund', 'Wiley', NULL, '2016-12-29', '1st Edition', 'Data Science', 'English', 'Available'),
('9781491954386', 'Fluent Python', 'Luciano Ramalho', 'OReilly Media', NULL, '2015-08-20', '1st Edition', 'Python Programming', 'English', 'Available'),
('9781449331818', 'Learning JavaScript', 'Ethan Brown', 'OReilly Media', NULL, '2012-07-13', '3rd Edition', 'JavaScript', 'English', 'Available'),
('9781118907443', 'Blockchain Basics', 'Daniel Drescher', 'Wiley', NULL, '2017-11-20', '1st Edition', 'Blockchain', 'English', 'Available'),
('9781491989388', 'Natural Language Processing with PyTorch', 'Delip Rao, Brian McMahan', 'OReilly Media', NULL, '2019-07-16', '1st Edition', 'Natural Language Processing', 'English', 'Available');

/* b_borrow */

INSERT INTO `b_borrow`(`bbID`, `libraryID`, `librarianID`, `ISBN`, `state`) VALUES ('b1','ntnu0001','ntnu0002','9780134123837', '借閱中');

/* penallty */

INSERT INTO `penalty`(`penallyID`, `librarianID`, `libraryID`, `detail`, `state`) VALUES ('p1','ntnu0001','ntnu0002','遲還書,罰$100','沒交付');
INSERT INTO `penalty`(`penallyID`, `librarianID`, `libraryID`, `detail`, `state`) VALUES ('p2','ntnu0002','ntnu0001','遲還書,罰$100','沒交付');


/* queue */

INSERT INTO `queue`(`queueID`, `ntu`, `ntnu`, `ntust`) VALUES ('ntu',3,1,2);
INSERT INTO `queue`(`queueID`, `ntu`, `ntnu`, `ntust`) VALUES ('ntust',2,1,3);
INSERT INTO `queue`(`queueID`, `ntu`, `ntnu`, `ntust`) VALUES ('ntnu',2,3,1);
INSERT INTO `queue`(`queueID`, `ntu`, `ntnu`, `ntust`) VALUES ('penalty',1,1,1);
INSERT INTO `queue`(`queueID`, `ntu`, `ntnu`, `ntust`) VALUES ('special',4,4,4);

/* permission */

INSERT INTO `permission`(`libraryID`, `queueID`, `sourcelimit`, `equiplimit`) VALUES ('ntnu0001','special',5,2);
INSERT INTO `permission`(`libraryID`, `queueID`, `sourcelimit`, `equiplimit`) VALUES ('ntnu0002','ntnu',5,2);
INSERT INTO `permission`(`libraryID`, `queueID`, `sourcelimit`, `equiplimit`) VALUES ('ntust0010','ntnu',5,2);
INSERT INTO `permission`(`libraryID`, `queueID`, `sourcelimit`, `equiplimit`) VALUES ('ntu0011','ntu',5,2);
INSERT INTO `permission`(`libraryID`, `queueID`, `sourcelimit`, `equiplimit`) VALUES ('ntnu009','penalty',5,2);

/* library */

INSERT INTO `library`(`Lname`, `school`, `address`, `phone`, `url`) VALUES ('ntu圖書館','ntu','106台北市大安區羅斯福路四段1號','02233663366','https://www.lib.ntu.edu.tw/en');
INSERT INTO `library`(`Lname`, `school`, `address`, `phone`, `url`) VALUES ('ntust圖書館','ntust','106台北市大安區基隆路四段43號','0227376195','https://library.ntust.edu.tw/home.php');
INSERT INTO `library`(`Lname`, `school`, `address`, `phone`, `url`) VALUES ('ntnu大安圖書館','ntnu','106台北市大安區和平東路一段129號','0277345235','http://www.lib.ntnu.edu.tw/');
INSERT INTO `library`(`Lname`, `school`, `address`, `phone`, `url`) VALUES ('ntnu公館圖書館','ntnu','116台北市文山區汀州路四段88號','0277496889','http://www.lib.ntnu.edu.tw/index.jsp');

/* equipment */

INSERT INTO `equipment`(`equipID`, `name`, `Lname`, `state`) VALUES ('e1','台大自修室','ntu圖書館','空閒');
INSERT INTO `equipment`(`equipID`, `name`, `Lname`, `state`) VALUES ('e2','台科大自修室','ntust圖書館','空閒');
INSERT INTO `equipment`(`equipID`, `name`, `Lname`, `state`) VALUES ('e3','台師大本部自修室','ntnu大安圖書館','空閒');
INSERT INTO `equipment`(`equipID`, `name`, `Lname`, `state`) VALUES ('e4','台師大公館自修室','ntnu公館圖書館','空閒');

/* recommand */

INSERT INTO `recommend`(`recommendID`, `libraryID`, `ISBN`, `title`, `writer`, `company`, `translator`, `publishDate`, `edition`, `subjecthead`, `language`) VALUES ('r0001','ntnu0002','978543234','data analysis','ABC',0,0,0,0,0,0);

/* manage */

INSERT INTO `manage`(`recommendID`, `librarianID`, `state`, `reason`, `senddate`) VALUES ('r0001','ntnu0001','沒審核', 0, '2018-05-21');

/* news */

INSERT INTO `news`(`newID`, `librarianID`, `title`, `postDate`, `dueDate`, `test`, `taq`) VALUES ('n001','ntnu0001','網站開張','2018-01-01','2018-01-31','歡迎各位使用者',0);

/* mouthlist */

INSERT INTO `mouthlist`(`ISBN`, `title`, `description`) VALUES ('9780321714114','最有趣',0);
INSERT INTO `mouthlist`(`ISBN`, `title`, `description`) VALUES ('9780262033848','最容易吸收',0);
INSERT INTO `mouthlist`(`ISBN`, `title`, `description`) VALUES ('9780321988232','最豐富',0);

/* media */

INSERT INTO media (mediaID, title, company, subjecthead, publishDate, language, state)
VALUES
    ('m0001', 'Introduction to Computer Science', 'ABC Publishing', 'Computer Science', '2023-05-01', 'English', 'Available'),
    ('m0002', 'Data Structures and Algorithms', 'XYZ Publications', 'Data Structures', '2022-09-15', 'English', 'Available'),
    ('m0003', 'Programming in Java', 'Tech Books Ltd', 'Java Programming', '2023-02-28', 'English', 'Available'),
    ('m0004', 'Web Development Basics', 'WebTech Inc', 'Web Development', '2022-07-10', 'English', 'Available'),
    ('m0005', 'Database Systems', 'Data Solutions Corp', 'Database Management', '2023-04-20', 'English', 'Available'),
    ('m0006', 'Artificial Intelligence Fundamentals', 'AI Publications', 'Artificial Intelligence', '2022-12-05', 'English', 'Available'),
    ('m0007', 'Network Security Essentials', 'SecureNet Ltd', 'Network Security', '2023-03-10', 'English', 'Available'),
    ('m0008', 'Software Engineering Principles', 'Software Solutions Inc', 'Software Engineering', '2022-10-22', 'English', 'Available'),
    ('m0009', 'Computer Networks: A Practical Approach', 'Network Solutions Corp', 'Computer Networks', '2023-01-15', 'English', 'Available'),
    ('m0010', 'Operating System Concepts', 'OS Books Ltd', 'Operating Systems', '2022-11-08', 'English', 'Available');

/* journal */

INSERT INTO journal (journalID, title, publishDate, frequency, subjecthead, state)
VALUES
    ('j0001', 'Journal of Computer Science', '2023-05-01', 'Monthly', 'Computer Science', 'Available'),
    ('j0002', 'Data Science Review', '2022-09-15', 'Quarterly', 'Data Science', 'Available'),
    ('j0003', 'Artificial Intelligence Journal', '2023-02-28', 'Bi-monthly', 'Artificial Intelligence', 'Available'),
    ('j0004', 'Journal of Web Development', '2022-07-10', 'Monthly', 'Web Development', 'Available'),
    ('j0005', 'Database Management Review', '2023-04-20', 'Quarterly', 'Database Management', 'Available'),
    ('j0006', 'Software Engineering Journal', '2022-12-05', 'Bi-monthly', 'Software Engineering', 'Available'),
    ('j0007', 'Network Security Review', '2023-03-10', 'Monthly', 'Network Security', 'Available'),
    ('j0008', 'Journal of Machine Learning', '2022-10-22', 'Quarterly', 'Machine Learning', 'Available'),
    ('j0009', 'Computer Networks Journal', '2023-01-15', 'Bi-monthly', 'Computer Networks', 'Available'),
    ('j0010', 'Operating Systems Review', '2022-11-08', 'Monthly', 'Operating Systems', 'Available');

/* db */

INSERT INTO db (databaseID, title, company, url, year, description)
VALUES
    ('db0001', 'Computer Science Database', 'TechCo', 'http://www.example.com/db0001', 2023, 'A comprehensive database for computer science research.'),
    ('db0002', 'Data Mining Repository', 'DataCorp', 'http://www.example.com/db0002', 2022, 'A collection of datasets and algorithms for data mining tasks.'),
    ('db0003', 'Artificial Intelligence Resources', 'AI Solutions', 'http://www.example.com/db0003', 2023, 'A curated database of resources for artificial intelligence.'),
    ('db0004', 'Web Development Toolkit', 'WebTech', 'http://www.example.com/db0004', 2022, 'A toolkit for web developers with various libraries and tools.'),
    ('db0005', 'Database Management System', 'DB Solutions', 'http://www.example.com/db0005', 2023, 'A powerful and scalable database management system for enterprise applications.'),
    ('db0006', 'Software Engineering Toolbox', 'SoftCo', 'http://www.example.com/db0006', 2022, 'A collection of software engineering tools and best practices.'),
    ('db0007', 'Network Security Resources', 'SecureNet', 'http://www.example.com/db0007', 2023, 'A repository of resources and tools for network security professionals.'),
    ('db0008', 'Machine Learning Datasets', 'ML Data', 'http://www.example.com/db0008', 2022, 'A collection of datasets for machine learning research and experimentation.'),
    ('db0009', 'Computer Networks Simulator', 'NetSim', 'http://www.example.com/db0009', 2023, 'A network simulator for simulating and analyzing computer networks.'),
    ('db0010', 'Operating Systems Documentation', 'OS Docs', 'http://www.example.com/db0010', 2022, 'A comprehensive documentation resource for operating systems concepts and principles.');

/* e_borrow */

INSERT INTO `e_borrow`(`ebID`, `libraryID`, `librarianID`, `equipID`, `state`) VALUES ('eb0001','ntnu0001','ntnu0002','e1','借閱中');
INSERT INTO `e_borrow`(`ebID`, `libraryID`, `librarianID`, `equipID`, `state`) VALUES ('eb0002','ntnu0002','ntnu0001','e1','借閱中');

/* j_borrow */

INSERT INTO `j_borrow`(`jbID`, `libraryID`, `librarianID`, `journalID`, `state`) VALUES ('jb0001','ntnu0001','ntnu0002','j0001','借閱中');
INSERT INTO `j_borrow`(`jbID`, `libraryID`, `librarianID`, `journalID`, `state`) VALUES ('jb0002','ntnu0002','ntnu0001','j0002','借閱中');

/* m_borrow */

INSERT INTO `m_borrow`(`mbID`, `libraryID`, `librarianID`, `mediaID`, `state`) VALUES ('mb0001','ntnu0001','ntnu0002','m0001','借閱中');
INSERT INTO `m_borrow`(`mbID`, `libraryID`, `librarianID`, `mediaID`, `state`) VALUES ('mb0002','ntnu0002','ntnu0001','m0002','借閱中');

/* media_place */

INSERT INTO `media_place`(`librarymediaID`, `mediaID`, `Lname`, `number`) VALUES ('mp0001','m0001','ntnu大安圖書館',10);
INSERT INTO `media_place`(`librarymediaID`,`mediaID`, `Lname`, `number`) VALUES ('mp0002', 'm0001','ntu圖書館',10);
