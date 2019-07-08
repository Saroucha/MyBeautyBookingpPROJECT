<?php
//importing dbDetails file
require_once 'connstan.php';
 
//this is our upload folder
$upload_path = 'uploads/';
$upload_path2 = 'upload/';
 
//Getting the server ip
$server_ip = gethostbyname(gethostname());
 
//creating the upload url
$upload_url = 'http://'.$server_ip.'/beautybooking/'.$upload_path;

$upload_url2 = 'http://'.$server_ip.'/beautybooking/'.$upload_path2;
 
//response array
$response = array();
$DefaultId = 0;
 

 
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    //checking the required parameters from the request
    if(isset($_POST['TVA']) and isset($_FILES['pdf']['TVA']) and isset($_POST['NomComplet']) and isset($_POST['image_tag']) and isset($_POST['Phone']) and isset($_POST['Email']) and isset($_POST['Password'])and isset($_POST['Adresse']) and isset($_POST['Postale'])and isset($_POST['NomEntreprise'])and isset($_POST['Description'])and isset($_POST['Siege'])and isset($_POST['Denomination'])and isset($_POST['Registre']) )
    {
        $ImageData = $_POST['image_data'];
        $ImageName = $_POST['image_tag'];
        $Full_Name = $_POST['NomComplet'];
        $Phone=$_POST['Phone'];
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];
        $Password=sha1($Password);
        $Adresse=$_POST['Adresse'];
        $Postale=$_POST['Postale'];
        $Nom=$_POST['NomEntreprise'];
        $Description=$_POST['Description'];
        $Siege=$_POST['Siege'];
        $Denomination=$_POST['Denomination'];
        $Registre=$_POST['Registre'];
        
   //connecting to the database
        $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('Unable to Connect...');     
        //getting name from the request
        $name = $_POST['TVA'];
 
        //getting file info from the request
        $fileinfo = pathinfo($_FILES['pdf']['TVA']);

        //getting the file extension
        $extension = $fileinfo['extension'];
  
        //file url to store in the database
        $file_url = $upload_url . getFileName() . '.' . $extension;
       
       
       
        //file path to upload in the server
        $file_path = $upload_path . getFileName() . $name .'.'. $extension;
 
        //trying to save the file in the directory
        try{
            //saving the file
            move_uploaded_file($_FILES['pdf']['tmp_name'],$file_path);
            $ImagePath = "upload/$ImageName.jpg";
            $ServerURL = "beautybooking/$ImagePath";
           
            $sql = "INSERT INTO `Pros` (`id`,`NomComplet`,`Phone`,`Email`,`Password`,`Adresse`,`image_path`,`image_name`,`Postale`,`NomEntreprise`,`Description`,`Siege`,`Denomination`,`Registre`, `url`,`TVA`,`Traite`,`Actif`) VALUES (NULL,$Full_Name,'$Phone','$Email','$Password','$Adresse','$ServerURL','$ImageName','$Postale','$Nom','$Description','$Siege','$Denomination','$Registre','$file_url', '$name','0','0');";
 
            //adding the path and name to database
            if(mysqli_query($con,$sql)){
            
        file_put_contents($ImagePath,base64_decode($ImageData));

            echo "Your Image Has Been Uploaded.";
                //filling response array with values
                $response['error'] = false;
                $response['url'] = $file_url;
                $response['TVA'] = $name;
                $response['NomComplet']=$Full_Name;
                $response['Phone']=$Phone;
                $response['Email']=$Email;
                $response['Password']=$Password;
                $response['Adresse']=$Adresse;
                $response['Postale']=$Postale;
                $response['NomEntreprise']=$Nom;
                $response['Description']=$Description;
                $response['Siege']=$Siege;
                $response['Denomination']=$Denomination;
                $response['Registre']=$Registre;
                
                
           
            }
            //if some error occurred
        }catch(Exception $e){
            $response['error']=true;
            $response['message']=$e->getMessage();
        } 
        //closing the connection
        mysqli_close($con);
    }else{
        $response['error']=true;
        $response['message']='Please choose a file';
    }
    
    //displaying the response
    echo json_encode($response);
}
 
/*
We are generating the file name
so this method will return a file name for the image to be upload
*/
function getFileName(){
    $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('Unable to Connect...');
    $sql = "SELECT max(id) as id FROM Pro";
    $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
    mysqli_close($con);
    if($result['id']==null)
        return 1;
    else
        return ++$result['id'];
}