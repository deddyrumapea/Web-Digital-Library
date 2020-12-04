<?php 
include 'database/inc.php';
include 'functions/queries.php';

// Showing books list
$limit = (isset($_GET["limit"]) && ($_GET["limit"] % 3 == 0) && ($_GET["limit"] > 0))? $_GET["limit"] : 6;
$total = (int) queryRead("SELECT COUNT(*) AS total FROM book")[0]["total"];
$pages = ceil($total / $limit);
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$offset = $limit * ($page - 1);

$books =  queryRead("SELECT * FROM book ORDER BY title LIMIT $offset, $limit");
$params = "?limit=$limit";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Digital Library</title>
	<link rel="stylesheet" href="assets/styles/styles.css">
	<link rel="shortcut icon" type="image/ico" href="assets/images/logo.png"/>
</head>
<body>
	<header>
		<nav class="nav-menu">
			<h1><img class="logo" src="assets/images/logo.png"><a href="">DIGITAL LIBRARY</a></h1>
			<input class="search-bar" type="text" placeholder="Search">
			<a href="#"><i class="fas fa-plus-circle"></i> ADD BOOK</a>
			<!-- IF SESSSION DOES NOT EXIST -->
			<a href="login.php">LOGIN</a>
			<a href="#">PROFILE</a>
		</nav>
	</header>
	<main>
		<div class="page-nav-limit">
			<p>Show
				<select onchange="location.replace(`?limit=${this.value}`)" name="limit">
					<?php for ($i = 6; $i <= 18; $i += 3) : ?>
						<option value="<?= $i; ?>" <?= ($i == $limit)? "selected" : ""; ?>>
							<?= $i; ?>
						</option>
					<?php endfor; ?>
				</select>
				data per page
			</p>
		</div>
		<div class="page-nav">

			<a href="<?= ($page > 1) ? $params."&page=".($page - 1) : "#"; ?>"><button>
				<i class="fas fa-angle-left"></i> Previous
			</button></a>
			<?php for ($i = 1; $i <= $pages; $i++): ?>
				<a href="<?= $params."&page=".$i; ?>"><button <?= ($i == $page) ? "class='active' disabled" : ""; ?>>
					<?= $i; ?>
				</button></a>
			<?php endfor; ?>
			<a href="<?= ($page < $pages) ? $params."&page=".($page + 1) : "#"; ?>"><button>
				Next <i class="fas fa-angle-right"></i>
			</button></a>
		</div>
		<div class="books-list-container cf">
			<?php foreach ($books as $row) : ?>
				<div class="book">
					<img src="<?= $row["cover_img"]; ?>" alt="<?= $row["title"]; ?>" class="img-book-cover">
					<div class="book-spec">
						<p class="book-title"><?= $row["title"]; ?></p>
						<p class="book-author"><i class="far fa-user"></i> <?= $row["author"]; ?></p>
						<p class="book-publisher"><i class="far fa-building"></i> <?= $row["publisher"]; ?></p>
						<p class="book-year"><i class="far fa-calendar-alt"></i> <?= $row["year"]; ?></p>
						<p class="book-pages"><i class="far fa-file-alt"></i> <?= $row["pages"]; ?> pages</p>
						<div class="book-action-container">
							<a href="#"><button class="btn-edit"><i class="far fa-edit"></i> Edit</button></a>
							<a href="#"><button class="btn-delete"><i class="far fa-trash-alt"></i> Delete</button></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="page-nav">
			<a href="<?= ($page > 1) ? $params."&page=".($page - 1) : "#"; ?>"><button>
				<i class="fas fa-angle-left"></i> Previous
			</button></a>
			<?php for ($i = 1; $i <= $pages; $i++): ?>
				<a href="<?= $params."&page=".$i; ?>"><button <?= ($i == $page) ? "class='active' disabled" : ""; ?>>
					<?= $i; ?>
				</button></a>
			<?php endfor; ?>
			<a href="<?= ($page < $pages) ? $params."&page=".($page + 1) : "#"; ?>"><button>
				Next <i class="fas fa-angle-right"></i>
			</button></a>
		</div>
	</main>
	<footer>
		<p>&copy 2020 Deddy Romnan Rumapea</p>
	</footer>

	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>