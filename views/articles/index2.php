<div class="starter-template col-xs-12 col-md-8">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <h2>Articles</h2>
        <p>Here is a list of all articles:</p>
    </div>
</div>

<div class="row">
    <div id="articlesList" class="articlesList col-xs-12 col-md-12">
        <?php foreach($articles as $article) { ?>
        <div class="artBorder">
            <h4><?php echo $article->title; ?> <small><?php echo $article->date; ?></small></h4>
            <p><?php echo $article->description; ?></p>
            <a class="btn btn-primary" href="?controller=articles&action=p_show&id=<?php echo $article->id; ?>" role="button">Read more >></a>
        </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="btn-group col-xs-12 col-md-12" role="group" aria-label="...">
        <!-- <button type="button" class="articlesPageButton btn btn-default" value="prev">Prev</button> -->
        <?php for($i=1; $i<=$pagescount; $i++) { ?>
        <button type="button" class="articlesPageButton btn btn-default" value="<?php echo $i ?>"><?php echo $i?></button>
        <?php } ?>
        <!-- <button type="button" class="articlesPageButton btn btn-default" value="next">Next</button> -->
    </div>
</div>
</div>
