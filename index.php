<?php
  session_start();
  include_once "lib/db.php";
  if (isset($_REQUEST['function'])) {
    $function = $_REQUEST['function'];

    switch ($function) {
      case 'createnote':
        create_note($conn, $_SESSION['user_id']);
        break;

      case 'createaccount':
        create_account($conn);
        break;

      case 'login':
        login($conn);
        break;

      case 'logout':
        logout($conn);
        break;

      default:
        # code...
        break;
    }
  } else {
    header("Location: forms/signup.php"); //Redirect to signup.php if there was no request provided.
  }

  function create_note($conn, $user_id) {
    $user_id = $_SESSION['user_id'];
    $note_title = $_REQUEST['note-title'];
    $note = $_REQUEST['note'];
    $category_name = $_REQUEST['category'];
    $note_sql = <<<SQL
    INSERT INTO notes (user_id, category_id, note_title, note_content)
    VALUES ($user_id, 1, "$note_title", "$note");
SQL;

    $cat_sql = <<<SQL
    INSERT INTO categories (user_id, category_name)
    VALUES ($user_id, "$category_name");
SQL;

    $note_result = $conn->query($note_sql);
    $cat_result = $conn->query($cat_sql);

    if ($note_result && $cat_result) {
      header("Location:dashboard.php");
    } else  {
      echo "The record was not saved to the database." . $conn->error;
    }
  }

  function create_account($conn) {
    $fname_for_sql = $_REQUEST['first_name'];
    $lname_for_sql = $_REQUEST['last_name'];
    $email_for_sql = $_REQUEST['email_id'];
    $loginpw_for_sql = password_hash($_POST['login_pw'], PASSWORD_DEFAULT);
    $sql = <<<SQL
      INSERT INTO user (first_name, last_name, email_id, login_pw)
      VALUES ("$fname_for_sql", "$lname_for_sql", "$email_for_sql", "$loginpw_for_sql");
SQL;

    $result = $conn->query($sql);

    if ($result) {
		//Get the user_id from the database.
		$user_id_sql = <<<SQL
			SELECT user_id FROM user WHERE email_id="$email_for_sql" LIMIT 1;
SQL;

		$user_id_result = $conn->query($user_id_sql);

		$user_id_row = $user_id_result->fetch_assoc();

    	$_SESSION['user_id'] = $user_id_row['user_id'];
      header("Location: dashboard.php");
    } else {
      echo "The account was not created.";
    }
  }

  function login($conn) {
    $email = $_REQUEST['email'];
    $login_pw = $_POST['login_pw'];

    $sql = <<<SQL
      SELECT user_id, login_pw FROM user WHERE email_id = "$email";
SQL;

    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
      try {
        $hashed_password = $row['login_pw'];

        if (password_verify($login_pw, $hashed_password)) {
          $_SESSION['user_id'] = $row['user_id'];
          header("Location: dashboard.php");
        } else {
          header("Location: forms/login.php");
        }
      } catch (Exception $e) {
      	echo $e->getMessage();
        //header("Location: forms/signup.php");
      }

    } else {
      echo "The SQL didn't work.";
    }
  }

  function logout($conn) {
    session_destroy();
    session_unset();
    header("Location: forms/login.php");
  }
?>
