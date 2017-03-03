<?php
function get_post_form( $path, $action = 'new', $post = null){
    return '<form method="post" action="'.$path.'" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>'.(($action =='edit') ? "Редагувати пост '$post->title'" : 'Додати новий пост.').'</h2>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Заголовок</label>
                <div class="col-sm-10">
                    <input value="'.($post ? $post->title : null).'"type="text" name="title" class="form-control" id="title" placeholder="Назва посту..."/>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Опис</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Зміст посту...">'.($post ? $post->description : null).'</textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-danger col-md-2 col-md-offset-10" value="'.(($action =='edit') ? 'Оновити' : 'Зберегти').'"/>
            <a class="btn btn-danger" href="/">Посилання на головну сторінку.</a>
        </form>';
}
