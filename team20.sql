CREATE DATABASE librarysys; 
USE librarysys;

CREATE TABLE BOOK (
  ISBN varchar(20),
  title varchar(100),
  writer varchar(100),
  company varchar(100),
  translator varchar(100),
  publishDate varchar(100),
  edition varchar(10),
  subjecthead varchar(100),
  language varchar(100),
  state varchar(10),
  PRIMARY KEY (ISBN)
) ENGINE=InnoDB;

Create table MEDIA (
	mediaID varchar(20),
	title varchar(100),
    company varchar(100),
    subjecthead varchar(100),
    publishDate varchar(100),
    language varchar(100),
    state varchar(10),
    PRIMARY KEY(mediaID)
)ENGINE=InnoDB;

Create table JOURNAL (
	journalID varchar(20),
    title varchar(100),
    publishDate varchar(100),
    frequency varchar(10),
    subjecthead varchar(100),
    state varchar(10),
	PRIMARY KEY(journalID)
)ENGINE=InnoDB;

Create table MOUTHLIST (
	ISBN varchar(20),
    title varchar(100),
    description varchar(1000),
    PRIMARY KEY (ISBN),
    FOREIGN KEY (ISBN) references BOOK(ISBN) on delete cascade
)ENGINE=InnoDB;

Create table LIBRARY (
	Lname varchar(100),
    school varchar(100),
    address varchar(100),
    phone varchar(100),
    url varchar(100),
    PRIMARY KEY(Lname)
)ENGINE=InnoDB;

Create table EQUIPMENT (
	equipID varchar(20),
    name varchar(100),
    Lname varchar(100),
    state varchar(100),
    PRIMARY KEY(equipID),
    foreign key (Lname) references LIBRARY(Lname) on delete cascade
)ENGINE=InnoDB;

Create table DB (
	databaseID varchar(20),
    title varchar(100),
    company varchar(100),
    url varchar(100),
    year numeric(4,0),
    description varchar(100),
	PRIMARY KEY(databaseID)
)ENGINE=InnoDB;

Create table BUY (
    buyID varchar(20),
	databaseID varchar(20),
    Lname varchar(100),
    primary key(buyID),
    foreign key (databaseID) references DB(databaseID) on delete cascade,
	foreign key (Lname) references LIBRARY(Lname) on delete cascade
)ENGINE=InnoDB;

Create table BOOK_PLACE (
	ISBN varchar(20),
	Lname varchar(100),
    bookID varchar(100),
    number int(10),
    PRIMARY KEY(bookID),
    foreign key (ISBN) references BOOK(ISBN) on delete cascade,
    foreign key (Lname) references LIBRARY(Lname) on delete cascade
)ENGINE=InnoDB;

Create table MEDIA_PLACE (
    librarymediaID varchar(20),
	mediaID varchar(20),
	Lname varchar(100),
    number int(10),
    primary key(librarymediaID),
    foreign key (mediaID) references MEDIA(mediaID) on delete cascade,
    foreign key (Lname) references LIBRARY(Lname) on delete cascade
)ENGINE=InnoDB;

Create table JOURNAL_PLACE (
    libraryjournalID varchar(20),
	journalID varchar(20),
	Lname varchar(100),
    number int(10),
    primary key(libraryjournalID),
    foreign key (journalID) references JOURNAL(journalID) on delete cascade,
    foreign key (Lname) references LIBRARY(Lname) on delete cascade
)ENGINE=InnoDB;

Create table READER (
	libraryID varchar(20),
    studentID varchar(20),
    name varchar(100),
    school varchar(100),
    password varchar(100),
    phone varchar(100),
    address varchar(100),
    email varchar(100),
    PRIMARY KEY(libraryID),
    UNIQUE(studentID)
)ENGINE=InnoDB;

Create table QUEUE (
	queueID varchar(10),
    ntu int(11),
    ntnu int(11),
    ntust int(11),
    PRIMARY KEY(queueID, ntu, ntnu, ntust)
)ENGINE=InnoDB;

Create table PERMISSION (
	libraryID varchar(20),
    queueID varchar(10),
    sourcelimit int(11),
    equiplimit int(11),
    PRIMARY KEY(libraryID),
    foreign key (queueID) references QUEUE(queueID) on delete set null
)ENGINE=InnoDB;

Create table E_RESERVATIOB (
	EreservationID varchar(20),
    libraryID varchar(20),
    equipID varchar(20),
    data varchar(20),
    state varchar(10),
    PRIMARY KEY(EreservationID),
	foreign key (libraryID) references READER(libraryID) on delete cascade,
    foreign key (equipID) references EQUIPMENT(equipID) on delete cascade
)ENGINE=InnoDB;

