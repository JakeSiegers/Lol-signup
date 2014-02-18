<?php
    if(isset($_POST['letsSubmit']) && $_POST['letsSubmit'] === "ok" ){


        echo json_encode($lol_result);
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bradley University ACM League Tournament Sign Up</title>
        <meta charset="utf-8">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-switch.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="lol_bgDarkener">

        </div>
        <div class="container lol_wrap">
            <div class="row">
                <div class="col-md-12">
                    <center><img src="logo.png" class="img-responsive"/></center>
                    <div id="lol_message" class="lol_message">Hello world!</div>
                    <h1 class="lol_title">Bradley University League of Legends Tournament!<p class="lead">Sponsored by ACM - Sign up now!</p></h1>
                    <form role="form">
                        <div class="form-group">
                            <label class="control-label lol_formLabel" for="notification2">Team Captain's Real Name</label>
                            <input type="email" class="form-control" id="lol_captainName" name="lol_captainName">
                        </div>
                        <div class="form-group">
                            <label class="control-label lol_formLabel" for="notification2">Team Captain's Email</label>
                            <input type="email" class="form-control" id="lol_captainEmail" name="lol_captainEmail">
                        </div>
                        <div class="form-group">
                            <label class="control-label lol_formLabel" for="notification2">Team Captain's Phone</label>
                            <input type="email" class="form-control" id="lol_captainPhone" name="lol_captainPhone">
                        </div>
                        <div class="form-group">
                            <label class="control-label lol_formLabel" for="notification2">Team Name</label>
                            <input type="email" class="form-control" id="lol_teamName" name="lol_teamName">
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label lol_formLabel" for="lol_sName1">Summoner Name 1</label>
                                    <input type="email" class="form-control" id="lol_sName1" name="lol_sName1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label lol_formLabel" for="lol_sName2">Summoner Name 2</label>
                                    <input type="email" class="form-control" id="lol_sName2" name="lol_sName2">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label lol_formLabel" for="lol_sName3">Summoner Name 3</label>
                                    <input type="email" class="form-control" id="lol_sName3" name="lol_sName3">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label lol_formLabel" for="lol_sName4">Summoner Name 4</label>
                                    <input type="email" class="form-control" id="lol_sName4" name="lol_sName4">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label lol_formLabel" for="lol_sName5">Summoner Name 5</label>
                                    <input type="email" class="form-control" id="lol_sName5" name="lol_sName5">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label lol_formLabel" for="notification2"> I agree to the <a href="#" onclick="$('#lol_rulesModel').modal('show'); return false;">rules</a> (Seriously, read these)</label>
                            <input type="checkbox" id="lol_checkbox" data-label-text="<span class='fa fa-arrows-h fa-lg'></span>">
                        </div>
                        <input type="hidden" name="letsSubmit" value="ok" />
                        <button type="submit" class="btn btn-success btn-lg" onclick="lol_submit(); return false;">Sign me up!</button>
                    </form>
                    <h2>Prizes <p class="lead">(The good stuff)</p></h2>
                    <p>After the event is complete, the top four teams in the tournament are given RP prizes. Tournament winners also receive the tournament-exclusive Triumphant Ryze skin.</p>
                </div>
            </div>
        </div>

        <div class="modal fade lol_rulesModel" id="lol_rulesModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="lead">The Rules</p>
                        These are the rules. If something is not clear, please email (JrMorris@mail.bradley.edu), or speak with Jordan Morris at the event. <strong>HIS WORD IS FINAL</strong>
                        <ul>
                            <li>All players must abide by Riot's summoner code.</li>
                            <li>All teams must pay $25 admission fee on day of tournament.</li>
                            <li>All players may bring their own gaming equipment, i.e. Laptops, Headsets, etc. (And we really suggest you do)</li>
                                <ul>
                                    <li>However - If they don't, they <strong>must</strong> use the provided equipment.</li>
                                    <li>We cannot guarantee ethernet cables, so please bring your own if you want to be assured a wired connection.</li>
                                </ul>
                            </li>
                            <li><strong>All players</strong> on a team must be present at the tournament location when playing.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Alright, I'm good.</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
