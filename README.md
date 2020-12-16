Configuration: 
    PHP version 7.1.x
    codeIgnitor 3.1.11
    mysql

    
Work Flow

1. Fist page will be the login page.
    -> logged in user can login through emial/password
    -> if he dpn't have login id password then he has to sign-up first 
    -> once the use registered in this portal, not able to login because his account has to activate by admin.
   
2. Admin Dashboard
    -> admin login with admin@123/admin
    -> after login he view all the users and give authenticate to login to the portal by making them active users.
    -> and also he can view FAQ section of all the users and he assign that question to rest of the active admin to answer and he can change the status of that question by open to closed.
    -> admin can add user by clicking add user button and username/password will sent to that email id.
    
3. User Dashboard
    -> user can view all FAQ and he can ask the question and see status of his questions only.



Changes need to do for run this project


1) In config.php  file give base url path 
    $config['base_url'] = 'http://localhost/BioQuest'; //here i have given the localhost and folder name as base_path
 
2) Has to change give DB name, user name and password in database.php file

3) To send mail through your's mail id change mail id and password in 2 files
    Under User controller 
    addCustomUser()
   
   and 
    
    Under Pages controller 
    signin()
    
4) Here i am using email as username.
    
    