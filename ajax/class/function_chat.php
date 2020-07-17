<?php 

	class DataBase {

		public $pdo;
		public $host = 'localhost';
		public $user = "root";
		public $pass = "";
		public $db = "chat_crychat";

		function connect () {
			$dsn = 'mysql:host=' .$this->host.';dbname='.$this->db;
			$this->pdo = new PDO($dsn, $this->user, $this->pass);
		}
	}

	class Chat extends DataBase {

		public $Name;
		public $id_user;
		function __construct($Name) {
			if ($Name == NULL) {
				$this->connect();
				$this->Recall_number();
			}
			else
			{
				$this->Name = $Name;
			}
		}

		function Add_User () {
			$query = 'INSERT INTO `users`(`Nickname`) VALUES ("'.$this->Name.'")';
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
		}

		function Add_Message_User ($MassageUS) {

			$query = 'INSERT INTO `message`(`ID_User`, `TextMassage`, `Data_Message`) VALUES ("'.$this->id_user.'", "'.$MassageUS.'", CURRENT_DATE())';
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
			
		}

		function Massage_Delete ($id_entry) {
			$query = 'DELETE FROM `message` WHERE `id_entry` = ? && `ID_User` = ?';

			$params = [$id_entry, $this->id_user];
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($params);
		}

		function Show_All_Message () {

			$delete = "";
			$edit = "";
			$sql = 'SELECT message.id_entry, message.ID_User, users.Nickname, message.TextMassage, message.Data_Message FROM `message` INNER JOIN `users` ON users.ID_User = message.ID_User';

			$result = $this->pdo->query($sql);

			while ($card = $result->fetch(PDO::FETCH_OBJ)){
			if (isset($_SESSION['id_user'])){
				if ($_SESSION['id_user'] == $card->ID_User) {
					$delete = "<a id=\"delete\" data-identry=\"$card->id_entry\" href=\"#\">Удалить</a>";
					$edit = "<a id=\"edit\" data-identry=\"$card->id_entry\" href=\"#\">Изменить</a> <a id=\"back\"href=\"#\">Отмена</a>";
				}
			}
			echo "<div class=\"message-wrapper them\">
              		<div class=\"circle-wrapper animated bounceIn\"></div>
              		<div class=\"text-wrapper animated fadeIn\"><span>".$card->Nickname.": </span><br>".$card->TextMassage."<br><span>".$card->Data_Message."</span></div>
            	</div><div class=\"box_edit\">".$delete.$edit."</div>";
			}
		}

		function Massage_Text ($id_entry) {
			$stmt = $this->pdo->prepare('SELECT `TextMassage` FROM `message` WHERE `id_entry` = ? && `ID_User` = ?');
			$params = [$id_entry, $this->id_user];
			$stmt->execute($params);
			return $stmt->fetchColumn();
		}

		function Edit_Message_User ($MassageUS, $id_entry) {

			$query = 'UPDATE `message` SET `TextMassage`= :textMassage WHERE `id_entry` = :identry && `ID_User` = :idUser';
			$params = [
			':textMassage' => $MassageUS,
			':identry' => $id_entry,
			':idUser' => $this->id_user
			];
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($params);
			
		}

		function Autotification () {
			$stmt = $this->pdo->prepare('SELECT `ID_User` FROM `users` WHERE `Nickname` = "'.$this->Name.'"');
			$stmt->execute();
			$this->id_user = $stmt->fetchColumn();
		}

		function Recall_number () {
			if (isset($_SESSION['id_user']))
			{
				$this->id_user = $_SESSION['id_user'];
				$stmt = $this->pdo->prepare('SELECT `Nickname` FROM `users` WHERE `ID_User` = '.$this->id_user);
				$stmt->execute();
				$this->Name = $stmt->fetchColumn();
			}
		
		}

	}

?>