<?php
    class connect_DB
    {
        public $host,  $database, $user, $pass, $conn;
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
                $this->conn = mysqli_connect($host_,  $user_,  $password_,  $database_);
                // Check connection
                if (!$this->conn) {
                    die("Connect fail");
                }
            }

        function get_data($result)
            {
                return $result;
            }
    }
    // =================================================
    // ====================QUERY========================
    // =================================================
    class Query
    {
        public $host,  $database, $user, $pass;
        function __construct($database_)
            {
                $this->database=$database_;
            }

        function select_data($db, $table)
            {
                $query = 'SELECT * FROM ' . $this->database . "." . $table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function select_data_valdator_rq($db, $table)
            {
                $query='SELECT * FROM '.$this->database.".".$table." ORDER BY textid ASC";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function select_id_manager($db, $table, $mail)
            {
                $query='SELECT id FROM '.$this->database.".".$table. " WHERE mail= ?";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $mail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function count_data($db, $table)
            {
                $query='SELECT MAX(id) FROM '.$this->database.".".$table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
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
                $query="INSERT INTO ".$this->database.".".$table." (id,  requestnumber,  status, requester, dateissue, deadline, user) VALUES (?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssssss", $id, $qr, $stt, $creator, $date, $dl, $user);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function select_request_user($db, $table, $id)
            {
                $query='SELECT * FROM '.$this->database.".".$table." WHERE user=? ORDER BY status DESC";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;

            }

        function select_request_VL($db, $table)
            {
                $query='SELECT requestnumber FROM '.$this->database.".".$table." WHERE requestnumber LIKE ?";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    $value_replace = 'VL%'; 
                    mysqli_stmt_bind_param($stmt, "s", $value_replace);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function count_close_VL($db, $rq_number)
            {
                $query="SELECT * FROM request WHERE request.requestnumber LIKE '".$rq_number."%' and request.status = 'Close'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function count_all_VL($db, $rq_number)
            {
                $query="SELECT * FROM request WHERE request.requestnumber LIKE '".$rq_number."%' ";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function update_request($db,  $table,  $dl, $request)
            {
                $query = "UPDATE " . $db->database . "." . $table . " 
                        SET deadline=?
                        WHERE requestnumber=?;";
                
                $stmt = mysqli_stmt_init($db->conn);
                
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                } else {
                    mysqli_stmt_bind_param($stmt,  "ss",  $dl,  $request);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function count_requestnumber_check($db, $table, $request, $user)
            {
                $query = 'SELECT COUNT(requestnumber) FROM ' . $this->database . "." . $table ." WHERE requestnumber = ? AND user = ?;";
                $stmt = mysqli_stmt_init($db->conn);
                
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                } else {
                    
                    mysqli_stmt_bind_param($stmt, "ss", $request, $user);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                
                return $result;
            }

        function get_request_ver($db, $textID)
            {
                $query = "SELECT * FROM textid_language WHERE textid_language.textid = '" . $textID . "' ORDER BY textid_language.ver DESC LIMIT 1;";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function update_textid_upver($db, $language, $text, $request, $trans_name, $val_name, $trans_date, $date, $textID)
            {
                $query = "UPDATE textid_language SET textid_language.".$language."_text = '".$text."', ".$language."_TransCode = '".$request."', ".$language."_Translator = '".$trans_name."', ".$language."_Validator = '".$val_name."' , ".$language."_TransDate = '".$trans_date."',  ".$language."_ValiDate = '".$date."' Where textid_language.textid = '".$textID."' AND ( textid_language.".$language."_text is NULL OR textid_language.".$language."_text = '') Order by textid_language.ver ASC limit 1";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                die("Query preparation failed");
            }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function update_textid_dont_upver($db, $language, $text, $val_name, $date, $trans_code, $trans_name, $trans_date, $textID)
            {
                $query = "UPDATE textid_language SET textid_language.".$language."_text = '".$text."', ".$language."_Validator = '".$val_name."' ,  ".$language."_ValiDate = '".$date."',  ".$language."_TransCode = '".$trans_code."', ".$language."_Translator = '".$trans_name."', ".$language."_TransDate = '".$trans_date."' Where textid_language.textid = '".$textID."' AND ( textid_language.".$language."_text is NULL OR textid_language.".$language."_text = '') Order by textid_language.ver ASC limit 1";
                $stmt = mysqli_stmt_init($db->conn);
                
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                } 
                else 
                    {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    }
            return $result;
            }

        function insert_textid_upver($db, $language, $textID, $ver, $us_text, $text, $date, $name, $trans_rq,  $trans_name, $trans_date)
            {
                $query = "INSERT INTO textid_language(textid, ver, US_English, ".$language."_text, ".$language."_Validator, ".$language."_ValiDate, ".$language."_TransCode , ".$language."_Translator, ".$language."_TransDate) VALUES ('".$textID."',  '".$ver."', '".$us_text."', '".$text."', '".$name."', '".$date."', '".$trans_rq."', '".$trans_name."', '".$trans_date."');";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function insert_textid_dont_upver($db, $language, $textID, $ver, $us_text, $text, $name, $date, $trans_rq, $trans_name, $trans_date)
            {
                $query = "INSERT INTO textid_language(textid, ver, US_English, ".$language."_text, ".$language."_Validator, ".$language."_ValiDate,  ".$language."_TransCode , ".$language."_Translator, ".$language."_TransDate) VALUES ('".$textID."',  '".$ver."', '".$us_text."', '".$text."', '".$name."', '".$date."', '".$trans_rq."', '".$trans_name."', '".$trans_date."');";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            
            }

        function sql_change_status_rq($db, $date, $rq)
            {
                $query= "UPDATE request SET status = 'Close' ,  dateissue = '".$date."' WHERE requestnumber = '".$rq."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function get_meter($db, $txtid, $display)
            {
                $query= "SELECT textid_infor.meter_type FROM textid_infor WHERE textid_infor.textid = '".$txtid."' AND textid_infor.display_type = '".$display."'" ;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function get_font_limit($db, $meter, $display)
            {
                $query= "SELECT fix_limit.fontsize , fix_limit.limit  FROM fix_limit WHERE fix_limit.meter = '".$meter."' AND fix_limit.display_type = '".$display."'" ;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt,  $query)) {
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
