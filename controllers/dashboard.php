<?php
require_once "helpers/curlrequest.php"; //require get and post http function

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel("DashboardModel"); //load the model DashboardModel        
        $this->search();
        $this->view->render("dashboard/index");
    }

    public function search()
    {
        $this->view->data = array();
        $filters = array();
        isset($_GET["title"]) ? $filters["title"] = $_GET["title"] : $filters["title"] = "";
        isset($_GET["date_rag1"]) ? $filters["date_rag1"] = $_GET["date_rag1"] : $filters["date_rag1"] = "";
        isset($_GET["date_rag2"]) ? $filters["date_rag2"] = $_GET["date_rag2"] : $filters["date_rag2"] = "";
        isset($_GET["sort_by"]) ? $filters["sort_by"] = $_GET["sort_by"] : $filters["sort_by"] = "";

        
        if (!empty($filters["title"])) {
            $url = "https://www.omdbapi.com/?s=" . trim($filters["title"]) . "&apiKey=fc59da33";
        } else {
            $url = "https://www.omdbapi.com/?s=avengers&apiKey=fc59da33";
        }
        
        $datafile = curl_GET($url);
        $data_response = json_decode($datafile, true);
        $arr_data = [];
                
        if (!empty($data_response) && $data_response["Response"]=="True"){

            $arr_data = $data_response["Search"];
            if (isset($_GET["submit"])) {
                if (!empty($filters["title"])) {
                    //$arr_data = $this->model->SearchByTitle($arr_data, $filters["title"]);
                }
                if (!empty($filters["date_rag1"]) || !empty($filters["date_rag2"])) {
                    $arr_data = $this->model->filterByRangeDate($arr_data, $filters["date_rag1"], $filters["date_rag2"]);
                }
                if (!empty($filters["sort_by"])) {
                    $arr_data = $this->model->sortMovies($arr_data, $filters["sort_by"]);
                }                    
            }
            if (isset($_GET["clean"])) {
                $arr_data = $data_response["Search"];
                header("Location: " . URL . "dashboard");
                exit();
            }           
        }
        $this->view->data[0] = $filters;
        $this->view->data[1] = $arr_data;
    }
}