Create table B_RESERVATIOB (
	BreservationID varchar(20),
    libraryID varchar(20),
    ISBN varchar(20),
    data varchar(20),
    state varchar(10),
    PRIMARY KEY(BreservationID),
	foreign key (libraryID) references READER(libraryID) on delete cascade,
    foreign key (ISBN) references BOOK(ISBN) on delete cascade
)ENGINE=InnoDB;

Create table LOAN (
	loanID varchar(20),
    libraryID varchar(20),
    ISBN varchar(20),
    duedata varchar(20),
    borrowdate varchar(20),
    PRIMARY KEY(loanID),
	foreign key (libraryID) references READER(libraryID) on delete cascade,
    foreign key (ISBN) references BOOK(ISBN) on delete cascade
)ENGINE=InnoDB;

Create table READHISTORY(
	hisID varchar(20),
    libraryID varchar(20),
    ISBN varchar(20),
    readdata varchar(20),
    PRIMARY KEY(hisID),
	foreign key (libraryID) references READER(libraryID) on delete cascade,
    foreign key (ISBN) references BOOK(ISBN) on delete cascade
)ENGINE=InnoDB;

Create table RECOMMEND (
  recommendID varchar(20),
  libraryID varchar(20),
  ISBN varchar(20),
  title varchar(100),
  writer varchar(100),
  company varchar(100),
  translator varchar(100),
  publishDate varchar(100),
  edition varchar(10),
  subjecthead varchar(100),
  language varchar(100),
  PRIMARY KEY (recommendID),
  foreign key (libraryID) references READER(libraryID) on delete cascade
)ENGINE=InnoDB;

Create table LIBRARIAN (
	librarianID varchar(20),
    name varchar(100),
    school varchar(100),
    position varchar(100),
    password varchar(100),
    phone varchar(100),
    address varchar(100),
    email varchar(100),
    salary varchar(100),
    PRIMARY KEY (librarianID)
)ENGINE=InnoDB;

Create table MANAGE (
	recommendID varchar(20),
	librarianID varchar(20),
    state varchar(20),
    reason  varchar(100),
    senddate date,
    PRIMARY KEY (recommendID),
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade,
	foreign key (recommendID) references RECOMMEND(recommendID) on delete cascade
)ENGINE=InnoDB;

Create table NEWS ( 
	newID varchar(20),
    librarianID varchar(100),
    title varchar(100),
    postDate date,
    dueDate date,
    test varchar(1000),
    taq  varchar(100),
    PRIMARY KEY (newID),
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade
)ENGINE=InnDB;

Create table PENALTY (
	penallyID varchar(20),
	librarianID varchar(20),
    libraryID varchar(20),
    detail varchar(1000),
    state varchar(1000),
    primary key(penallyID),
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade,
    foreign key (libraryID) references READER(libraryID) on delete cascade
)ENGINE=InnoDB;
    
Create table E_BORROW (
	ebID varchar(20),
	libraryID varchar(20),
    librarianID varchar(20),
    equipID varchar(20),
    state varchar(20),
    PRIMARY KEY(ebID),
    foreign key (equipID) references EQUIPMENT(equipID) on delete cascade,
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade,
    foreign key (libraryID) references READER(libraryID) on delete cascade
)ENGINE=InnoDB;

Create table B_BORROW (
	bbID varchar(20),
	libraryID varchar(20),
    librarianID varchar(20),
    ISBN varchar(20),
    state varchar(20),
    PRIMARY KEY(bbID),
    foreign key (ISBN) references BOOK(ISBN) on delete cascade,
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade,
    foreign key (libraryID) references READER(libraryID) on delete cascade
)ENGINE=InnoDB;

Create table M_BORROW (
	mbID varchar(20),
	libraryID varchar(20),
    librarianID varchar(20),
    mediaID varchar(20),
    state varchar(20),
    PRIMARY KEY(mbID),
    foreign key (mediaID) references MEDIA(mediaID) on delete cascade,
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade,
    foreign key (libraryID) references READER(libraryID) on delete cascade
)ENGINE=InnoDB;

Create table J_BORROW (
	jbID varchar(20) ,
	libraryID varchar(20) ,
    librarianID varchar(20) ,
    journalID varchar(20) ,
    state varchar(20) ,
    PRIMARY KEY(jbID),
    foreign key (journalID) references JOURNAL(journalID) on delete cascade,
    foreign key (librarianID) references LIBRARIAN(librarianID) on delete cascade,
    foreign key (libraryID) references READER(libraryID) on delete cascade
)ENGINE=InnoDB;
    


    
