<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  AntraktorDatabase::delete_antrakt_movie_db();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
  AntraktorDatabase::create_antrakt_movie_db();
}
AntraktorMovieManager::get_column_names();







?>



<form method="post">
  <input type="submit" value="delete" name="delete">
  <input type="submit" value="create" name="create">
</form>
