    <!-- src/Template/Users/edit.ctp -->
    <div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit  User') ?></legend>
        <?=$this->Form->input('username')?>
        <?=$this->Form->input('password')?>
        <?=$this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'user' => 'User']
        ]) ?>
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>`
</div>

