<div class="page-header" id="banner">
    <h1>Тестовое задание Блог</h1>
</div>
<div class="row">

    <div class="col-sm-8 blog-main">
        <?php foreach ($post as $post): ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?= h($post->title) ?></h2>
                <p class="blog-post-meta"><?= h($post->created) . ' пользователь <a>' . $post->user->email . '</a> категория <a>' .
                    $this->Html->link(__($post->category->title), ['controller' => 'post', 'action' => 'category', 'id' => $post->category->id]) . '</a>' ?></p>
                <?= $this->Text->autoParagraph(h($post->body)); ?>
                <p class="blog-post-meta">
                    <?php if ($auth->user('id') == $post->user_id): ?>
                        <?= $this->Html->link(__('редактировать'), ['controller' => 'post', 'action' => 'edit', 'id' => $post->id]) ?>
                        <?= $this->Form->postLink(
                            __('удалить'),
                            ['controller' => 'post', 'action' => 'delete', $post->id],
                            ['confirm' => __('Вы действительно хотите удалить {0}?', $post->title)])
                        ?>
                    <?php endif ?>
                </p>
            </div>
        <?php endforeach; ?>

        <nav>
            <ul class="pager">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
        </nav>
    </div>

    <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <?php echo $this->element('about'); ?>
        </div>
        <div class="sidebar-module">
            <h4>Категории</h4>
            <ol class="list-unstyled">
                <li>
                    <b><?= $this->Html->link(__('все категории'), ['controller' => 'post', 'action' => 'index']) ?></b>
                </li>
                <!-- CATEGORY LIST-->
                <?php foreach ($cats as $cat): ?>
                    <li>
                        <?= $this->Html->link(__($cat->title), ['controller' => 'post', 'action' => 'category', 'id' => $cat->id]) ?>
                        <?php if ($auth->user('id') == 1): ?>
                            <span style="font-size: 8pt">
                                <?= $this->Html->link(__('редактировать'), ['controller' => 'category', 'action' => 'edit', 'id' => $cat->id]) ?>
                                /<?= $this->Form->postLink(
                                    __('удалить'),
                                    ['controller' => 'category', 'action' => 'delete', $cat->id],
                                    ['confirm' => __('Вы действительно хотите удалить {0}?', $cat->title)])
                                ?>
                            </span>

                        <?php endif ?>
                    </li>
                <?php endforeach; ?>
                <!-- END CATEGORY LIST-->
            </ol>
        </div>
    </div>

</div>
<!-- /.end row-->







