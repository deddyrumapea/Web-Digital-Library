<?php 
include 'database/inc.php';
include 'functions/queries.php';

// Showing books list
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$limit = (isset($_GET["limit"]) && ($_GET["limit"] % 3 == 0) && ($_GET["limit"] > 6))? $_GET["limit"] : 6;
$offset = $limit * ($page - 1);
$params = "?limit=$limit";

if (isset($_GET["search"]) && trim($_GET["search"]) != "") {
	$search = htmlspecialchars($_GET["search"]);
	$params .= "&search=$search";
	$total = (int) queryRead("SELECT COUNT(*) AS total FROM book WHERE title LIKE '%$search%'")[0]["total"];
	$books = queryRead("SELECT * FROM book WHERE title LIKE '%$search%' ORDER BY title LIMIT $offset, $limit");
} else {
	$total = (int) queryRead("SELECT COUNT(*) AS total FROM book")[0]["total"];	
	$books =  queryRead("SELECT * FROM book ORDER BY title LIMIT $offset, $limit");
}

$pages = ceil($total / $limit);
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
			<h1><img class="logo" src="assets/images/logo.png"><a href="./">DIGITAL LIBRARY</a></h1>
			<form action="" method="get">
				<input name="search" class="search-bar" type="text" placeholder="Search" <?= (isset($search)) ? "value='$search'" : ""; ?>>
			</form>
			<a href="#"><i class="fas fa-plus-circle"></i> ADD BOOK</a>
			<!-- IF SESSSION DOES NOT EXIST -->
			<a href="login.php">LOGIN</a>
			<a href="#">PROFILE</a>
		</nav>
	</header>
	<main>
		<?php if (isset($search)) { ?>
			<?php if (sizeof($books) > 0) { ?>
				<div class="search-info">
					<p>Search results for '<?= $search; ?>'</p>
				</div>
			<?php } else { ?>
				<div class="search-info">
					<p>We couldn't find any search results matching '<?= $search; ?>'. <a href="./">Go back.</a></p>
				</div>
			<?php } ?>
		<?php } ?>

		<?php if (sizeof($books) > 0) : ?>
			<div class="page-nav-limit">
				<p>Show
					<select onchange="location.replace(`<?= $params; ?>&limit=${this.value}`)" name="limit">
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
		<?php endif; ?>

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

		<?php if (sizeof($books) > 0) : ?>
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
		<?php endif; ?>

	</main>
	<footer>
		<p>&copy 2020 Deddy Romnan Rumapea</p>
	</footer>

	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>