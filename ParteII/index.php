<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PHP Exam</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<section class="container">
        <h2>Games</h2>
       	<form class="form-group" name="videoGames" novalidate="novalidate">
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4><label for="sTitle" class="label label-default">Title</label></h4>
                    <input type="text" name="sTitle" class="form-control" placeholder="Title" required="required">
                    
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4><label for="studio" class="label label-default">Studio</label></h4>
                    <input type="text" name="studio" class="form-control" placeholder="studio" required="required">
                    
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4><label for="description" class="label label-default">Description</label></h4>
                    <input type="text" name="description" class="form-control" placeholder="Description" required="required">
                    
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4><label for="console" class="label label-default">Console</label></h4>
                    <input type="text" name="console" class="form-control" placeholder="Console" required="required">
                    
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4><label for="date" class="label label-default">Date</label></h4>
                    <input type="date" name="date" class="form-control" required="required">
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
	             	<label for="num" class="control-label">Calification</label>
	                <div class="col-md-14">
	                  	<select class="form-control" id="sel1" value="num">
					        <option>1</option>
					        <option>2</option>
					        <option>3</option>
					        <option>4</option>
					        <option>5</option>
					     </select>
	                </div>
           		</div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4><label for="image" class="label label-default">Image</label></h4>
                    <input type="text" name="image" class="form-control" placeholder="URL Image" required="required">
                </div>
            </form>
	</section>
</body>
</html>