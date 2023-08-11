<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-code {
            font-size: 8rem;
            color: #555;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 1.5rem;
            color: #777;
            margin-bottom: 20px;
        }

        .home-link {
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .home-link:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Page not found.</div>
        <a href="index" class="home-link">Go to Home</a>
    </div>
</body>
</html>
