-- The name of the database is fundraiser
CREATE TABLE organizers (
    organizer_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    organizer_fullname varchar(256) not null,
    organizer_username varchar(256) not null,
    organizer_email varchar(256) not null,
    organizer_password varchar(256) not null,
    organizer_phone varchar(22) not null,
    vkey varchar(45),
    verified tinyint(1) DEFAULT 0,
    organizer_reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE pwdReset(
    pwdResetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pwdResetEmail TEXT NOT NULL,
    pwdResetSelector TEXT NOT NULL,
    pwdResetToken LONGTEXT NOT NULL,
    pwdResetExpires TEXT NOT NULL
);

-- for storing created campaigns data
CREATE TABLE campaigns (
    campaign_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    `campaign_name` varchar(255) not null,
    campaign_type varchar(255) not null,
    campaign_days bigint not null,
    campaign_amount bigint not null,
    `campaign_description` varchar(255) not null,
    campaignPhone bigint not null,
    campaignImage varchar(255),
    campaignApproval tinyint(1) DEFAULT 0,
    campaign_reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE donors (
    donor_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    `donor_name` varchar(255) not null,
    donated_amount bigint not null,
    `donor_address` varchar(255) not null,
    `proof_image` varchar(255) not null,
    donor_approval tinyint(1) DEFAULT 0,
    donor_last_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);