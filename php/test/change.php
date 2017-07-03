<?php

//function fnSanitizePost($data, $sdb="MySQL")

function fnSanitizePost($data, $sdb)



{



  //escapes,strips and trims all members of the post array



  if(is_array($data))



  {



    $areturn = array();



    foreach($data as $skey=>$svalue)



    {



      $areturn[$skey] = fnSanitizePost($svalue);



    }



    return $areturn;



  }



  else



  {



    if(!is_numeric($data))



    {



      //with magic quotes on, the input gets escaped twice, we want to avoid this.



      if(get_magic_quotes_gpc()) //gets current configuration setting of magic quotes



      {



        $data = stripslashes($data);



      }



      //escapes a string for insertion into the database



      switch($sdb)



      {



      	case "MySQL":



      	  $data = mysqli_real_escape_string($data);



      	  break;



      	case "PG":



      	  $data = pg_escape_string($data);



      	  break;



      }







      $data = strip_tags($data);  //strips HTML and PHP tags from a string



    }



    $data = trim($data);  //trims whitespace from beginning and end of a string



    return $data;



  }



}

///////////////////////////////////////////////////////////

function sanitise($data)

{

//escapes,strips and trims all members of the post array

	if(is_array($data))

	{

		$areturn = array();

		foreach($data as $skey=>$svalue)

			{

			$areturn[$skey] = fnSanitizePost($svalue);

			}

		return $areturn;

	}

	else

	{

		if(!is_numeric($data))

		{

		//with magic quotes on, the input gets escaped twice, we want to avoid this.

		if(get_magic_quotes_gpc()) //gets current configuration setting of magic quotes

			{

			$data = stripslashes($data);

			}

      //escapes a string for insertion into the database

      $data = strip_tags($data);  //strips HTML and PHP tags from a string

    }

    $data = trim($data);  //trims whitespace from beginning and end of a string

    return $data;

  }

}

//ZSDSDadasdasd

?>



