<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];
	
	function sendHeaders($methods) {
		header("Access-Control-Allow-Origin: *"); 
		header("Access-Control-Allow-Methods: " . $methods . ", OPTIONS"); 
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header("Content-Type: application/json");
	  }


	function getArticles()
	{
		global $conn;
		$query = "SELECT * FROM article";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result))
		{
			$response[] = $row;
		}
		sendHeaders('GET');
		header("HTTP/1.0 200 OK");
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getArticle($id=0)
	{
		global $conn;
		$query = "SELECT * FROM article";
		if($id != 0)
		{
			$query .= " WHERE id=".$id." LIMIT 1";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function AddArticle()
	{
		global $conn;
		$title = $_POST["title"];
		$image = $_POST["image"];
		$introduction = $_POST["introduction"];
		$description = $_POST["description"];
		$lastMod = date('Y-m-d H:i:s');
		$idTheme = $_POST["idtheme"];	
			echo $query="INSERT INTO produit(title, image, introduction, description, lastmod, idtheme) VALUES('".$title."', '".$image."', '".$introduction."', '".$description."', '".$lastMod."', '".$idTheme."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajout� avec succ�s.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function updateArticle($id)
	{
		global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
		$title = $_PUT["title"];
		$image = $_PUT["image"];
		$introduction = $_PUT["introduction"];
		$description = $_PUT["category"];
		$lastMod = 'NULL';
		$idTheme = $_PUT["idtheme"];
		$query="UPDATE produit SET title='".$title."', image='".$image."', introduction='".$introduction."', description='".$description."', idtheme='".$idTheme."' WHERE id=".$id;

		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deleteArticle($id)
	{
		global $conn;
		$query = "DELETE FROM article WHERE id=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit supprime avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du produit a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	switch($request_method)
	{
		
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getArticle($id);
			}
			else
			{
				getArticles();
			}
			break;
			
		case 'POST':
			// Ajouter un produit
			AddArticle();
			break;
			
		case 'PUT':
			// Modifier un produit
			$id = intval($_GET["id"]);
			updateArticle($id);
			break;
			
		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			deleteArticle($id);
			break;
		case 'OPTIONS':
			sendHeaders('GET, POST, PUT, PATCH');
			break;
			default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;

	}
?>