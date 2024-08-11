<?php
require_once("assets/php/config/config.php");

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Club Scoreboard</title>
    <meta name="twitter:title" content="Club Scoreboard">
    <meta property="og:image" content="assets/img/logo.png">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="2368x2368" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-body py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><img src="assets/img/logo.png" style="width: 50px;"></span><span>OBC Scoreboard</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="<?php echo config::homepageLink; ?>" target="_blank">Homepage</a></li>
                        <li class="nav-item"><a class="nav-link" href="/">Scoreboard</a></li>
                        <li class="nav-item" id="adminPanelLink" style="display: none;"><a class="nav-link" href="admin-panel.php">Admin-Panel</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <h1 class="text-center">Point calculation</h1>
        <div class="d-flex d-lg-flex justify-content-center justify-content-lg-center">
            <div style="width: 240px;">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Placement</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">1000</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">600</td>
                            </tr>
                            <tr>
                                <td class="text-center">HF</td>
                                <td class="text-center">360</td>
                            </tr>
                            <tr>
                                <td class="text-center">VF</td>
                                <td class="text-center">180</td>
                            </tr>
                            <tr>
                                <td class="text-center">8F</td>
                                <td class="text-center">90</td>
                            </tr>
                            <tr>
                                <td class="text-center">16F</td>
                                <td class="text-center">45</td>
                            </tr>
                            <tr>
                                <td class="text-center">Q</td>
                                <td class="text-center">10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="width: 240px;">
                    <h2 class="text-center">Special Points</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Placement</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">1200</td>
                                </tr>
                                <tr>
                                    <td class="text-center">HF</td>
                                    <td class="text-center">720</td>
                                </tr>
                                <tr>
                                    <td class="text-center">VF</td>
                                    <td class="text-center">360</td>
                                </tr>
                                <tr>
                                    <td class="text-center">8F</td>
                                    <td class="text-center">180</td>
                                </tr>
                                <tr>
                                    <td class="text-center">16F</td>
                                    <td class="text-center">90</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Q</td>
                                    <td class="text-center">20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>
    <footer>
        <footer class="text-center py-4">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <p class="text-muted my-2">Copyright&nbsp;© 2024&nbsp;<a href="https://lukehaase.ch" target="_blank"><br><span style="color: rgba(68, 68, 68, 0.75);">Luke Haase</span><br><br></a></p>
                    </div>
                    <div class="col">
                        <ul class="list-inline my-2">
                            <li class="list-inline-item"><a href="<?php echo config::instagramLink; ?>">
                                    <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                                        </svg></div>
                                </a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list-inline my-2">
                            <li class="list-inline-item"><a class="link-secondary" href="<?php echo config::privacyStatementLink; ?>">Privacy Statement</a></li>
                            <li class="list-inline-item"><a class="link-secondary" href="<?php echo config::imprintLink; ?>">Imprint</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <p style="margin-top: 25px;">No cookies are stored by this website.</p>
        </footer>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/classes/events.js"></script>
    <script src="assets/js/classes/login.js"></script>
    <script src="assets/js/classes/member.js"></script>
    <script src="assets/js/classes/message.js"></script>
    <script src="assets/js/global.js"></script>
</body>

</html>