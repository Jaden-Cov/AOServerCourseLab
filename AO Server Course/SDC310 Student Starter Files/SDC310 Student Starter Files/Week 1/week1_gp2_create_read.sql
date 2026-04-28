-- Create
INSERT INTO users (UserId, FirstName, LastName, EMail) VALUES
(1, 'YourName', 'YourLastName', 'you@you.com'),
(2, 'Jane', 'Smith', 'jane@smith.com'),
(3, 'Fred', 'Smith', NULL);

-- Read
SELECT * 
FROM users
WHERE UserId > 1;