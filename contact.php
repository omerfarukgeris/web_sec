<pre>
<?php if (isset($_POST['submit'])) { 
	
            $target_path = "uploads/"; 
            $target_path = $target_path . basename($_FILES['file_upload']['name']); 
            $uploaded_name = $_FILES['file_upload']['name']; 
            $uploaded_type = $_FILES['file_upload']['type']; 
            $uploaded_size = $_FILES['file_upload']['size']; 
 
            if (($uploaded_type == "image/jpeg" || $uploaded_type == "image/png")){ 
                if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path)) { 
                 
                    echo 'Hata'; 
                   
                  } else { 
                    
                    echo '<a href="'.$target_path . '">'.$uploaded_name.'</a>'."\nBilgileriniz kaydedildi"; 
                    
                    } 
            } 
            else{ 
           
            echo 'Resim dosyası olmalı..'; 
           
            } 
        } 
?>

