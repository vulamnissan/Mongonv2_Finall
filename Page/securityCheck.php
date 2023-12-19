<?php
//CREATE FUNCTION PREVENT XSS ATTACK : 
//This function ensures that special characters or Unicode characters are represented in a suitable 
//manner for embedding into JavaScript code without causing errors or conflicts within the source code.
function jsEscape($str) 
    {
        $output = '';
        $str = str_split($str);
        for($i=0;$i<count($str);$i++) 
            {
                $chrNum = ord($str[$i]);
                $chr = $str[$i];
                if($chrNum === 226) 
                    {
                        if(isset($str[$i+1]) && ord($str[$i+1]) === 128) {
                            if(isset($str[$i+2]) && ord($str[$i+2]) === 168) {
                                $output .= '\u2028';
                                $i += 2;
                                continue;
                            }
                            if(isset($str[$i+2]) && ord($str[$i+2]) === 169) {
                                $output .= '\u2029';
                                $i += 2;
                                continue;
                            }
                        }
                    }
                switch($chr) 
                    {
                        case "'":
                        case '"':
                        case "\n";
                        case "\r";
                        case "&";
                        case "\\";
                        case "<":
                        case ">":
                            $output .= sprintf("\\u%04x", $chrNum);
                        break;
                        default:
                            $output .= $str[$i];
                        break;
                        }
            }
            
        return $output;
    }
?>
