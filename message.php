<?php
    $style = "index.css";
    $navlinksunlogined = array(
        'Domů' => 'index.php',
        'Hledat' => 'search.php',
        'Registrace' => 'register.php',
        'Login' => 'login.php'
    );
    $navlinkslogined = array(
        'Domů' => 'index.php',
        'Hledat' => 'search.php',
        'Odhlásit' => 'logout.php'
    );
    $navlinksAdmin = array(
        'Domů' => 'index.php',
        'Hledat' => 'search.php',
        'Administrace' => 'admin.php',
        'Odhlásit' => 'logout.php'
    );
    $errorMessages = array(
        "mailMissing" => "Nebylo vyplněné pole s emailem!",
        "passMissing" => "Nebylo vyplněné pole s heslem!",
        "noUser" => "Zadali jste nesprávné údaje!.",
        "noTerms" => "Musíte souhlasit s podmínkami užívání systému!",
        "notValideEmail" => "Váš email není validní.",
        "notValidUsername" => "Vaše uživatelské jméno není validní.",
        "smallPass" => "Vaše heslo je příliž krátké, minimální velikost je 9 znaků.",
        "notEnoughNumbers" => "Vaše heslo neobsahuje minimálně 3 číslice.",
        "notEquals" => "Hesla se neshodují.",
        "notOlderThanTen" => "Musíte být starší jak 10 let.",
        "notValidImage" => "Váš obrázek je příliš velký nebo se ho nepodařilo nahrát. Zkuste to prosím znovu.<br>Podporované formáty jsou: png, jpg, jpeg a musí být velký maximálně 9,2mb",
        "alreadyRegistered" => "Tetnto Email je již registrovaný.",
        "notValideForumName" => "Jméno fóra není validní",
        "valideForumDescription" => "Popis fóra obsahuje nepovolené znaky.",
        "wrongPassword" => "Zadali jste nesprávné heslo!.",
    );
    $likesanddislikesquery="
    SELECT 
    users.id AS userID, 
    users.username, 
    users.profile_picture AS profile_picture, 
    Posts.PostOwner, 
    Posts.Title, 
    Posts.id AS PostID,
    Posts.Content, 
    Posts.PostDate, 
    Posts.ForumID, 
    forums.name,
    COUNT(likesdislikes.PostID) AS like_count,
    GROUP_CONCAT(likesdislikes.UserID) AS liked_user_ids,
    COUNT(comments.PostParrentID) AS comment_count
FROM 
    Posts
JOIN 
    users ON Posts.PostOwner = users.id 
JOIN 
    forums ON Posts.ForumID = forums.id 
LEFT JOIN 
    likesdislikes ON Posts.id = likesdislikes.PostID 
LEFT JOIN 
    likesdislikes AS likes ON Posts.id = likes.PostID 
LEFT JOIN 
    comments ON Posts.id = comments.PostParrentID
GROUP BY
    Posts.id
ORDER BY 
    Posts.id DESC 
LIMIT 3;
";
$likesanddislikesqueryprofile="
    SELECT 
    users.id AS userID, 
    users.username, 
    users.profile_picture AS profile_picture, 
    Posts.PostOwner, 
    Posts.Title, 
    Posts.id AS PostID,
    Posts.Content, 
    Posts.PostDate, 
    Posts.ForumID, 
    forums.name,
    COUNT(likesdislikes.PostID) AS like_count,
    GROUP_CONCAT(likesdislikes.UserID) AS liked_user_ids,
    COUNT(comments.PostParrentID) AS comment_count
    FROM 
    Posts
    JOIN 
    users ON Posts.PostOwner = users.id 
    JOIN 
    forums ON Posts.ForumID = forums.id 
    LEFT JOIN 
    likesdislikes ON Posts.id = likesdislikes.PostID 
    LEFT JOIN 
    likesdislikes AS likes ON Posts.id = likes.PostID 
    LEFT JOIN 
    comments ON Posts.id = comments.PostParrentID
    GROUP BY
    Posts.id
    ORDER BY 
    Posts.id
";
?>