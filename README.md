# Authentication Microservice

## Overview
This microservice provides authentication functionalities, specifically designed for login and logout operations. It's built using the Lumen framework and is containerized with Docker, ensuring easy deployment and environment consistency.

### Features
- **Login**: Users can log in using their mobile number and password. Upon successful authentication, a JWT (JSON Web Token) is generated for secure sessions.
- **Logout**: Allows users to securely logout, invalidating their current token.

## Getting Started

### Prerequisites
- Docker
- Any REST client (like Postman) for testing the endpoints.

### Installation
1. Clone the repository:
```
git clone https://github.com/afshin-phpy/auth-microservice.git
```

2. Navigate to the project directory:

```
cd auth-microservice
```
3. Install dependencies:
```
composer install
```
4. Build container:
```
docker-compose build
```

5. Run the container:
```
docker-compose up -d
```

6. Create a .env file in root directory and copy .env.example content into .env file

7. Run following command for database migration:
```
docker-compose exec app1 php artisan migrate
```


### Using the Microservice

#### Login
- **Host**: `127.0.0.1:8000`
- **Endpoint**: `/api/user/login`
- **Method**: POST
- **Body**:
```json
{
 "mobile": "[user mobile]",
 "password": "[user password]"
}
``````
#### Response:
    Success: JWT for authenticated sessions.
    Error: Relevant error message.

Example:
```json
{
    "data": {
        "access_token": "auth_token",
        "name": "user's name",
        "mobile": "user's mobile number"
    },
    "server_time": "server time"
}
``````

#### Logout

- **Host**: `127.0.0.1:8000`
- **Endpoint**: `/api/user/logout`
- **Headers**:
        Authorization: Bearer [JWT]
- **Method**: POST
- **Response**:

        Success: Confirmation of token invalidation.
        Error: Relevant error message.
    Example:

    ```json
    {
        "data": {
            "message": "Successfully logged out"
    },
        "server_time": "2024-01-23T23:16:24.041322Z"
    }
    ```

### Running Tests

To ensure the functionality of the microservice, tests are provided. Run the following command to execute the tests:

    docker-compose exec app vendor/bin/phpunit