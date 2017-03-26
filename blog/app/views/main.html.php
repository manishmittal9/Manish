<?php 
    
    foreach($posts as $p):

?>
	<div class="post">
		<h2><a href="<?php echo $p->url?>"><?php echo $p->title ?></a></h2>

		<div class="date"><?php echo date('d F Y', $p->date)?></div>

		<?php echo $p->body?>

	</div>
<?php endforeach;?>

<?php if ($has_pagination['prev']):?>
	<a href="?page=<?php echo $page-1?>" class="btn btn-dark btn-lg pagination-arrow newer" style="text-decoration:none; color:white;">Newer</a>
<?php endif;?>

<?php if ($has_pagination['next']):?>
	<a href="?page=<?php echo $page+1?>" class="btn btn-dark btn-lg pagination-arrow older" style="text-decoration:none; color:white;">Older</a>
<?php endif;?>
