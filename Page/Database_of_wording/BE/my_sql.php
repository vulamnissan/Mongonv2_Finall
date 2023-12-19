<?php
    class connect_DB
    {
        public $host, $database, $user, $pass, $conn;
        function __construct($host_, $database_, $user_, $pass_)
            {   
                // config database
                $this->host = $host_;
                $this->database=$database_;
                $this->user=$user_;
                $this->pass=$pass_;
                $this->connection_DB($host_, $database_, $user_, $pass_);
            }
        // connect database
        function connection_DB($host_, $database_, $user_, $password_)
            {
                // Create connection
                $this->conn = mysqli_connect($host_, $user_, $password_, $database_);
                // Check connection
                if (!$this->conn) {
                    die("Connect fail");
                }
            }
        function get_data($query)
            {
                $result = mysqli_query($this->conn, $query);
                return $result;
            }
    }
    // =================================================
    // ====================QUERY========================
    // =================================================
    class Query
    {
        public $host, $database, $user, $pass;
        function __construct($database_)
            {
                $this->database=$database_;
            }

        function select_data($db, $table)
            {
                $query='SELECT * FROM '.$this->database.".".$table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }
        function select_data_car($db, $table, $textid)
            {
                $query='SELECT * FROM '.$this->database.".".$table ." WHERE textid = '" .$textid ."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }

        function count_data($db, $table)
            {
                $query='SELECT count(*) FROM '.$this->database.".".$table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;

            }
        function insert_request($db, $table, $id, $qr, $stt, $creator, $date, $dl, $user)
            {
                $query="INSERT INTO ".$this->database.".".$table." (id, requestnumber, status, requester, dateissue, deadline, user) VALUES ('".$id."', '".$qr."', '".$stt."', '".$creator."', '".$date."', '".$dl."', '".$user."')";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }

            }

        function update_request($db, $table, $creator, $rq, $id)
            {
                $query = "UPDATE ".$this->database.".".$table." SET requester ='".$creator."' WHERE user = '".$id."' AND requestnumber = '".$rq."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function insert_limit($db, $table, $id, $display_type, $meter, $limit, $fontsize)
            {
                $query="INSERT INTO ".$this->database.".".$table." (id, display_type, meter, fix_limit.limit, fontsize) VALUES ('".$id."', '".$display_type."', '".$meter."', '".$limit."', '".$fontsize."')";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }

        function update_textid($db, $table, $textid, $content, $display_type, $meter_type, $number_lines, $US_English, $Japanese, $VehicleApplied, $ManagerApproval, $Date)
            {
                $query = "UPDATE ".$this->database.".".$table." SET content ='".$content."', display_type ='".$display_type."', meter_type='".$meter_type."', number_lines='".$number_lines."', US_English='".$US_English."', Japanese='".$Japanese."', VehicleApplied='".$VehicleApplied."', ManagerApproval='".$ManagerApproval."', Date='".$Date."' WHERE textid = '".$textid."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
            }

        function update_textid_language($db, $table, $textid, $US_English, $Japanese)
            {
                $query = "UPDATE ".$this->database.".".$table." SET US_English='".$US_English."', Japanese_text='".$Japanese."'WHERE textid = '".$textid."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
            }
        
        function update_limit($db, $table, $display_type, $meter, $limit, $id)
            {
                $query = "UPDATE ".$this->database.".".$table." SET meter='".$meter."', fix_limit.limit ='".$limit."'  WHERE id ='".$id."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
                return $result;
            }

        function select_request_user($db, $table, $id)
            {
                $query='SELECT * FROM '.$this->database.".".$table." WHERE user='".$id."' ";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
                return $result;
            }

        function update_status_query($db, $table, $rq)
            {
                $query = "UPDATE ".$this->database.".".$table." SET status ='Close' WHERE requestnumber ='".$rq."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
            }

        function select_id_manager($table, $mail)
            {
                $query='SELECT id FROM '.$this->database.".".$table. " WHERE mail= '".$mail."'";
                return $query;
            }

        function select_request_DB($db, $table)
            {
                $query='SELECT requestnumber FROM '.$this->database.".".$table." WHERE requestnumber LIKE 'DB%'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
                return $result;
            }

        function check_exist_request($db, $table, $user_id, $rq)
            {
                $query='SELECT requestnumber FROM '.$this->database.".".$table." WHERE user='".$user_id."' and requestnumber ='".$rq."' ";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
        }

        function select_limit($db, $table)
            {
                $query='SELECT display_type, meter FROM '.$this->database.".".$table."";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }

        function select_textid_filter($table, $temp_filter)
            {
                $query='SELECT textid FROM '.$this->database.".".$table." WHERE textid LIKE '%".$temp_filter."%'";
                return $query;
            }
        
        function select_limit_display_type($db, $table)
            {
                $query = 'SELECT DISTINCT display_type FROM '.$table ;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }

        function select_limit_meter($db, $table)
            {
                $query = 'SELECT DISTINCT meter FROM '.$table ;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }  

        function select_requestnumber($db, $table, $id)
            {
                $query = 'SELECT requestnumber FROM '.$table. " WHERE status = 'Open' AND requestnumber LIKE 'DB%' AND"." user =".$id;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            } 

        function filter_db_wording($db, $table, $type_filter, $filterValue)
            {
                $query = "SELECT * FROM textid_language WHERE $type_filter LIKE '%".$filterValue."%'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }  

        function select_textid_language($table)
            {
                $query = "SELECT * FROM $table ORDER BY textid ASC";
                return $query;
            }   

        function select_textid_infor_language($db, $table, $textid_select)
            {
                $query = "SELECT * FROM textid_infor ORDER BY textid ='".$textid_select."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            }   

        function select_textid_infor_filter($db, $table, $textid_select)
            {
                $query = "SELECT * FROM textid_infor WHERE textid ='".$textid_select."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
                
            } 
        
        function add_sql($db, $unique)
            {
                $query = "SELECT * FROM textid_infor  WHERE textid ='$unique' ";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
        }
    }
?>
