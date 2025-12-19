to setup the application 
first run 'composer install' command and then 'php artisan serve' (need local serve rlike xampp apache) this will host the local server

for setting up smtp configuration
Step 1: Prepare Your Gmail Account
        Enable 2-Step Verification (2FA):

        Go to Google Account → Security → 2-Step Verification

step 2        
Create an App Password:

after enabling 2 step verification
go to app paswords section
then give the name to your application and then generate password(it will give a 16 letter passowrd copy it)
then configure the .env mail setup

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_mail@gmail.com
MAIL_PASSWORD=passoword you coipied
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="HR Team"

and then you're all done with smtp setup and ready to send mails perfectly via this application.

for your ease I'm also sharing the smtp setup i created to test the functionality of this app

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=adarshkumarsingh109@gmail.com
MAIL_PASSWORD=czfbgxginjmtwooi
MAIL_FROM_ADDRESS=adarshkumarsingh109@gmail.com
MAIL_FROM_NAME="HR Team"

you can use this credential directly to check the email.
