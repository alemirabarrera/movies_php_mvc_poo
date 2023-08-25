<?php
class FileMangerModel{
    public static function saveFile($path, $data){
        // open file, create if doesn't exists
        $file = fopen($path,"w+b");
        if( $file == false ) {
        return "Error creating the file";
        } else{   
            // write file
            fwrite($file, $data);
            // force to write to the buffer:
            fflush($file);
        }
        // close the file
        fclose($file);
        return "File Created successfully";
    }

    public static function getDataFile($path){
        if(!file_exists($path)){ return null; }
        // open the file in "only read"
        $archivo = fopen($path,"rb");
        // loop each line 
        $data ="";
        if($archivo){            
            while( feof($archivo) == false)
            {
            $data .= fgets($archivo);
            }
            fclose($archivo);
        }
        return $data;
    }

}
?>