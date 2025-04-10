# PHP Education API

## Description
PHP API for managing educational resources, focused on authentication, user management, and classes for educational environments. Developed with Slim Framework, the API follows RESTful standards for interaction with frontend systems.

## Project Structure
```
php-education-api/
├── api/
│   ├── public/
│   │   └── index.php          # Application entry point
│   ├── src/
│   │   ├── Controllers/       # Application controllers
│   │   │   ├── AuthController.php   # Authentication controller
│   │   │   ├── ClassController.php  # Classes controller
│   │   │   └── UserController.php   # Users controller
│   │   ├── Helpers/           # Helper classes
│   │   │   ├── RequestBody.php      # Request processing
│   │   │   ├── ResponseHelper.php   # Response formatting
│   │   │   ├── ResponseMessage.php  # Response messages
│   │   │   └── Session.php          # Session management
│   │   ├── Middleware/        # Middlewares
│   │   │   └── LogMiddleware.php    # Logging middleware
│   │   ├── Models/            # Data models
│   │   │   ├── ClassUserLink.php    # Class-user relationship
│   │   │   ├── Classes.php          # Classes model
│   │   │   ├── DB.php               # Database connection
│   │   │   ├── Log.php              # Log records
│   │   │   ├── Relations.php        # Relationship management
│   │   │   └── User.php             # User model
│   │   ├── Routes/            # Route definitions
│   │   │   └── api.php             # API route configuration
│   │   └── Services/          # Application services
│   │       ├── AuthService.php     # Authentication service
│   │       ├── ClassService.php    # Classes service
│   │       └── UserService.php     # User service
│   ├── vendor/                # Dependencies (Composer)
│   ├── .htaccess              # Apache configuration
│   └── composer.json          # Dependency management
└── .gitignore
```

## Requirements
- PHP 7.4 or higher
- Web server (Apache, Nginx, etc.)
- MySQL/MariaDB database

## Installation
1. Clone the repository:
  ```bash
  git clone https://github.com/Santiago-Fae/php-education-api
  cd php-education-api
  ```

2. Install dependencies via Composer:
  ```bash
  cd api
  composer install
  ```

3. Configure the database:
  - Create a MySQL database
  - Update the connection settings in the `api/src/Models/DB.php` file

4. Configure the web server to point to the `api/public` directory
  - Or use PHP's built-in server for development:
    ```bash
    php -S localhost:8000 -t api/public
    ```

## API Documentation

### Authentication

#### Login
- **URL**: `/login`
- **Method**: `POST`
- **Payload**:
  ```json
  {
   "username": "string",
   "password": "string"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "User successfully authenticated"
  }
  ```
- **Error Response**: Status 401
  ```json
  {
   "message": "Invalid credentials"
  }
  ```

#### Logout
- **URL**: `/logout`
- **Method**: `POST`
- **Authentication**: Requires active session
- **Success Response**: Status 200
  ```json
  {
   "message": "User successfully logged out"
  }
  ```
- **Error Response**: Status 401
  ```json
  {
   "message": "Error logging out"
  }
  ```

### User Management

#### Create User
- **URL**: `/users`
- **Method**: `POST`
- **Authentication**: Requires admin privileges
- **Payload**:
  ```json
  {
   "username": "string",
   "password": "string",
   "name": "string",
   "email": "string"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "Created user successfully"
  }
  ```
- **Error Response**: Status 401/403
  ```json
  {
   "message": "Error creating user"
  }
  ```

#### Get User
- **URL**: `/users`
- **Method**: `GET`
- **Payload**:
  ```json
  {
   "id": "integer"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "data": {
    "id": "integer",
    "username": "string",
    "name": "string",
    "email": "string",
    "role": "string"
   }
  }
  ```

#### Update User
- **URL**: `/users`
- **Method**: `PATCH`
- **Authentication**: Requires admin privileges
- **Payload**:
  ```json
  {
   "id": "integer",
   "username": "string",
   "name": "string",
   "email": "string",
   "role": "string"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "Updated user successfully"
  }
  ```
- **Error Response**: Status 401/403
  ```json
  {
   "message": "Error creating user"
  }
  ```

#### Delete User
- **URL**: `/users`
- **Method**: `DELETE`
- **Authentication**: Requires admin privileges
- **Payload**:
  ```json
  {
   "id": "integer"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "User deleted successfully"
  }
  ```
- **Error Response**: Status 401
  ```json
  {
   "message": "User was not found"
  }
  ```

### Class Management

#### Create Class
- **URL**: `/classes`
- **Method**: `POST`
- **Authentication**: Requires active session
- **Payload**:
  ```json
  {
   "name": "string",
   "hour": "string",
   "classroom": "string"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "Created class successfully"
  }
  ```
- **Error Response**: Status 401
  ```json
  {
   "message": "Error creating class"
  }
  ```

#### Get Class
- **URL**: `/classes`
- **Method**: `GET`
- **Payload**:
  ```json
  {
   "id": "integer"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "data": {
    "id": "integer",
    "name": "string",
    "hour": "string",
    "classroom": "string"
   }
  }
  ```

#### Update Class
- **URL**: `/classes`
- **Method**: `PATCH`
- **Authentication**: Requires active session
- **Payload**:
  ```json
  {
   "id": "integer",
   "name": "string",
   "hour": "string",
   "classroom": "string"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "Updated class successfully"
  }
  ```
- **Error Response**: Status 401
  ```json
  {
   "message": "Error updating class"
  }
  ```

#### Delete Class
- **URL**: `/classes`
- **Method**: `DELETE`
- **Authentication**: Requires active session
- **Payload**:
  ```json
  {
   "id": "integer"
  }
  ```
- **Success Response**: Status 200
  ```json
  {
   "message": "Deleted class successfully"
  }
  ```
- **Error Response**: Status 401
  ```json
  {
   "message": "Error deleting class"
  }
  ```

## Security and Authentication

The system uses session-based authentication. The authentication flow is as follows:

1. The user logs in via the `/login` endpoint with their credentials
2. The session is established after successful authentication
3. Protected endpoints verify if the user is authenticated
4. Some endpoints require admin privileges
5. Logout is performed via the `/logout` endpoint

## Logging Middleware

The API implements a logging middleware that records information about each request. This includes:
- Date and time of the request
- Client IP address
- HTTP method used
- Requested URI
- Response status code

## Usage Considerations

- All requests and responses are in JSON format
- HTTP status codes are used to indicate the result of operations
- The API requires authentication for most operations
- Administrative operations require elevated privileges
