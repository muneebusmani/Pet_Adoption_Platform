create database [Pet Adoption Platform];
use [Pet Adoption Platform]

CREATE PROCEDURE createTable
AS
BEGIN
    IF OBJECT_ID(N'dbo.users', N'U') IS NULL
        CREATE TABLE users (
            -- Auto-incrementing primary key column for unique identifier
            [id] INT IDENTITY(1,1) PRIMARY KEY,
            
            [username] VARCHAR(50) NOT NULL,
            [name] VARCHAR(100) NOT NULL,
            [email] VARCHAR(100) NOT NULL,
            [password] VARCHAR(255) NOT NULL,

            -- Column to store the role of the user, can only be 'Adopter' or 'Shelter Staff', cannot be empty
            [role] VARCHAR(20) NOT NULL CHECK (role IN ('Adopter', 'Shelter Staff')),

            -- Column to store the timestamp when the user was created, with default value set to current timestamp
            [created_at] DATETIME DEFAULT GETDATE()
        );
    GO
END
createTable;

CREATE PROCEDURE admin
AS
BEGIN
    SELECT * FROM users
END
drop procedure admin



CREATE PROCEDURE [if exists]
@username varchar(255),
@email varchar(255)
AS
BEGIN
SELECT username,email FROM users where username = @username or email = @email;
END
drop procedure [if exists];


CREATE PROCEDURE userReg 
@username VARCHAR(255),
@name VARCHAR(255),
@email VARCHAR(255),
@password VARCHAR(255),
@role VARCHAR(255)
AS
BEGIN
    INSERT INTO users([username],[name],[email],[password],[role]) VALUES (@username,@name,@email,@password,@role)
END


CREATE PROCEDURE profile_fetch
 @username VARCHAR(255),
 @email VARCHAR(255)
AS
 BEGIN
  SELECT * FROM users WHERE username=@username AND email=@email
 END 


CREATE PROCEDURE [fetch profile via username]
@username VARCHAR(255)
AS
BEGIN
SELECT * FROM users WHERE username=@username;
END
GO



use [Pet Adoption Platform];
select * from users;
truncate table users;