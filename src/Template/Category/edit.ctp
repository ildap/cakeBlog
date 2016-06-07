<div class="category form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __($head) ?></legend>
        <?php
        echo $this->Form->input('title', ['class' => 'form-control']);
        ?>
    </fieldset>
    <div class="col-lg-10" style="padding: 10px;padding-left: 0;">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
