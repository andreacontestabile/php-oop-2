<?php
class User {
  public $id;
  public $name;
  public $lastname;
  public $username;
  public $email;
  public $password;
  private $loggedIn = false;

  public function __construct($_username, $_email, $_password) {
    $this->username = $_username;
    $this->email = $_email;
    $this->password = $_password;
  }

  public function getFullName() {
    return $this->name. " " .$this->lastname;
  }

  public function logIn() {
    $this->loggedIn = true;
  }

  public function logOut() {
    $this->loggedIn = false;
  }

  public function isLoggedIn() {
    return $this->loggedIn;
  }


}

class Administrator extends User {

  protected function createNewPost($postName) {
    echo "L'amministratore $this->username ha creato il post: $postName";
  }

  protected function banUser($user) {
    echo "L'amministratore $this->username ha bannato l'utente $user->username";
  }
}

$andrea = new User("Seven897", "andreacontest@gmail.com", "password12345");
$andrea->logIn(); 

$mario = new User("Teemo123", "mario.rossi@gmail.com", "yasuo12345");

$silvia = new User("Silver91", "silvia.rossetti@yahoo.com", "parolasegreta765");
$silvia->name = "Silvia";
$silvia->lastname = "Rossetti";
$silvia->logIn();

$lucia = new User("Lux77", "lucia.bertini@libero.it", "demacia404");
$lucia->logIn();

$users = [$andrea, $mario, $silvia, $lucia];

$luca = new Administrator("SuperAdmin9000", "superadmin9000@gmail.com", "getbanned666");

$carlo = new Administrator("JudgeAndJury89", "carlo.giudici@gmail.com", "dredd1989");
$carlo->logIn();

$admins = [$luca, $carlo];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>PHP OOP</title>
</head>
<body>
  <div class="container">
    <h1>Lista Utenti</h1>
    <h2>Utenti</h2>
    <table>
      <thead>
        <tr>
          <th class="table-heading">Full Name</th>
          <th class="table-heading">Username</th>
          <th class="table-heading">Email</th>
          <th class="table-heading">Password</th>
          <th class="table-heading">Online</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
              <td><?php echo $user->getFullName() ?></td>
              <td><?php echo $user->username ?></td>
              <td><?php echo $user->email ?></td>
              <td><?php echo $user->password ?></td>
              <?php if($user->isLoggedIn() == true): ?>
                <td class="green">
                  <i class="fas fa-check"></i>
                </td>
              <?php else: ?>
                <td class="red">
                  <i class="fas fa-times"></i>
                </td>
              <?php endif ?>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <h2>Amministratori</h2>
    <table>
      <thead>
        <tr>
          <th class="table-heading">Username</th>
          <th class="table-heading">Email</th>
          <th class="table-heading">Online</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($admins as $admin): ?>
          <tr>
              <td><?php echo $admin->username ?></td>
              <td><?php echo $admin->email ?></td>
              <?php if($admin->isLoggedIn() == true): ?>
                <td class="green">
                  <i class="fas fa-check"></i>
                </td>
              <?php else: ?>
                <td class="red">
                  <i class="fas fa-times"></i>
                </td>
              <?php endif ?>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>