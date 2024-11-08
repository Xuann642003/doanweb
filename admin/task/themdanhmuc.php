<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Loại Hoa</title>
    <style>
        /* Center the form */
        /* body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        } */
        
        h2 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left:470px;
            margin-top:100px;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Thêm Loại Hoa Mới</h2>
    <form method="post" action="xuli_admin/insert_loaihoa.php">
        <label>Tên Loại Hoa:</label>
        <input type="text" name="loaihoa" required><br>
        
        <input type="submit" value="Thêm Loại Hoa">
    </form>
</body>
</html>
