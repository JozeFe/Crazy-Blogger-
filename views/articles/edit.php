<div class="starter-template col-xs-12 col-md-8">
    <h2>Create new article</h2>
    <form id="inputEdit" class="form-horizontal" action="?controller=articles&action=update&id=<?php echo $article->id;?>" method="post">
        <div class="form-group">
            <label for="inputEdit" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputTitle" placeholder="Title" value="<?php echo $article->title;?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEdit" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="2" name="inputDescription" placeholder="Description"><?php echo $article->description;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEdit" class="col-sm-2 control-label">Text</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="10" name="inputText" placeholder="Text"><?php echo $article->text;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Save Changes</button>
            </div>
        </div>
    </form>
</div>