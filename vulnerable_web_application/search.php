<?php
include_once("init.php");


$search = $_GET['keyword'];

$pdo = new PDO('sqlite:database.sqlite');
    
$query = "SELECT * FROM products WHERE id LIKE '%".$search."%' 
												OR  name LIKE '%".$search."%' 
												OR  description LIKE '%".$search."%' 
												OR  price LIKE '%".$search."%'";
$statement = $pdo->prepare($query);
$result = $statement->execute();
$products = $statement->fetchAll();




?>

 <?
	 include_once("header.php");
 ?>

	    <div class="row listing-row">
		    <div class="col s12 m10 offset-m1 ">  
			    <div class="card-panel">     
				    <h4>Search results for: <?=$search?></h4>
                    <table class=" highlight stripped responsive-table listing">
                        <thead>
                            <tr>
                                <th data-field="name">Name</th>
                                <th data-field="description">Description</th>
                                <th data-field="price"> Price</th>
                                <th data-field="edit"> Edit</th>
                            </tr>
                        </thead>
                        <tbody>
	                        <?= (count($products)==0 ? "No results!" : "")?>
                            <?php foreach($products as $product): ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td><?php echo number_format(floatval($product['price']), 2) . "€"; ?></td>
                                <td><a class="waves-effect waves-light btn btn-small green darken-2" href="#">Edit</a> <a class="waves-effect waves-light btn btn-small red darken-2" href="#">Delete</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </br>
                    <div class="row">
	                	<div class="col s12 m10">
		                	 <a class="waves-effect waves-light btn btn-small blue darken-2" href="#">Add</a>
		                </div>
	                </div>
                </div>
            </div>
            
        </div>   
        
 <?
	 include_once("footer.php");
 ?>
             
 
