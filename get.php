<?php
include 'header.php';

$articles = [
    [
        'title' => 'Eight Internet Giants Demand Restrictions on NSA Spying',
        'date' => 'December 9, 2013',
        'content' => "Eight major technology companies, such as Google, Apple, and Facebook, have demanded changes in the way the government spies in an open letter to US President Barack Obama. They want to restore public trust in the internet.\n\nInternet companies are coordinating for the first time a large, joint response to whistleblower Edward Snowden's revelations about the practices of the US secret service NSA. These include Apple, Google, Microsoft, Facebook, Twitter, AOL, LinkedIn, and Yahoo.\n\nThe letter is published on the website www.reformgovernmentsurveillance.com, but it is currently unavailable. The companies complain that the balance has shifted in favor of the government, at the expense of individual freedom. ‘A right enshrined in the Constitution. It’s time for change.’", 
        'image' => 'img/get-article-01.jpg',
        'imageDescription' => 'Mark Zuckerberg next to the Facebook logo'
    ],
    [
        'title' => 'Wild Benefactor Puts Money in Mailboxes',
        'date' => 'December 9, 2013',
        'content' => "Residents of two apartment blocks in Koksijde were surprised when they found money in their mailboxes, placed there by an anonymous benefactor.",
        'image' => 'img/get-article-02.jpg',
        'imageDescription' => 'The residence in Koksijde where the benefactor was working'
    ],
    [
        'title' => 'Original Hergé Pieces Auctioned for Hundreds of Thousands of Euros',
        'date' => 'December 9, 2013',
        'content' => "Two original pieces by Hergé were auctioned on Sunday for an impressive amount, showing the enduring value of Tintin and Snowy.",
        'image' => 'img/get-article-03.jpg',
        'imageDescription' => 'Tintin and Snowy'
    ]
];

$articleId = isset($_GET['id']) ? $_GET['id'] : null;
$searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$filteredArticles = $articles;

if ($searchQuery !== '') {
    $filteredArticles = array_filter($articles, function ($article) use ($searchQuery) {
        return strpos(strtolower($article['content']), $searchQuery) !== false ||
               strpos(strtolower($article['title']), $searchQuery) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $articleId !== null && isset($articles[$articleId]) ? $articles[$articleId]['title'] : "Today's Newspaper"; ?></title>
    <link rel="stylesheet" href="get.css">
</head>
<body>
    <h1><?php echo $articleId !== null ? "Individual Article" : "Today's Newspaper"; ?></h1>

    <form method="GET">
        <input type="text" name="search" placeholder="Search articles..." value="<?php echo htmlspecialchars($searchQuery); ?>">
        <button type="submit">Search</button>
    </form>

    <?php if ($articleId !== null): ?>
        <?php if (isset($articles[$articleId])): ?>
            <?php $article = $articles[$articleId]; ?>
            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
            <p><strong><?php echo htmlspecialchars($article['date']); ?></strong></p>
            <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['imageDescription']); ?>">
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            <a href="get.php">Back to all articles</a>
        <?php else: ?>
            <p>This article does not exist.</p>
            <a href="get.php">Back to all articles</a>
        <?php endif; ?>
    <?php elseif ($searchQuery !== '' && empty($filteredArticles)): ?>
        <p>The search term '<?php echo htmlspecialchars($searchQuery); ?>' does not appear in our newspaper.</p>
    <?php else: ?>
        <div class="article-container">
            <?php foreach ($filteredArticles as $key => $article): ?>
                <div class="article-preview">
                    <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                    <p><strong><?php echo htmlspecialchars($article['date']); ?></strong></p>
                    <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['imageDescription']); ?>">
                    <p><?php echo substr(htmlspecialchars($article['content']), 0, 100) . '...'; ?></p>
                    <a href="get.php?id=<?php echo $key; ?>">Read more ></a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
