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
            margin-bottom: 20px;
        }

        button {
            background-color: rgb(53, 82, 214);
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button.edit {
            background-color: rgb(59, 173, 59);
            color: white;
        }

        button.delete {
            background-color: rgb(205, 83, 83);
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 3%;
        }

        th, td {
            padding: 10px;
            text-align: left;
            /* border-bottom: 1px solid #1a1919;
            border-right: 1px solid #1a1919;
            border-left: 1px solid #1a1919; */
            border: 1px solid #1a1919;
        }

        /* td:last-child {
            border-right: none;
        } */

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task List Page</h1>
        <button onclick="location.href='{{ route('task-create') }}'">Add New Task</button>
        <button onclick="location.href='{{ route('category-create') }}'">Add New Category</button>
    <div >
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->category }}</td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <button class="edit" onclick="location.href='{{ route('task-edit', $task->id) }}'">Update</button>
                                <form action="{{ route('task-delete', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
