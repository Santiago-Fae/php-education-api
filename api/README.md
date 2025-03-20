# PHP User Management API

## Description
This project is a simple PHP API focused on user management. It provides endpoints for creating, retrieving, updating, and deleting user information.

## Folder Structure
```
php-user-management-api
├── public
│   └── index.php
├── src
│   ├── Controllers
│   │   └── UserController.php
│   ├── Models
│   │   └── User.php
│   ├── Services
│   │   └── UserService.php
│   ├── Routes
│   │   └── api.php
│   └── Helpers
│       └── ResponseHelper.php
├── tests
│   └── UserTest.php
├── .htaccess
└── README.md
```

## Setup Instructions
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Ensure you have a PHP server running. You can use built-in PHP server for development:
   ```
   php -S localhost:8000 -t public
   ```
4. Access the API at `http://localhost:8000`.

## Usage
The API provides the following endpoints for user management:

- **POST /api/users**: Create a new user.
- **GET /api/users/{id}**: Retrieve user information by ID.
- **PUT /api/users/{id}**: Update user information by ID.
- **DELETE /api/users/{id}**: Delete a user by ID.

## API Endpoints
- **Create User**: 
  - Request: `POST /api/users`
  - Body: `{ "name": "John Doe", "email": "john@example.com" }`
  
- **Get User**: 
  - Request: `GET /api/users/{id}`
  
- **Update User**: 
  - Request: `PUT /api/users/{id}`
  - Body: `{ "name": "Jane Doe", "email": "jane@example.com" }`
  
- **Delete User**: 
  - Request: `DELETE /api/users/{id}`

## Testing
Unit tests are provided in the `tests/UserTest.php` file. You can run the tests using PHPUnit.

## License
This project is open-source and available under the MIT License.