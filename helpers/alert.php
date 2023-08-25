
<?php 
    function alert($msg, $color){
        if(!empty($msg)){            
            echo '</br><div class="alert alert-'.$color.'" role="alert">'.($msg).'</div>';
        }
    }    
    function cleanAlerts($timeSeconds){
        echo 
        '<script type="text/javascript">            
            document.querySelectorAll(".alert").forEach(elem_alert=>{
                setTimeout(()=>{
                    elem_alert.remove();
                },'.$timeSeconds.');
            });        
        </script>
        ';
    }
        
    function goDown(){
        echo '<script type="text/javascript">        
            document.querySelector("html").scrollBy(0, document.querySelector("html").scrollHeight);
        </script>';
    }
    
?> 