<?php
// Get the search query from the form
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchQuery = $_GET['query'];
    
    // Directory where your website files are located
    $directory = '../';  // Adjust this to your root directory or any subdirectory

    // Function to search for the term in files and subdirectories recursively
    function searchInFiles($dir, $term) {
        $results = [];
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

        // Loop through all files
        foreach ($rii as $file) {
            // Only search within HTML or PHP files
            if ($file->isFile() && preg_match('/\.(html|php)$/', $file->getFilename())) {
                // Read file content
                $content = file_get_contents($file->getPathname());
                
                // If the search term is found, add the file to results
                if (stripos($content, $term) !== false) {
                    $results[] = $file->getPathname();
                }
            }
        }
        return $results;
    }

    // Search for the query in the specified directory
    $matchingFiles = searchInFiles($directory, $searchQuery);

    // Display the search results
    if ($matchingFiles) {
        echo "<h2>Pages containing the word: " . htmlspecialchars($searchQuery) . "</h2>";
        echo "<ul>";
        foreach ($matchingFiles as $file) {
            // Display link to the matching file
            $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $file); // Get the relative path for links
            echo "<li><a href='" . htmlspecialchars($relativePath) . "'>" . htmlspecialchars(basename($file)) . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No pages found containing the word: " . htmlspecialchars($searchQuery) . "</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>
