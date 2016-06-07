<?php
$this->Form->templates([
    'inputContainer' => '<div class="form-group">{{content}}<span class="help">{{help}}</span></div>',
    'formGroup' => '{{label}}<div class="col-lg-10">{{input}}</div>',
]);
?>
<div style="margin: 50px">
    <?= $this->Form->create($post,['class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __($head) ?></legend>
        <?php
            echo $this->Form->input('title',
                [
                    'label' => [
                        'class' => 'col-lg-2 control-label'],
                    'class'=>'form-control',
                ]);
            echo $this->Form->input('body',[
                'label' => [
                    'class' => 'col-lg-2 control-label'],
                'class'=>'form-control',
                'rows'=>'15'
            ]);
            echo $this->Form->input('category_id', ['options' => $category,
                'label' => [
                    'class' => 'col-lg-2 control-label',],
                'class'=>'form-control'
            ]);
        ?>
        <div class="col-lg-10 col-lg-offset-2" style="float: right;padding-left: 0">
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        </div>
    </fieldset>

    <?= $this->Form->end() ?>
</div>

