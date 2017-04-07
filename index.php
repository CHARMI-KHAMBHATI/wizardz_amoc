<!DOCTYPE html>

<html>
    <head>
    <title>QuickBucket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/style_home.css">
    <link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Prociono" rel="stylesheet"> 
    <script src="./script/jquery-3.2.0.min.js"></script>
    <script src="./script/bootstrap.min.js"></script>
    <style type="text/css">body{max-height:100vh; overflow-y: hidden;}</style>
    </head>
    <body id="signup" >

    <div >
<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    $_SESSION['email']= $userData['email'];
    $_SESSION['id']= $userData['oauth_uid'];
    
        
    header("location:imageView.php");
    
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a><p color="white" style="font-size: .3em;">Share.Buy.Discuss</p>';
}

?>

<div id="sign_up"><p>Sign In</p><div id="loginThroughGmail"><?php echo $output;?></div></div>

</div>
</body>
</html>
