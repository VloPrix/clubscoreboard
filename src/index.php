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
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><img src="assets/img/logo.png" style="width: 50px;"></span><span>Club Scoreboard</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="<?php echo config::homepageLink; ?>" target="_blank">Homepage</a></li>
                        <li class="nav-item"><a class="nav-link" href="point-calculation.php">Point calculation</a></li>
                        <li class="nav-item" id="adminPanelLink" style="display: none;"><a class="nav-link" href="admin-panel.php">Admin-Panel</a></li>
                    </ul><button class="btn btn-primary" id="loginButton" type="button">Login</button>
                </div><button class="btn btn-primary" id="logoutButton" type="button" style="display: none;">Logout</button>
            </div>
        </nav>
    </header>
    <div>
        <div>
            <h1 class="text-center">Overall placement</h1>
            <div class="d-flex justify-content-center" style="max-height: 500px;">
                <div class="table-responsive" style="width: 350px;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Overall placement</th>
                                <th>Name</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody id="totalstatisticTable"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <h1 class="text-center" style="margin-top: 20px;">Event placement</h1>
        <div style="margin-top: 25px;">
            <div class="d-flex justify-content-center"><select class="border rounded-pill" id="gameStatisticsList" style="background: var(--bs-primary);color: var(--bs-body-bg);width: 329px;padding: 12px;"></select></div>
            <div>
                <div class="d-flex justify-content-center" style="max-height: 500px;">
                    <div class="table-responsive" style="width: 350px;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Event placement</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody id="eventStatisticTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="loaderDiv" style="width: 100px;position: fixed;top: calc(50% - 62px);right: calc(50% - 50px);display: none;"><img id="loader" src="assets/img/logo.png" style="width: 100px;animation: rotating 1.5s linear infinite;">
        <p class="text-center" style="width: 100px;color: #000000;font-weight: bold;">Loading...</p>
    </div>
    <div id="loginForm" style="position: fixed;top: calc(50% - 205px);right: calc(50% - 180px);z-index: 9999;background: rgba(0,0,0,0.8);width: 360px;height: 370px;border-style: solid;border-radius: 15px;display: none;">
        <form id="loginFormForm">
            <div class="d-flex d-lg-flex justify-content-end"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" id="closeLogin" style="font-size: 30px;margin-right: 10px;margin-top: 7px;">
                        <path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor"></path>
                    </svg></a></div>
            <div>
                <h2 class="text-center" style="margin: 30px;color: var(--bs-body-bg);">Login</h2>
            </div>
            <div style="height: 50px;margin: 30px;"><input class="form-control" type="text" id="loginUsername" required="" maxlength="20" minlength="1" style="background: rgba(255,255,255,0.5);color: rgb(255,255,255);" placeholder="Username"></div>
            <div style="height: 50px;margin: 30px;"><input class="form-control" type="password" id="loginPassword" required="" placeholder="Password" style="border-color: #ffffff;background: rgba(255,255,255,0.5);color: rgb(255,255,255);"></div>
            <div style="margin: 30px;"><input class="btn btn-primary" type="submit" id="Login" style="width: 100%;background: var(--bs-btn-bg);" value="Login"></div>
        </form>
    </div>
    <div class="alert alert-dismissible" role="alert" id="alertBox" style="position: fixed;top: 20px;right: 20px;z-index: 99999;width: 320px;display: none;background: var(--bs-body-bg);"><button class="btn-close" id="messageClose" type="button" aria-label="Close"></button><span id="alertBoxContent"><strong>Alert</strong> text.</span></div>
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
    <script src="assets/js/index.js"></script>
</body>

</html>