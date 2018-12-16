In the current FAQ Project, I have implemented end to end testing using Laravel Dusk.
To install LAravel Dusk, I followed the given steps:
1. composer require --dev laravel/dusk
2. php artisan dusk:install
3. Ran the example test by using the command- php artisan dusk


In total, I have implemented 11 test cases as following:
1. With the helep of user factory I created a new user to test my aplication. The user first logs into the application by entering his email addredd and password and by clicking on 'Login'.
2. After logging into the application, a user is able to ask a question by clicking on the 'Create Question' button. He cna then ask his question, by cicking on the 'Save' button, he can see his question on the homepage.
3. A user can view the question by clicking on the 'View' button.
4. A user can edit the the question he asked earlier to another question by clicking on the 'Edit' button. He can edit his question and then click the 'Save' button to save his answer. His answer gets saved and he can see the message saying "Updated".
5. A user can provide answer to the question asked by clicking on the 'Answer' button. He can save his answer by clicking on 'Save'. His answer is saved once the "Saved" message has been displayed.
6. A user can view the answer by clicking on the 'View' button.
7. A user is able to edit the answer he had given previously by clicking on the 'Edit' button. He can see the msessage "Updated" once his answer has been edited.
8. A user is able to delete an existing answer by clciking on the 'Delete' button. He can see the message "Deleted" once his equation once his answer has been deleted.
9. A user is able to delete an existing question by clicking on the 'Delete' button. He can see the message "Deleted" once his question has been deleted.
10.A user can successfully logout of the application by clicking on My Account->Logout.
11.A new user can successsfully register himself into the aplication by entering his email adddress, password and passowrd confirmation sections and then by clicking on 'Register'.
12.A new user is directed to his homepage where he can see 'My Pofile' and then he can create his own profile. 
13.A new user can create his own profile by entering his first name, last name, and description and then by clicking on 'Save'.
14.A new user can view his own profile by clicking on My Account->View Profile. He can see his first name, last name and description.
15.A new user can edit his profile by ckicking on the 'Edit' button and then saving it. His profile gets edited with the message 'Profile Updated'.


The results of all these tests can be seen as successful and the values are updated in the database.

