# Database Design

## users Table

### Columns

| Column Name | Data Type | Constraints |
| ----------- | --------- | ----------- |
| id          | BIGINT    | AUTO_INCREMENT, NOT NULL, PRIMARY KEY |
| name        | VARCHAR(20) | NOT NULL |
| email       | VARCHAR(256) | NOT NULL, UNIQUE |
| password    | VARCHAR   | NOT NULL |
| image_url   | VARCHAR   |
| created_at  | TIMESTAMP | NOT NULL |
| deleted_at  | TIMESTAMP | NULL |

### Notes
- `id`: Unique identifier for each user.
- `name`: User's name. Maximum length of 20 characters.
- `email`: User's email address. Maximum length of 256 characters. It must be unique.
- `password`: User's password. Ensure this is securely hashed before storing.
- `image_url`: URL of the user's profile picture.
- `created_at`: Timestamp when the user was created.
- `deleted_at`: Timestamp for soft deletion of the user. NULL if the user is active.

## messages Table

### Columns

| Column Name       | Data Type | Constraints |
| ----------------- | --------- | ----------- |
| id                | BIGINT    | AUTO_INCREMENT, NOT NULL, PRIMARY KEY |
| sender_id         | BIGINT    | NOT NULL, FOREIGN KEY (references Users.id) |
| receiver_id       | BIGINT    | NOT NULL, FOREIGN KEY (references Users.id) |
| message           | TEXT      | NOT NULL |
| replies_message_id| BIGINT    | NULL, FOREIGN KEY (references Messages.id) |
| created_at        | TIMESTAMP | NOT NULL |
| deleted_at        | TIMESTAMP | NULL |

### Notes
- `id`: Unique identifier for each message.
- `sender_id`: The id of the user who sent the message. Foreign key referencing the id in the users table.
- `receiver_id`: The id of the user who is the recipient of the message. Foreign key referencing the id in the users table.
- `message`: The content of the message.
- `replies_message_id`: If the message is a reply, this column contains the id of the original message. NULL if it's not a reply.
- `created_at`: Timestamp when the message was created.
- `deleted_at`: Timestamp for soft deletion of the message. NULL if the message is active.
