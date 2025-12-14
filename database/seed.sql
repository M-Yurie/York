-- Seed data for York shop
-- Replace the admin password hash before use

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO users (id, email, password_hash, name)
VALUES (1, 'admin@york.local', '$2a$12$QltFf3hOxfjfQSFRVlmrH.PHwzAQChmLTU5SXbAS1YSgcKUzeTqw2', 'Admin')
ON DUPLICATE KEY UPDATE email = VALUES(email);

INSERT INTO categories (id, name, slug, parent_id) VALUES
    (1, 'Women', 'women', NULL),
    (2, 'Men', 'men', NULL),
    (3, 'Accessories', 'accessories', NULL)
ON DUPLICATE KEY UPDATE name = VALUES(name), parent_id = VALUES(parent_id);

SET FOREIGN_KEY_CHECKS = 1;
