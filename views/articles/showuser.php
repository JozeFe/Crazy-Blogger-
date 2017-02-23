<div class="starter-template col-xs-12 col-md-10">
    <h2>Your articles are: </h2>

    <table class="table table-bordered">
        <tr>
            <td><strong>#</strong></td>
            <td><strong>Title</strong></td>
            <td><strong>Description</strong></td>
            <td><strong>ActionEdit</strong></td>
            <td><strong>ActionDelete</strong></td>
        </tr>
        <?php
        $i = 0;
        foreach($articles as $article) {
            $i++;?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $article->title; ?></td>
            <td><?php echo $article->description; ?></td>
            <td><a class="btn btn-primary" href="?controller=articles&action=p_edit&id=<?php echo $article->id; ?>" role="button">Edit</a></td>
            <td><button class="deleteArticle btn btn-danger" value="<?php echo $article->id; ?>">Delete</button></td>
        </tr>
    <?php } ?>
    </table>
</div>