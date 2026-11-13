# Security and Release Checklist

## Confirmed issues from source review

- `index.php` hashes the submitted password with MD5. MD5 is not an appropriate password-hashing algorithm.
- `index.php` interpolates submitted username and password values directly into a SQL statement. This creates SQL-injection risk.
- The previous README contained a demo username/password. Treat those credentials as compromised if they were ever active.

## Required remediation

- Replace string-built SQL with prepared statements for every query that uses request data.
- Migrate passwords to `password_hash()` and verify them with `password_verify()`. Re-hash legacy passwords after successful authentication or reset them.
- Change any demo or reused credentials and remove them from documentation and database exports.
- Add authorization checks to every student, course, section, subject, result, and user-management action.
- Add CSRF protection to forms that create, update, or delete records.
- Validate and normalize all input on the server.
- Use secure session cookie settings, regenerate session IDs after login, and destroy sessions on logout.
- Move database credentials into environment-based configuration and use a least-privilege database account.
- Remove diagnostic scripts such as `test.php` from production.

## Verification status

Static review only. No runtime tests or penetration testing were performed.
