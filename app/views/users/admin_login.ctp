<h3>Administration Control Panel Login</h3>
         <a href="#" class="forgot_pass">Forgot password</a> 
         
          <?php echo $form->create('User', array('action' => 'login', 'class' => 'niceform')); ?>         
                <fieldset>
                    <dl>
                        <dt><label for="username">Username:</label></dt>
                        <dd><?php echo $form->input('username', array('label' => '', 'size' => '54'))?></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><?php echo $form->input('password', array('label' => '', 'size' => '54'))?></dd>
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        <dd>
                    <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Remember me</label>
                        </dd>
                    </dl>
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>
                    
                </fieldset>
      <?php echo $form->end()?>
