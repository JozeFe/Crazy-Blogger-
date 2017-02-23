<div class="starter-template col-xs-12 col-md-6">
    <h2>Articles</h2>
    <p>Here is a list of all articles:</p>

    <?php foreach($articles as $article) { ?>
    <p>
        <h4><?php echo $article->title; ?> <small><?php echo $article->date; ?></small></h4>
        <p><?php echo $article->description; ?></p>
        <a class="btn btn-default" href="?controller=articles&action=p_show&id=<?php echo $article->id; ?>" role="button">Read more >></a>
    </p>
<?php } ?>
</div>
