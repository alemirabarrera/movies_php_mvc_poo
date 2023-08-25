<?php
$filters = $this->data[0];
$data_movies = $this->data[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL ?>assets/components/bootstrap-5.3.1-dist/css/style.css">
    <link rel="stylesheet" href="<?php echo URL ?>assets/components/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL ?>assets/components/style.css">
    <script type="text/javascript" src="<?php echo URL ?>assets/components/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <title>dashboard</title>
</head>

<body>
    <div class="container">
        <br>
        <div class="container">
            <form action="<?php echo URL ?>dashboard/search" method="GET">
                <div class="row">
                    <div class="col-4">
                        </br>
                        <label for="title" class="form-label">Search by title</label></br>
                        <input type="text" name="title" id="title" value="<?= $filters["title"] ?>" class="form-control" /></br>
                    </div>
                    <div class="col-3">
                        <label for="date_rag1" class="form-label">Date Range</label> </br>
                        <h10>Since</h10><input type="date" name="date_rag1" id="date_rag1" value="<?= $filters["date_rag1"] ?>" class="form-control" /></br>
                        <h10>Until</h10><input type="date" name="date_rag2" id="date_rag2" value="<?= $filters["date_rag2"] ?>" class="form-control" />
                    </div>

                    <div class="col-2">
                        </br>
                        <label for="sort_by" class="form-label">Sort By</label></br>
                        <select class="form-select" name="sort_by" id="sort_by">
                            <option value="1" <?= $filters["sort_by"] == "1" ? 'selected="true"' : "" ?>>asc</option>
                            <option value="2" <?= $filters["sort_by"] == "2" ? 'selected="true"' : "" ?>>desc</option>
                            <option value="3" <?= $filters["sort_by"] == "3" ? 'selected="true"' : "" ?>>title</option>
                            <option value="4" <?= $filters["sort_by"] == "4" ? 'selected="true"' : "" ?>>date</option>
                        </select>
                    </div>
                    <div class="col-2 justify-content-center">
                        </br></br></br></br>
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" />
                    </div>
                    <div class="col-1">
                        </br></br></br></br>
                        <button type="submit" name="clean" id="clean" class="btn btn-secondary">clean</button>
                        </br>
                    </div>
                </div>
            </form>
        </div>
        <h2>List of movies</h2>
        </br>
        <h4>Movies shown <?= count($data_movies) ?></h4>
        <div class="container mh-100">
            <div class="row">                
                <div class="col">
                    <table class="table table-dark" style='border: 1px;'>                    
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Year</th>
                            <th scope="col">Type</th>
                            <th scope="col">Poster</th>
                        </tr>

                        <?php
                        if (!empty($data_movies)) {
                            foreach ($data_movies as $v) {
                                echo "<tr>";
                                echo "<td>" . $v["Title"] . "</td>";
                                echo "<td>" . $v["Year"] . "</td>";
                                echo "<td>" . $v["Type"] . "</td>";
                                echo "<td>" . $v["Poster"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        else if(empty($data_movies)) {                            
                            echo '<h4 class="text-muted">No movie was found with this match.</h4>';                            
                        }
                        ?>
                    </table>
                </div>
                </br>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</body>

</html>