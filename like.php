<?php 
session_start();
$get = $_GET['ani'];

include 'banco.php';
$pdo = dbConnect();


$verificar = $pdo->prepare("
	SELECT COUNT(*) AS TOTAL FROM IPET_LIKE
	WHERE LIK_ANI_CODIGO = ?;
");
$verificar->execute([$get]);
$row = $verificar->fetchAll();


$like = false;

if (isset($_SESSION['id_usuario'])) {
	$verificar2 = $pdo->prepare("
		SELECT COUNT(*) AS TOTAL FROM IPET_LIKE
		WHERE LIK_NOR_CODIGO = ? AND LIK_ANI_CODIGO = ?;
	");
	$verificar2->execute([$_SESSION['id_usuario'], $get]);
	$row2 = $verificar2->fetchAll();

	if ($row[0]['TOTAL'] == 0 || $row2[0]['TOTAL'] == 0) {

		$stmt = $pdo->prepare("
			INSERT INTO IPET_LIKE(LIK_NOR_CODIGO , LIK_ANI_CODIGO)
			VALUES (?,?);
			");
		$stmt->execute([$_SESSION['id_usuario'], $get]);
		$like = true;
		// header('location:adocao.php');
	} elseif ($row[0]['TOTAL'] == 1  || $row2[0]['TOTAL'] == 1) {
		$query = "DELETE FROM IPET_LIKE WHERE LIK_ANI_CODIGO=? AND LIK_NOR_CODIGO = ?" ;
		$stmt3 = $pdo->prepare($query);
		$stmt3->execute([$get, $_SESSION['id_usuario']]);
		unset($_SESSION['like']);
		// header('location:adocao.php');
	}
} elseif (isset($_SESSION['id_ong'])) {
	$verificar2 = $pdo->prepare("
		SELECT COUNT(*) AS TOTAL FROM IPET_LIKE
		WHERE LIK_ONG_ID = ? AND LIK_ANI_CODIGO = ?;
		");
	$verificar2->execute([$_SESSION['id_ong'], $get]);
	$row2 = $verificar2->fetchAll();

	if ($row[0]['TOTAL'] == 0 || $row2[0]['TOTAL'] == 0) {

		$stmt = $pdo->prepare("
			INSERT INTO IPET_LIKE(LIK_ONG_ID, LIK_ANI_CODIGO)
			VALUES (?,?);
			");
		$stmt->execute([$_SESSION['id_ong'], $get]);
		$like = true;
		// header('location:adocao.php');
	} elseif ($row[0]['TOTAL'] == 1  || $row2[0]['TOTAL'] == 1) {
		$query = "DELETE FROM IPET_LIKE WHERE LIK_ANI_CODIGO=? AND LIK_ONG_ID = ?" ;
		$stmt3 = $pdo->prepare($query);
		$stmt3->execute([$get, $_SESSION['id_ong']]);
		// header('location:adocao.php');

	}
}

// var_dump($row[0]['TOTAL']);
$likes = $row[0]['TOTAL'] + ($like ? 1 : -1);
?>

<?= $likes ?> like<?= $likes > 1 ? 's' : '' ?>

<a href="like.php?ani=<?= $_GET['ani']?>" class="like <?= $like ? 'liked' : 'normal' ?>">like</a>

