<?php



		if (isset($_FILES["fileToUpload"])) 
		{
                $name=$_POST["name"];
                $artist=$_POST['artist'];
                $price=$_POST['price'];
				$questionCover = $_FILES["fileToUpload"];
				$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
				$bulk = new MongoDB\Driver\BulkWrite;
				$data =[
                    "name" => $name,
                    "artist"=>$artist,
                    "price"=>$price,
					"image" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
					];
				$bulk->insert($data);
				if( $mng->executeBulkWrite('VenueBooking.Image', $bulk))
				{
					header("Location:index.php");
				}
				else
				{
				echo "Unsuccessful";
				}
        }

        ?>