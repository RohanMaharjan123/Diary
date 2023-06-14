<?php
session_start();
?>
<html>
  <head>
    <!-- Main Style Sheet -->
    <link rel="stylesheet" href="assets/styles/main.css" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
      integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q"
      crossorigin="anonymous"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <title>E-Diary App</title>
  </head>
  <body>
    <?php
    include('nav.php');
    ?>
    <header><h1 class="title">Welcome
    <?php
            $user = $_SESSION["user"];
            echo $user["name"];
            ?> to E-diary app
            </h1></header>
  

    <!-- Journal Entry Section -->
    <section class="section journal-section">
      <div class="container">
        <div class="container-row container-row-journal">
          <div class="container-item container-item-journal">
            <form id="entryForm" action="">
              <label for="entry-title" class="journal-label">Entry Title</label>
              <input
                type="text"
                name="entry-title"
                id="entry-title"
                class="entry-text-title"
                placeholder="Name of entry ✏️"/>
              <label for="entry" class="journal-label">Today's Entry</label>
              <textarea
                name="daily-entry"
                id="entry"
                class="entry-text-box"
                placeholder="What's on your mind today? 💭"></textarea>
              <button class="btn-main entry-submit-btn" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Journal Entry Results -->
    <section class="section sectionEntryResults" id="entryResultsSection">
      <div class="container">
        <div class="container-row entryResultRow"></div>
      </div>
    </section>

    <script src="index.js"></script>

    <footer>
            <p>&copy; 2023 E-diary</p>
        </footer>
        <script src="diary.php"></script>
  </body>
</html>
