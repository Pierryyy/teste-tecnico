# Database Documentation

## Table: `usuarios`

The `usuarios` table is responsible for storing user information in the application.

### Table Structure

| Column           | Type            | Nullable | Key       | Description                                   |
|------------------|-----------------|----------|-----------|-----------------------------------------------|
| `id`             | BIGINT UNSIGNED| No       | Primary Key| Unique identifier for the user                |
| `nome`           | VARCHAR(255)   | No       |           | Full name of the user                         |
| `email`          | VARCHAR(255)   | No       | Unique    | User's email address                          |
| `senha`          | VARCHAR(255)   | No       |           | User's hashed password                        |
| `created_at`     | TIMESTAMP      | Yes      |           | Timestamp when the record was created         |
| `updated_at`     | TIMESTAMP      | Yes      |           | Timestamp when the record was last updated    |

### Column Details

- **`id`**: Automatically generated primary key. Used to uniquely identify each user.
- **`nome`**: Stores the user's full name. This field is mandatory.
- **`email`**: Must be unique and contain a valid email address. Used for login and communication.
- **`senha`**: Contains the hashed password of the user for security.
- **`created_at`** and **`updated_at`**: Managed automatically by Laravel to track record versions.

### SQL Commands

#### Create Table
```sql
CREATE TABLE usuarios (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB;
```

