<?php
            define('db_user', 'hallur');
            define('db_password', '123');
            define('db_host', '207.154.200.197');
            define('db_name', 'refresh');

            $dbc = mysqli_connect(db_host, db_user, db_password, db_name)
                    or die('could not connect to mysql' . mysqli_connect_error());

            $query = "select * from msg;";
            $response = mysqli_query($dbc, $query);

            if ($response) {
                while ($row = mysqli_fetch_array($response)) {
                    $msg = $row['msg'];
                    echo "{$msg}\n";
                }
            } else {
                echo "there was an error";
            }
            mysqli_close($dbc);