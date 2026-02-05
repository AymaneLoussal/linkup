-- Active: 1768424473535@@127.0.0.1@5432@linkup
select * FROM Users;

ALTER TABLE users RENAME COLUMN user_name TO username;
SELECT id, content FROM posts ORDER BY id DESC LIMIT 5;
SELECT column_name FROM information_schema.columns
WHERE table_name='posts';

SELECT id, content FROM posts ORDER BY id DESC LIMIT 5;

SELECT table_name FROM information_schema.tables
WHERE table_schema = 'public';

DELETE FROM posts
WHERE content IS NULL;


DELETE FROM posts

;

SELECT * FROM posts;

select * FROM Users;


