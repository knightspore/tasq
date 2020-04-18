All Ideas

    -- Create new asana task from newly picked up task
    -- Send slack message to #content upon completion
    -- Use newer, bigger dataset

    ## General
        ☐ Added Asana Integration
        ☐ Add a "create task" function
        ☐ Add slack notification on task completion
        ☐ Add some info to Top Priority Pickup Tasks
        ☐ Add CSV to Task Functionality
        
    ## Projects

    ## Edit Task
    
    ## Edit User
    
    ## Edit Project

    ## Create KPI Table Functions
        ✔ Start with Populating all Words where $post->user == $user->id

    ## Create individual profile view
        ✔ KPI 
        ☐ KPI this month


=========================================================

Completed Ideas

    ## General

        ✔ Fix "Trying to Get Property of Non Object"
        ✔ Add details to cards
        ✔ Remove Recently Completed
        ✔ Link Assignee with User ID
        ✔ Link Editor with User ID

    ## Create individual profile view
        ✔ name
        ✔ picture
        ✔ e-mail
        ✔ level
        ✔ Current Posts
        ✔ Edited Posts
        ✔ Completed Posts

    ## Individual Post view
        ✔ Pick Up Task 
            Set $post->user to Auth::user()->id,
            Refresh

        ✔ Edit Post
            Set $post->editor to Auth::user()->id,
            Refresh  

        ✔ Complete Task
            onClick($post->progress == 'Complete')    

        ✔ Add Folder Link to Post
            Set $post->folder to [input]

        ✔ Add live link to Post
             Set $post->live to [input]

        ✔ Archive Post (Set priority to 0)
            Set $post->priority == 0 (Will be hidden from the main view)

    -- Changed 'created-by' to 'created_by' so that it can be processed correctly in the submission form.

    Creating Posts Table Posts
    ✔ Create a model for posts @done (2020/03/17, 08:33:43)
    ✔ Create posts submission page @done (2020/03/17, 09:04:31)
    ✔ Add form to page @done (2020/03/17, 10:23:28)
    ✔ Ensure Posts.php is set up correctly @done (2020/03/17, 10:23:33)
    ✔ Add modifiers and indexes to database valuues and regenerate @done (2020/03/17, 17:39:25)
    ✔ Add in dummy posts to work with @done (2020/03/17, 17:48:11)

    Build Task View
    ✔ Pass posts table into task view @done (2020/03/17, 18:34:36)
    ✔ Start styling columns @done (2020/03/17, 18:35:44)
    ✔ Import Examples @done (2020/03/17, 19:26:59)
        ✔ Fix Broken Columns @done (2020/03/17, 19:56:55)

    ✔ Remove styling @done (2020/03/17, 20:08:53)
    
    Customize styling with conditions
    ✔ Folder / Link on/off based on null value @done (2020/03/18, 15:20:10)
    ✔ Colour Coded Priority and Status @done (2020/03/18, 15:35:37)
    ✔ Date formatting @done (2020/03/18, 23:26:45)

    ✔ Add larger dataset for scaling tests @done (2020/03/18, 21:25:13)

    ✔ Create KPI Blade @done (2020/03/19, 00:04:54)

    ✔ Create Add post functionality

    Build Post View
    ✔ Create individual post ID view
        ✔ All cols except ID and time