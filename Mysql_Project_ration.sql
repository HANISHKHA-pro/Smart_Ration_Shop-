CREATE TABLE Ration_Shop_Details (
    Shop_ID VARCHAR(10) PRIMARY KEY,
    Shop_Name VARCHAR(150) NOT NULL,
    Shop_Area VARCHAR(100) NOT NULL,
    Shop_Address VARCHAR(255) NOT NULL,
    Shop_Owner VARCHAR(100) NOT NULL,
    Shop_Phone VARCHAR(15) NOT NULL,
    Open_Time TIME NOT NULL,
    Close_Time TIME NOT NULL,
    Working_Days VARCHAR(50) NOT NULL
);
CREATE TABLE Item_Availability (
    Item_ID VARCHAR(10) PRIMARY KEY,
    Shop_ID VARCHAR(10),
    Item_Name VARCHAR(50) NOT NULL,
    Card_Type VARCHAR(20) NOT NULL,
    Quantity VARCHAR(50),
    Price VARCHAR(20),
    Available BOOLEAN,
    Last_Updated DATE,
    FOREIGN KEY (Shop_ID) REFERENCES Ration_Shop_Details(Shop_ID)
        ON DELETE CASCADE
);
CREATE TABLE Distribution_Schedule (
    Schedule_ID VARCHAR(10) PRIMARY KEY,
    Shop_ID VARCHAR(10),
    Distribution_Date DATE NOT NULL,
    Distribution_Type VARCHAR(50),
    Description VARCHAR(255),
    FOREIGN KEY (Shop_ID) REFERENCES Ration_Shop_Details(Shop_ID)
        ON DELETE CASCADE
);
CREATE TABLE Announcements (
    Announcement_ID VARCHAR(10) PRIMARY KEY,
    Title VARCHAR(200) NOT NULL,
    Message TEXT NOT NULL,
    Announcement_Date DATE,
    Priority ENUM('urgent','normal') DEFAULT 'normal',
    Source VARCHAR(150)
);
CREATE TABLE Subscriptions (
    Subscription_ID INT AUTO_INCREMENT PRIMARY KEY,
    Full_Name VARCHAR(100) NOT NULL,
    Mobile_Number VARCHAR(10) NOT NULL,
    Shop_ID VARCHAR(10),
    Item_Name VARCHAR(50),
    Notify_Via ENUM('sms','whatsapp','both'),
    Subscription_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Shop_ID) REFERENCES Ration_Shop_Details(Shop_ID)
        ON DELETE CASCADE
);
INSERT INTO Ration_Shop_Details VALUES
('SHOP001','Annapurna Fair Price Store','Anna Nagar',
 '12, South Usman Road, Anna Nagar, Chennai - 600511',
 'Rajesh Kumar','9876543210','08:00:00','14:00:00','Mon–Sat'),

('SHOP002','Lakshmi_Ration_Store','Mylapore',
 '45, Kutchery Road, Mylapore, Chennai - 600004',
 'Meena Devi','9876543211','07:30:00','13:30:00','Mon–Sat');
 