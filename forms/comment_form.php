<?php
function get_comment_form( $path, $action = 'new', $comment = null){
    return '<form method="post" action="'.$path.'" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>'.(($action =='edit') ? "Редагувати комментар '$comment->content'" : 'Додати новий комментар.').'</h2>
            <div class="form-group">
                <div class="col-sm-10">
                    <input value="'.($comment ? $comment->content : null).'"type="text" name="content" class="form-control" id="content" placeholder="Коментар.."/>
                </div>
            </div>
            <input type="submit" class="btn btn-danger col-md-2 col-md-offset-10" value="'.(($action =='edit') ? 'Оновити' : 'Зберегти').'"/>
            <a class="btn btn-danger" href="/">Посилання на головну сторінку.</a>
        </form>';
}