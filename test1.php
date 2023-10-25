<!DOCTYPE html>
<html>

<head>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 97%;
        margin: 0px auto;
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
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>
    <?php
        $array = [["/home/share/***","YES"],["/home/share/***","NG"],["/home/share/***","YES"]];
        $data = [];
        $cmd1 = '$1 != "#" && (/nfs/ || /cifs/) {print $1}';
        $cmd2 = '$1 != "#" && (/nfs/ || /cifs/) {print $2}';
        $cmd = "awk '".$cmd1."' /etc/fstab; awk '".$cmd2."' /etc/fstab";
        exec($cmd,$data);
        echo json_encode($data);
    ?>
    <h1>A Fancy Table</h1>
    <table id="customers">
        <tr>
            <th>項番</th>
            <th>デバイス名</th>
            <th>アクセス</th>
        </tr>
        <?php foreach($array as $key=>$value): ?>
        <tr>
            <td><?= $key + 1; ?></td>
            <td><?= $value[0]; ?></td>
            <td>
                <b><?= $value[1]; ?></b>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>