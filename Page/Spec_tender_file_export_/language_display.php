<?php
        $arr = array();
        $arr = array('US_English',
                    'Japanese_text',	
                    'Arabic_text'	,
                    'BrazilianPortuguese_text',	
                    'British_text',		
                    'CanadianFrench_text',	
                    'Chinese_text',	
                    'Czech_text',	
                    'Danish_text',	
                    'Dutch_text',	
                    'Finnish_text',		
                    'French_text',	
                    'German_text',	
                    'Greek_text',	
                    'Hungarian_text',		
                    'Italian_text',		
                    'Korea_text',		
                    'MexicanSpanish_text',	
                    'Norwegian_text',	
                    'Polish_text',	
                    'Portuguese_text',	
                    'Russian_text',		
                    'Slovak_text',	
                    'Spanish_text',	
                    'Swedish_text',		
                    'Taiwanese_text',	
                    'Thai_text',	
                    'Turkish_text',		
                    'Ukrainian_text');
for($i=0;$i<count($arr);$i++){
    echo "<div class = 'language_choises' id='language_display_".$i+5 ."'>".$arr[$i]."</div>";
}
        
    ?>
        
        
