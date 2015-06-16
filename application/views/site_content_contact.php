<div id="body">
    <div class="content">
        <div id="contact">
        <?php
            $this->load->helper("form");
            
            echo $message;
                        
            echo validation_errors();
            
                echo form_open("site/send_email");
                
                //Label for inputfield
                echo form_label("Name: ","fullName")."<br>";
                //Attributes for inputfield
                $data = array(
                    "name"=>"fullName",
                    "id"=>"fullName",
                    "value"=>  set_value("fullName"),
                    "placeholder"=>"Please enter your name!",
                    "required"=>""                    
                );
                echo form_input($data)."<br>";

                //Label for inputfield
                echo form_label("Email: ","email")."<br>";
                //Attributes for inputfield
                $data = array(
                    "name"=>"email",
                    "id"=>"email",
                    "value"=>set_value("email"),
                    "placeholder"=>"Please enter your email!",
                    "required"=>""  
                );
                echo form_input($data)."<br>";
                
                //Label for inputfield
                echo form_label("Message: ","message")."<br>";
                //Attributes for inputfield
                $data = array(
                    "name"=>"message",
                    "id"=>"message",
                    "value"=>  set_value("message"),
                    "placeholder"=>"Please enter your message!"
                );
                echo form_textarea($data)."<br><br>";
                
                //Submit button
                echo form_submit("Submit","Submit");

            echo form_close();
        
        ?>
        </div>
    </div>
</div>