<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <meta charset="utf-8"/>
</head>
<body>
<h1><?= $head ?></h1>
<div style="width: 50%">
    <?= $this->Form->create() ?>
    <?= $this->Form->input('email', ['class' => 'form-control']) ?>
    <?= $this->Form->input('password', ['class' => 'form-control']) ?>
    <div class="col-lg-10" style="padding: 10px;padding-left: 0;">
        <?= $this->Form->button(__($head), ['class' => 'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</body>
</html>
