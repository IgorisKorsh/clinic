<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <style> 
            .redactRow{
                color:green;
                cursor: pointer;
            }
            .deleteRow{
                text-align:center;
                color:red;
                cursor: pointer;
            }
            .redactRow:hover{
                color:red;
            }
            .deleteRow:hover{
                color:black;
            }
        </style>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Абчихба</title>
    </head>
    <body>
        <div class="container">
        <h1>Здравствуй, <?=$_COOKIE['doctor']?></h1>
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Пациент</th>
                    <th scope="col">Дата и Время</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $did = $_COOKIE['doc_id'];
            $mysql = new mysqli('localhost','root','root','register-bd');
            $patients = $mysql->query("SELECT * FROM `zapis` WHERE `doc_id` = '$did' ORDER BY `datetime`");
            $sex = 1;
            while($patient = $patients->fetch_assoc()){
                echo "<tr><th scope='row'>";
                echo $sex;
                echo "</th><td>";
                echo $patient['name'];
                echo "</td><td>";
                echo $patient['datetime'];
                echo "</td><td class='deleteRow'>X</td><td class='redactRow'>Редактировать</td></tr>";
                $sex = $sex +1;
            }

            $mysql->close();
        ?>
            </tbody>
        </table>
        <a role="button" class="btn btn-secondary btn-sm" href="../exit.php">НАЗАД</a>
        </div>
        <script type="text/javascript">
            myTable.addEventListener('click', function(evt){
                if(evt.target.closest('.deleteRow')) {
  	                evt.target.closest('tr').remove()
                }
                if(evt.target.closest('.redactRow')) {
  	                evt.target.closest('tr').remove()
                }
            })
        </script>
    </body>
</html>