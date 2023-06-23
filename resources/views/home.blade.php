<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task App</title> 
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }

        .container {
            text-align: center;
        }
        button {
        background-color: green;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Task App</h1>
        <button onclick="location.href='{{ route('task.create') }}'">Add Task</button>
    </div>
</body>
</html>

