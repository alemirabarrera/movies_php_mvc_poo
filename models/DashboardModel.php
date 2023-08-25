<?php 
class DashboardModel {
    public function SearchByTitle($arr, $title){
        $arr_result = array();
        foreach($arr as $v){                  
            if(strpos(trim($v["Title"]),  trim($title))!== false){
                $arr_result[] = $v; 
             }
        }
        return $arr_result;
    }

    public function filterByRangeDate($arr, $starDate, $endDate){
        $arr_result = array();
        $starDate = explode("-",$starDate)[0];
        $endDate = explode("-",$endDate)[0];
        foreach($arr as $v){        
            $year_arr = explode("–", $v["Year"]);            
            $year_movie_start= isset($year_arr[0]) ? $year_arr[0]: null;
            $year_movie_end= isset($year_arr[1]) ? $year_arr[1]: null;
            if(isset($year_movie_start) && isset($year_movie_end)){  //range of years like "1961–1969"
                    if(!empty($starDate) && !empty($endDate)){                      
                        if((strtotime($year_movie_start) >= strtotime($starDate) || strtotime($year_movie_end) >= strtotime($starDate)) &&
                           (strtotime($year_movie_end) <= strtotime($endDate) || strtotime($year_movie_start) <= strtotime($endDate))){
                            $arr_result[] = $v;}
                    }else if(!empty($starDate)){                                
                        if(strtotime($year_movie_start) >= strtotime($starDate) || strtotime($year_movie_end) >= strtotime($starDate)){
                            $arr_result[] = $v;}
                    }else if(!empty($endDate)){
                        if(strtotime($year_movie_end) <= strtotime($endDate) || strtotime($year_movie_start) <= strtotime($endDate)){
                            $arr_result[] = $v;}
                    }                     
            }else if(!empty($starDate) && !empty($endDate)){     //One simple year                
                if(strtotime($v["Year"]) >= strtotime($starDate) && strtotime($v["Year"]) <= strtotime($endDate)){
                    $arr_result[] = $v;}
            }else if(!empty($starDate)){                                
                if(strtotime($v["Year"]) >= strtotime($starDate)){
                    $arr_result[] = $v;}
            }else if(!empty($endDate)){
                if(strtotime($v["Year"]) <= strtotime($endDate)){
                    $arr_result[] = $v;}
            }                 
        }
        return $arr_result;
    }

    function sort_title_ASC($a, $b) { //sort by ASC
        if ($a["Title"] == $b["Title"]) return 0;
        return ($a["Title"] < $b["Title"]) ? -1 : 1;
    } 

    function sort_title_DESC($a, $b) {//sort by DESC 
        if ($a["Title"] == $b["Title"]) return 0;
        return ($a["Title"] > $b["Title"]) ? -1 : 1;
    } 

    function sort_title($a, $b) { //sort by title 
        if ($a["Title"] == $b["Title"]) return 0;
        return ($a["Title"] < $b["Title"]) ? -1 : 1;
    }                  
    function sort_date($a, $b) {//sort by date 
        if ($a["Year"] == $b["Year"]) return 0;
        return ($a["Year"] < $b["Year"]) ? -1 : 1;
    }                  

    public function sortMovies($arr, $value){
        switch ($value) {
            case 1: //sort by ASC                                           
                uasort($arr, array($this, 'sort_title_ASC'));                  
                return $arr;
                break;
            case 2: //sort by DESC                                                       
                uasort($arr, array($this, 'sort_title_DESC'));                  
                return $arr;
                break;
            case 3: //sort by title                     
                uasort($arr, array($this, 'sort_title'));                  
                return $arr;
                break;
            case 4: //sort by date               
                uasort($arr, array($this, 'sort_date'));
                return $arr;
                break;
            default:
                null;
                break;
        }        
    }


}
?>