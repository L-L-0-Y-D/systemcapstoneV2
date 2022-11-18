<?php
session_start();
//submit_rating.php

$con = new PDO("mysql:host=localhost;dbname=u217632220_ieatwebsite", "u217632220_ieat", "Hj1@8QuF3C");


if(isset($_POST["rating_data"]))
{
	$data = array(
		':user_name'		=>	$_POST["user_name"],
		':userid'			=>	$_POST["userid"],
		':businessid'		=>	$_POST["businessid"],
		// ':review_status'	=>	$_POST["review_status"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	time()
	);

	$review = array(
		':reservationid'	=>	$_POST["reservationid"],
		':review_status'	=>	$_POST["review_status"]
		
	);


	$query = "
	INSERT INTO review_table 
	(user_name, userid, businessid, user_rating, user_review, datetime) 
	VALUES (:user_name, :userid, :businessid, :user_rating, :user_review, :datetime)
	";

	$review_query = "UPDATE reservations SET review=:review_status WHERE reservationid=:reservationid";



	$statement = $con->prepare($query);

	$statement->execute($data);

	$review_statement = $con->prepare($review_query);
	
	$review_statement -> execute($review);

	// redirect("index.php", "Your Review & Rating Successfully Submitted","success");
	echo "Your Review & Rating Successfully Submitted"; 

}

	if(isset($_POST["action"]))
	{
		if(isset($_GET['id']))
        {
		$id = $_GET['id'];
		$businessid = $id;
		$userid = 0;
		$average_rating = 0;
		$total_review = 0;
		$five_star_review = 0;
		$four_star_review = 0;
		$three_star_review = 0;
		$two_star_review = 0;
		$one_star_review = 0;
		$total_user_rating = 0;
		$review_content = array();

		$query = "
		SELECT * FROM review_table WHERE businessid = $businessid
		ORDER BY review_id DESC
		";

		$result = $con->query($query, PDO::FETCH_ASSOC);

		foreach($result as $row)
		{
			$review_content[] = array(
				'user_name'		=>	$row["user_name"],
				'userid'		=>	$row["userid"],
				'businessid'	=>	$row["businessid"],
				'user_review'	=>	$row["user_review"],
				'rating'		=>	$row["user_rating"],
				'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
			);

			if($row["user_rating"] == '5')
			{
				$five_star_review++;
			}

			if($row["user_rating"] == '4')
			{
				$four_star_review++;
			}

			if($row["user_rating"] == '3')
			{
				$three_star_review++;
			}

			if($row["user_rating"] == '2')
			{
				$two_star_review++;
			}

			if($row["user_rating"] == '1')
			{
				$one_star_review++;
			}

			$total_review++;

			$total_user_rating = $total_user_rating + $row["user_rating"];

		}

		$average_rating = $total_user_rating / $total_review;

		$output = array(
			'average_rating'	=>	number_format($average_rating, 1),
			'total_review'		=>	$total_review,
			'five_star_review'	=>	$five_star_review,
			'four_star_review'	=>	$four_star_review,
			'three_star_review'	=>	$three_star_review,
			'two_star_review'	=>	$two_star_review,
			'one_star_review'	=>	$one_star_review,
			'review_data'		=>	$review_content
		);
		$result = array_filter($output);
		var_dump($result);
		echo json_encode($result);

	}
		
	}



		



?>