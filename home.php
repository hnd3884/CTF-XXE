<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Danh sách sinh viên</h1>
    <h3>Upload list (XML format)</h3>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" accept=".xml">
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <table id="customers">
        <tr>
            <th>Tên</th>
            <th>Năm sinh</th>
            <th>Trường học</th>
        </tr>
        <?php

        $xmlDoc = new DOMDocument();
        $xmlDoc->load("Upload/xmlUploaded.xml", LIBXML_NOENT | LIBXML_DTDLOAD);

        $xmlList = simplexml_import_dom($xmlDoc);

        foreach ($xmlList->student as $student) {
            echo "<tr><td>{$student->name}</td><td>{$student->birth}</td><td>{$student->school}</td></tr>";
        }

        ?>
    </table>

</body>

</html>