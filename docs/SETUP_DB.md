# Database Setup (MySQL)

Use either phpMyAdmin or the MySQL CLI. Adjust credentials as needed.

## 1) Create the database
- **phpMyAdmin:** Click **Databases** → create `york` with charset `utf8mb4` and collation `utf8mb4_unicode_ci`.
- **CLI:**  
  ```sh
  mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS york CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
  ```

## 2) Import migrations (tables)
- **phpMyAdmin:** Select the `york` database → **Import** → choose `database/migrations.sql` → **Go**.
- **CLI:**  
  ```sh
  mysql -u root -p york < database/migrations.sql
  ```

## 3) Import seed data (admin + categories)
- **phpMyAdmin:** With `york` selected → **Import** → choose `database/seed.sql` → **Go**.
- **CLI:**  
  ```sh
  mysql -u root -p york < database/seed.sql
  ```

## 4) Update admin password
- In `database/seed.sql`, replace `REPLACE_WITH_BCRYPT_HASH` with a real bcrypt hash before seeding (or update the row after seeding).

## Notes
- Scripts assume defaults from `config/database.php` (`york` DB, `root` user, no password). Update either the config or use CLI flags/env to match your environment.
- Re-running seeds is safe for the provided rows due to `ON DUPLICATE KEY UPDATE`.
