<?php

$db = new mysqli('localhost', 'root', '', 'cmanage');

if (!$db) 
	{

    echo 'Could not connect to the database.';
	
	} 
	else 
	{

            if (isset($_POST['queryString']) && isset($_POST['list'])) 
		{
                $queryString = $db->real_escape_string($_POST['queryString']);
                $searchby = $db->real_escape_string($_POST['list']);
                        if (strlen($queryString) > 0) 
			{

            $qry = "SELECT $searchby FROM php WHERE $searchby LIKE '$queryString%' LIMIT 10";
            $query = $db->query($qry);
                                if ($query)
				{
                                echo '<ul>';
                                while ($result = $query->fetch_object()) 
					{
                                //echo '<li onClick="fill(\''.addslashes($result->fname).'\');">'.$result->fname.'</li>';
                                echo '<a href="elibadd.php?searchby='.$searchby.'&searchname=' . addslashes($result->$searchby) . '"><li onClick="fill(\'' . addslashes($result->$searchby) . '\');">' . $result->$searchby . '</li></a>';
                                        }
                                echo '</ul>';
				
                                } 
		 		else 
				{
                                echo 'Please Select Any 1 Value';
                                }
                        } 
                } 
            else 
            {
            echo 'There should be no direct access to this script!';
            }
}
?>