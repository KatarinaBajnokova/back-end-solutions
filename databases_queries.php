<?php
include 'header.php';
$dbPath = 'C:\\Users\\katar_yka\\OneDrive - Thomas More\\Semester IV\\Back-end API Development\\solutions\\spotify.sqlite';

if (!file_exists($dbPath)) {
    die("Database file not found at: " . $dbPath);
}

try {
    $db = new PDO("sqlite:" . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Spotify Database Query Results</title>
</head>
<body>
    <h1>Spotify Database Query Results</h1>

    <h2>Total Number of Tracks</h2>
    <?php
    $stmt = $db->query("SELECT COUNT(*) AS TotalTracks FROM tracks");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>Total tracks: " . htmlspecialchars($result['TotalTracks']) . "</p>";
    ?>

    <h2>Tracks with "you" in the Title</h2>
    <?php
    $stmt = $db->query("SELECT * FROM tracks WHERE Name LIKE '%you%'");
    $tracks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($tracks) {
        echo "<ul>";
        foreach ($tracks as $track) {
            echo "<li>" . htmlspecialchars($track['Name']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No tracks found with 'you' in the title.</p>";
    }
    ?>

    <h2>Tracks with "you" and "i" in the Title</h2>
    <?php
    $stmt = $db->query("SELECT * FROM tracks WHERE Name LIKE '%you%' AND Name LIKE '%i%'");
    $tracksYouI = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($tracksYouI) {
        echo "<ul>";
        foreach ($tracksYouI as $track) {
            echo "<li>" . htmlspecialchars($track['Name']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No tracks found with both 'you' and 'i' in the title.</p>";
    }
    ?>

    <h2>Tracks with "you" and "i" and Album Title Containing "chron" or "vol"</h2>
    <?php
    $stmt = $db->query("SELECT t.Name AS TrackName, a.Title AS AlbumTitle
                         FROM tracks AS t
                         JOIN albums AS a ON t.AlbumId = a.AlbumId
                         WHERE t.Name LIKE '%you%'
                           AND t.Name LIKE '%i%'
                           AND (a.Title LIKE '%chron%' OR a.Title LIKE '%vol%')");
    $tracksAlbums = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($tracksAlbums) {
        echo "<ul>";
        foreach ($tracksAlbums as $row) {
            echo "<li>" . htmlspecialchars($row['TrackName']) . " - " . htmlspecialchars($row['AlbumTitle']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No matching tracks found.</p>";
    }
    ?>

    <h2>Tracks, Albums, and Artists for Matching Criteria</h2>
    <?php
    $stmt = $db->query("SELECT t.Name AS TrackName, a.Title AS AlbumTitle, ar.Name AS ArtistName
                         FROM tracks AS t
                         JOIN albums AS a ON t.AlbumId = a.AlbumId
                         JOIN artists AS ar ON a.ArtistId = ar.ArtistId
                         WHERE t.Name LIKE '%you%'
                           AND t.Name LIKE '%i%'
                           AND (a.Title LIKE '%chron%' OR a.Title LIKE '%vol%')");
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($details) {
        echo "<ul>";
        foreach ($details as $row) {
            echo "<li>" . htmlspecialchars($row['TrackName']) . " - " . htmlspecialchars($row['AlbumTitle']) . " - " . htmlspecialchars($row['ArtistName']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No matching records found.</p>";
    }
    ?>

    <h2>Artists with Albums Containing "chron" or "vol" and Tracks with "you" and "i"</h2>
    <?php
    $stmt = $db->query("SELECT DISTINCT ar.Name AS ArtistName
                         FROM tracks AS t
                         JOIN albums AS a ON t.AlbumId = a.AlbumId
                         JOIN artists AS ar ON a.ArtistId = ar.ArtistId
                         WHERE t.Name LIKE '%you%'
                           AND t.Name LIKE '%i%'
                           AND (a.Title LIKE '%chron%' OR a.Title LIKE '%vol%')");
    $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($artists) {
        echo "<ul>";
        foreach ($artists as $artist) {
            echo "<li>" . htmlspecialchars($artist['ArtistName']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No matching artists found.</p>";
    }
    ?>

    <h2>Playlists Containing "I put a spell on you"</h2>
    <?php
    $stmt = $db->query("SELECT TrackId FROM tracks WHERE Name LIKE '%I put a spell on you%'");
    $trackRow = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($trackRow) {
        $trackId = $trackRow['TrackId'];
        $stmt = $db->prepare("SELECT pt.PlaylistId, p.Name
                              FROM playlist_track AS pt
                              JOIN playlists AS p ON pt.PlaylistId = p.PlaylistId
                              WHERE pt.TrackId = ?");
        $stmt->execute([$trackId]);
        $playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($playlists) {
            echo "<ul>";
            foreach ($playlists as $pl) {
                echo "<li>" . htmlspecialchars($pl['Name']) . " (Playlist ID: " . htmlspecialchars($pl['PlaylistId']) . ")</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No playlists found for the track.</p>";
        }
    } else {
        echo "<p>Track 'I put a spell on you' not found.</p>";
    }
    ?>

    <h2>Tracks in the First Playlist with "I put a spell on you"</h2>
    <?php
    if (!empty($playlists)) {
        $firstPlaylistId = $playlists[0]['PlaylistId'];
        $stmt = $db->prepare("SELECT t.Name AS TrackName
                              FROM tracks AS t
                              JOIN playlist_track AS pt ON t.TrackId = pt.TrackId
                              WHERE pt.PlaylistId = ?");
        $stmt->execute([$firstPlaylistId]);
        $playlistTracks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($playlistTracks) {
            echo "<ol>";
            foreach ($playlistTracks as $pt) {
                echo "<li>" . htmlspecialchars($pt['TrackName']) . "</li>";
            }
            echo "</ol>";
        } else {
            echo "<p>No tracks found in the first playlist.</p>";
        }
    } else {
        echo "<p>No playlist available to list tracks.</p>";
    }
    ?>
</body>
</html>
