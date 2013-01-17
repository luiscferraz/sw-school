<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <h2>Login</h2>
        <?php echo $this->Form->input('username',array('class'=>'text-field', 'placeholder'=>'Login'));
        echo $this->Form->input('password',array('class'=>'text-field', 'placeholder'=>'Senha'));
    ?>
<?php echo $this->Form->end(__('Login'));?>
</div>

