<html>
<head>

    <style>
      table, th, td {
       padding:20px;
       border-collapse: collapse;
      }

      table {
        margin: auto;
      }
    </style>
    
</head>

<body>

    <?php
        #Make connection
        $conn = mysqli_connect("localhost","root","","sort");  #("host name","username","password","database name")

        #Display content of students without sorting
        $sql = "Select * from students";  #This is the query. students is table name
        $result = $conn->query($sql);     #Query is executed using query() function on the connection established above,i.e,$conn
        echo "<br>";                      #html tags can be written in echo
        echo "<center>Before Sorting</center>";
        echo "<table border = '2'>";
        echo "<tr><th>USN</th><th>NAME</th><th>SEM</th></tr>";

        if($result->num_rows>0)                   #if number of rows in table>0
        {
         while($row = $result->fetch_assoc())     #while (fetch records as an associative array and put it in the variable 'row')
         {
          echo "<tr>";
          echo "<td>".$row["usn"]."</td>";
          echo "<td>".$row["name"]."</td>";
          echo "<td>".$row["sem"]."</td>";
         }
        }
        echo "</table>";

        #Display content of students after sorting.
        $sql = "Select * from students order by usn";   #students is table name, usn is attribute
        $result = $conn->query($sql);
        echo "<br>";
        echo "<center>After Sorting</center>";
        echo "<table border = '2'>";
        echo "<tr><th>USN</th><th>NAME</th><th>SEM</th></tr>";

        if($result->num_rows>0)
        {
         while($row = $result->fetch_assoc())
         {
          echo "<tr>";
          echo "<td>".$row["usn"]."</td>";
          echo "<td>".$row["name"]."</td>";
          echo "<td>".$row["sem"]."</td>";
         }
        }

        echo "</table>";

        $conn->close();  #close the connection esablished earlier.
    ?>
</body>
</html>
