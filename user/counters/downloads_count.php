<?php
    include '../includes/dbconn.php';

    $ret = "SELECT downloads_count FROM about_us where id=1";
                $query = $mysqli->query($sql);
                $stmt= $mysqli->prepare($ret) ;
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                {
                    echo "$row->downloads_count";
                }

                
                                        
                                            
?>