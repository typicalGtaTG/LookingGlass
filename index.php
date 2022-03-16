<?php
// lazy config check/load
if (file_exists('LookingGlass/Config.php')) {
  require 'LookingGlass/Config.php';
  if (!isset($ipv4, $ipv6, $siteName, $siteUrl, $serverLocation, $testFiles, $theme)) {
    exit('Configuration variable/s missing. Please run configure.sh');
  }
} else {
  exit('Config.php does not exist. Please run configure.sh');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AS142598 - Looking Glass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AS142598 Arpan Sen Network - LookingGlass">
    <meta name="author" content="Arpan Sen Network">

    <!-- IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    <!-- Favicon -->
    <link href="./assets-old/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="./assets-old/vendor/nucleo/css/nucleo.min.css" rel="stylesheet">
    <link href="./assets-old/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="./assets-old/css/argon.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <header>
            <h1>
                AS142598
            </h1>
            <div class="card card-frame">
                <div class="card-header">
                    <h2>Network Information</h2>
                </div>
                <div class="card-body">
                    <p>Server Location: <b><?php echo $serverLocation; ?></b></p>
                    <p>Test IPv6: <?php echo $ipv6; ?></p>
                    <p>Test files: <?php
                        foreach ($testFiles as $val) {
                          echo "<a href=\"{$val}.test\" id=\"testfile\">{$val}</a> ";
                        }
                      ?></p>
                    <p>Your IP Address: <b><a href="#tests" id="userip"><?php echo $_SERVER['REMOTE_ADDR']; ?></a></b>
                    </p>
                </div>
            </div>
        </header>
        <div class="card card-frame">
            <div class="card-header">
                <h2>Network Tests</h2>
            </div>
            <div class="card-body">
                <form id="networktest" action="#results" method="post">
                    <fieldset>
                        <div id="hosterror" class="form-group control-group">
                            <div class="controls">
                                <input id="host" name="host" type="text" class="form-control"
                                    placeholder="Host or IP address">
                            </div>
                        </div>
                        <select name="cmd" class="form-control">
                            <option value="host">host</option>
                            <option value="mtr">mtr</option>
                            <?php if (!empty($ipv6)) { echo '<option value="mtr6">mtr6</option>'; } ?>
                            <option value="ping" selected="selected">ping</option>
                            <?php if (!empty($ipv6)) { echo '<option value="ping6">ping6</option>'; } ?>
                            <option value="traceroute">traceroute</option>
                            <?php if (!empty($ipv6)) { echo '<option value="traceroute6">traceroute6</option>'; } ?>
                        </select><br>
                        <button type="submit" id="submit" name="submit" class="form-control btn btn-primary">Run
                            Test</button>
                    </fieldset>
                </form>
            </div>
        </div>

        <div id="results" class="card card-frame" style="display:none">
            <div class="card-header">
                <h2>
                    Results
                </h2>
            </div>
            <div class="card-body">
                <div class="span12">
                    <div class="well">
                        <code>
                            <pre id="response" style="display:none"></pre>
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col">
                    <div class="copyright text-center text-muted">
                        Copyright © 2021-2022
                        <a href="https://arpan.ovh" class="font-weight-bold ml-1" target="_blank">Arpan Sen</a>. All
                        rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core -->
    <script src="./assets-old/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets-old/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Argon JS -->
    <script src="./assets-old/js/argon.min.js"></script>
    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/LookingGlass.min.js"></script>
    <script src="assets/js/XMLHttpRequest.min.js"></script>
</body>

</html>