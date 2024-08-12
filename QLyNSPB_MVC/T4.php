<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .t4 {
            width: 300px; /* Độ rộng của khu vực bên trái cho hình ảnh */
            height: 100%; /* Sử dụng chiều cao của cửa sổ trình duyệt */
            background-color: black;
            top: 30px;
        }

        .image-container {
            flex: 1; /* Để phần còn lại của trang sử dụng phần dư của không gian */
     /* Để căn giữa hình ảnh ngang */
        }

        img {
            background-color: black;
            max-width: 400px; /* Để hình ảnh không vượt quá kích thước của khu vực chứa */
            max-height: 100%; /* Để hình ảnh không vượt quá chiều cao của cửa sổ trình duyệt */
        }
    </style>
</head>
<body>
    <div class="t4"></div>
    <div class="image-container">
        <img src="https://i.pinimg.com/564x/45/16/94/4516944526bba397df54bd0d17a8b41c.jpg" alt="img_t4">
    </div>
</body>
</html>
