<?php

function sysCall($cmd) {
    ob_start();
    system($cmd);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

if ($_GET['ac'] == "cm") {
    if ($_GET['cm'] == "up") {
        $o['status'] = "ok";
        $o['content'] = sysCall("uptime");
    } else if ($_GET['cm'] == "w") {
        $o['status'] = "ok";
        $o['content'] = sysCall("w");
    } else if ($_GET['cm'] == "la") {
        $o['status'] = "ok";
        $o['content'] = sysCall("last");
    } else if ($_GET['cm'] == "to") {
        $o['status'] = "ok";
        $o['content'] = sysCall("top -b");
    } else {
        $o['status'] = "error";
        $o['message'] = "Something went wrong.";
    }
    die(json_encode($o));
}

$html .= <<<eof
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Control Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link type="text/css" rel="stylesheet" href="cdn/js/bootstrap/3.0.0/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="cdn/css/siamnet/default.css" />
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="container">
                    Control Panel
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Who</div>
                        <div class="panel-body"><pre id="w"></pre></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Last</div>
                        <div class="panel-body"><pre id="last"></pre></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="cdn/js/jquery/1.10.2/jquery-1.10.2.min.js"></script>
        <script src="cdn/js/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="cdn/js/siamnet/default.js"></script>
    </body>
</html>
eof;

print($html);
