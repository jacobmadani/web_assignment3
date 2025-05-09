CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE lists(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
CREATE TABLE tasks(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    list_id INTEGER NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(20) DEFAULT 'pending' CHECK (status IN ('pending', 'done')),
    due_date DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (list_id) REFERENCES lists(id) ON DELETE CASCADE
);
INSERT INTO tasks (list_id,title,description,status,due_date)
VALUES (1,'Buy groceries','Milk,eggs,bread','pending','2024-05-15');
SELECT*FROM tasks WHERE status='pending';
SELECT*FROM tasks WHERE list_id=1;
UPDATE tasks SET status='done' WHERE id=3;
DELETE FROM tasks WHERE id=1;
SELECT*FROM tasks WHERE due_date<'2024-05-01';
SELECT COUNT(t.id)AS done_tasks_count
FROM tasks t
JOIN lists l ON t.list_id=l.id
WHERE l.user_id=1 AND t.status='done';