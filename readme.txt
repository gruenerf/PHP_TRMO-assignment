/*************************************************/
/ Documentation Assignment 2 by Grüner, Ferdinand /
/*************************************************/

/*********************/
/ 0. Setup Project    /
/*********************/

1. In the constants.php:
    1.1 Update the login data for your database.
    1.2 Change the PROJECT_ADDRESS to the project folder name.

2. Run the setup.php file, which you find in the root directory to create the database.


/*********************/
/ 1. Application      /
/*********************/

"The real meaning of" is a urban-dictionary-ish application, which has a user management
and gives the users the possibility to write entries which are grouped under topics,
those again are grouped under categories.


/*********************/
/ 1.1 Dictionary      /
/*********************/

Menu Bar:
    Search:
        - Let´s you search for a certain string in topics and entries.

    Login:
        - Brings you to the login screen.
        - There you can either login or by clicking on "Register now" register a new user.

Center:
        - All topics are shown and can be sorted by date or by popularity.
        - Ascending or descending order can be selected through the arrows.

Sidebars:
    Left:
        - Shows the current level above. Basically a breadcrumb menu.
          (i.e. Categories if topics are shown, topics if entries are shown, Entries if entry is shown)

    Right:
        - Shows a random topic and the combined entries


/*********************/
/ 1.2 When Logged in  /
/*********************/

When logged in the login icon gets changed to the profile icon in the menu bar.
Once clicked you will be transferred to the profile page.


/**********************/
/ 1.2.1 Writer & Admin /
/**********************/

Sidebars:
    Left:
       Entries:     - You can create an entry by selecting a topic, entering a title and text
       Topics:      - You can create a new topic by selecting a category and a name

    Right:
       Settings:    - The password of the current user can be changed
                    - The Account can be deleted


/**********************/
/ 1.2.1 Only Admin     /
/**********************/

Sidebars:
    Left:
        Categories: - You can create a new category by entering a name
        Users:      - You can manage all users
                    - Change their permissions (admin/wirter)
                    - Delete users

    Right:
        Summary:    - Gives an overview about topics and categories